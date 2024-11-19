<?php

namespace App\Http\Controllers\Client;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Thêm dòng này
use App\Models\KhuyenMai;
use App\Models\HoaDon;         // Import model HoaDon
use App\Models\ChiTietHoaDon;   // Import model ChiTietHoaDon
use Illuminate\Support\Facades\Auth;
class ThanhToanController extends Controller
{

public function index()
{
    // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
if (!Auth::check()) {
    return redirect()->route('customer.login');
}

// Lấy thông tin người dùng và địa chỉ đã sử dụng trước đó
$user = Auth::user();
$diaChiDaSuDung = HoaDon::where('user_id', $user->id)
    ->where('trang_thai', 7)
    ->distinct()
    ->pluck('dia_chi_nhan_hang');

// Kiểm tra nếu có giỏ hàng trong session
$oldCart = Session::has('cart') ? Session::get('cart') : null;
if (!$oldCart) {
    // Nếu không có giỏ hàng, chuyển hướng đến trang đơn hàng
    return redirect()->to('http://127.0.0.1:8000/customer/donhang');
}

$cart = new Cart($oldCart);

// Lấy mã giảm giá và kiểm tra tính hợp lệ
$discountCode = Session::get('discount_code', null);
$discountPercentage = Session::get('discount_percentage', 0);
$maxDiscount = Session::get('maxDiscount', null); 
if ($discountCode) {
    $discount = KhuyenMai::where('ma_khuyen_mai', $discountCode)->first();
    $nowDate = now();
    
    if (!$discount || !$nowDate->between($discount->ngay_bat_dau, $discount->ngay_ket_thuc)) {
        // Xóa giảm giá nếu không hợp lệ
        Session::forget('discount_code');
        Session::forget('discount_percentage');
        $discountPercentage = 0;
    }
}
 // Tính toán số tiền giảm giá và tổng tiền
 $originalTotal = $cart->totalPrice + 50000; // Tổng giá trước giảm giá
 $discountAmount = $originalTotal * ($discountPercentage / 100);

 // Áp dụng giới hạn giảm giá tối đa
 if ($maxDiscount > 0 && $discountAmount > $maxDiscount) {
     $discountAmount = $maxDiscount;
 }
 // Tổng tiền sau khi giảm giá
 $discountedTotal = $originalTotal - $discountAmount;
return view('clients.thanhtoan', [
    'cart' => $cart,
    'discountedTotal' => $discountedTotal,
    'discountAmount' => $discountAmount,
    'discountPercentage' => $discountPercentage,
    'discountCode' => $discountCode,
    'diaChiDaSuDung' => $diaChiDaSuDung
]);

}


    public function applyDiscount(Request $request)
    {
        // Kiểm tra nếu có giỏ hàng trong session
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
    
        $discountCode = $request->input('discount_code'); // Lấy mã giảm giá từ form
        Log::info("Received discount code: " . $discountCode);
        
        // Kiểm tra mã giảm giá trong cơ sở dữ liệu
        $discount = KhuyenMai::where('ma_khuyen_mai', $discountCode)->first();
    
        if ($discount) {
            $nowDate = now();
            $startDate = $discount->ngay_bat_dau;
            $endDate = $discount->ngay_ket_thuc;
    
            // Kiểm tra ngày hiệu lực của mã giảm giá
        if ($nowDate->between($startDate, $endDate)) {
                $discountPercentage = $discount->phan_tram_khuyen_mai;
                
                // Lưu mã giảm giá và phần trăm giảm giá vào session
                $request->session()->put('discount_code', $discountCode);
                $request->session()->put('discount_percentage', $discountPercentage);
                $maxDiscount = Session::get('maxDiscount', null); 

               // Tính toán số tiền giảm giá và tổng tiền
                $originalTotal = $cart->totalPrice + 50000; // Tổng giá trước giảm giá
                $discountAmount = $originalTotal * ($discountPercentage / 100);

              // Áp dụng giới hạn giảm giá tối đa
                if ($maxDiscount > 0 && $discountAmount > $maxDiscount) {
                $discountAmount = $maxDiscount;
                }
              // Tổng tiền sau khi giảm giá
                $discountedTotal = $originalTotal - $discountAmount;
                // Trả về phản hồi JSON thành công
                return response()->json([
                    'success' => true,
                    'message' => 'Mã giảm giá đã được áp dụng.',
                    'discount_percentage' => $discountPercentage,
                    'discount_code' => $discountCode,
                    'new_total' => $discountedTotal // Trả về tổng tiền mới

                ]);

            } else {
                // Trả về phản hồi JSON cho mã hết hạn
                return response()->json([
                    'success' => false,
                    'message' => 'Mã giảm giá đã hết hạn.'
                ]);
            }
        }
        
        // Trả về phản hồi JSON cho mã không hợp lệ
        return response()->json([
            'success' => false,
            'message' => 'Mã giảm giá không hợp lệ.'
        ]);
    }
    public function removeDiscount(Request $request)
{   // Xóa mã giảm giá trong session
    $request->session()->forget('discount_code');
    $request->session()->forget('discount_percentage');
    // Kiểm tra nếu có giỏ hàng trong session
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    if (!$oldCart) {
        return response()->json([
            'success' => false,
            'message' => 'Giỏ hàng không tồn tại.'
        ]);
    }
    
    $cart = new Cart($oldCart);
    $discountPercentage = Session::get('discount_percentage', 0);

    
    
    // Tính lại tổng tiền sau khi xóa mã giảm giá
    $discountedTotal = ($cart->totalPrice + 50000)* (1 - $discountPercentage / 100);

    return response()->json([
        'success' => true,
        'message' => 'Mã giảm giá đã được xóa.',
        'new_total' => $discountedTotal // Trả về tổng tiền sau khi xóa mã giảm giá
    ]);
}

        

  function placeOrder(Request $request)
{
    try {
        $cart = Session::get('cart');
        if (!$cart || !isset($cart->products)) {
            Log::error("Giỏ hàng trống hoặc không hợp lệ.");
            return response()->json(['success' => false, 'message' => 'Giỏ hàng trống'], 400);
        }

        Log::info("Cart data: ", (array) $cart);

        $discountPercentage = Session::get('discount_percentage', 0);
        $tongTien = $cart->totalPrice ?? 0;
        $giamGia = $tongTien * ($discountPercentage / 100);
        $tongTienSauGiam = ($tongTien+ 50000) - $giamGia;
// Kiểm tra user_id
        $userId = auth()->id();
        if (!$userId) {
            Log::error("Người dùng chưa đăng nhập.");
            return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập để đặt hàng'], 401);
        }

        // Kiểm tra phương thức thanh toán
        if ($request->payment_method == 'Thanh toán qua chuyển khoản ngân hàng') {
             // Tạo hóa đơn
    $hoaDon = HoaDon::create([
        'ma_hoa_don' => date("ymd") . "_" . rand(0, 1000000),
        'user_id' => $userId,
        'giam_gia' => $giamGia,
        'tong_tien' => $tongTienSauGiam,
        'dia_chi_nhan_hang' => $request->address,
        'email' => $request->email,
        'so_dien_thoai' => $request->phone,
        'ten_nguoi_nhan' => $request->name,
        'ngay_dat_hang' => now(),
        'ghi_chu' => $request->note,
        'phuong_thuc_thanh_toan' => $request->payment_method,
        'trang_thai' => HoaDon::CHO_XAC_NHAN,
        'trang_thai_thanh_toan'=>HoaDon::TRANG_THAI_THANH_TOAN['Chưa thanh toán']


    ]);

    Log::info("Hóa đơn đã tạo: ", (array) $hoaDon);

    // Thêm chi tiết hóa đơn
    foreach ($cart->products as $item) {
        Log::info("Chi tiết sản phẩm: ", (array) $item);

        ChiTietHoaDon::create([
            'hoa_don_id' => $hoaDon->id,
            'bien_the_san_pham_id' => $item['bienthe']->id,
            'so_luong' => $item['quantity'],
            'don_gia' => $item['bienthe']->gia_moi,
            'thanh_tien' => $item['quantity'] * $item['bienthe']->gia_moi,
        ]);
    }
            // Nếu thanh toán online, gọi phương thức thanh toán ZaloPay
            $maHoaDon = $hoaDon->ma_hoa_don;
            return $this->initiateZaloPayPayment($userId, $request, $cart, $giamGia, $tongTienSauGiam, $maHoaDon);
        } else {
            // Tạo hóa đơn offline
            return $this->createInvoice($userId, $request, $cart, $giamGia, $tongTienSauGiam);
        }
    } catch (\Exception $e) {
        Log::error("Lỗi khi đặt hàng: " . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi khi đặt hàng'], 500);
    }
}

protected function createInvoice($userId, $request, $cart, $giamGia, $tongTienSauGiam)
{
    // Tạo hóa đơn
    $hoaDon = HoaDon::create([
        'ma_hoa_don' => 'HD' . time(),
        'user_id' => $userId,
        'giam_gia' => $giamGia,
        'tong_tien' => $tongTienSauGiam,
        'dia_chi_nhan_hang' => $request->address,
        'email' => $request->email,
        'so_dien_thoai' => $request->phone,
        'ten_nguoi_nhan' => $request->name,
        'ngay_dat_hang' => now(),
        'ghi_chu' => $request->note,
        'phuong_thuc_thanh_toan' => $request->payment_method,
        'trang_thai' => HoaDon::CHO_XAC_NHAN,
        'trang_thai_thanh_toan'=>HoaDon::TRANG_THAI_THANH_TOAN['Chưa thanh toán']

    ]);

    Log::info("Hóa đơn đã tạo: ", (array) $hoaDon);

    // Thêm chi tiết hóa đơn
    foreach ($cart->products as $item) {
        Log::info("Chi tiết sản phẩm: ", (array) $item);
ChiTietHoaDon::create([
            'hoa_don_id' => $hoaDon->id,
            'bien_the_san_pham_id' => $item['bienthe']->id,
            'so_luong' => $item['quantity'],
            'don_gia' => $item['bienthe']->gia_moi,
            'thanh_tien' => $item['quantity'] * $item['bienthe']->gia_moi,
        ]);
    }

    // Xóa session giỏ hàng và mã giảm giá
    Session::forget('cart');
    Session::forget('discount_code');
    Session::forget('discount_percentage');

    return response()->json(['success' => true, 'message' => 'Đặt hàng thành công']);
}

public function initiateZaloPayPayment($userId, $request, $cart, $giamGia, $tongTienSauGiam,$maHoaDon)
{
    $zaloPayConfig = [
        'app_id' => 2553,
        'key' => 'PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL',
        "key2" => "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz",
        'endpoint' => 'https://sb-openapi.zalopay.vn/v2/create',
    ];

    $transID = 'HD' . $maHoaDon; 
    $embedData = json_encode(['redirecturl' => 'http://127.0.0.1:8000/customer/donhang']); 
    $itemsArray = [];

    foreach ($cart->products as $product) {
        $itemsArray[] = [
            'itemid' => (string) $product['bienthe']->id,
            'itemname' => $product['bienthe']->ten_san_pham,
            'itemprice' => $product['bienthe']->gia_moi,
            'itemquantity' => $product['quantity'],
        ];
    }
    $data = [
        'app_id' => $zaloPayConfig['app_id'],
        'app_time' => round(microtime(true) * 1000),
        'app_trans_id' => $maHoaDon,
        'app_user' => "user$userId",
        'item' => json_encode($itemsArray),
        'embed_data' => $embedData,
        'amount' => $tongTienSauGiam,
        'description' => "Thanh toán cho đơn hàng #$transID",
        'callback_url' => 'https://6daf-42-114-185-44.ngrok-free.app/zalopay/callback',
    ];

    $data['mac'] = $this->generateZaloPaySignature($data, $zaloPayConfig['key']);

    Log::info('ZaloPay request data:', $data);

    try {
        $response = $this->sendToZaloPay($zaloPayConfig['endpoint'], $data);
        Log::info('ZaloPay response:', $response);
    } catch (\Exception $e) {
        
        $maHoaDon->trang_thai_thanh_toan= HoaDon::TRANG_THAI_THANH_TOAN['Thanh toán thất bại'];
        Log::error('Error sending request to ZaloPay:', ['error' => $e->getMessage()]);
        return response()->json(['success' => false, 'message' => 'Error sending request to ZaloPay'], 500);
    }

    if (isset($response['return_code']) && $response['return_code'] == '1') {
        // Xóa session giỏ hàng và mã giảm giá
    Session::forget('cart');
    Session::forget('discount_code');
    Session::forget('discount_percentage');
        return response()->json(['success' => true, 'order_url' => $response['order_url']]);
    }
    
    return response()->json(['success' => false, 'message' => 'Error redirecting to ZaloPay'], 500);
}

private function generateZaloPaySignature(array $data, $key)
{
    $signatureData = implode('|', [
$data['app_id'], $data['app_trans_id'], $data['app_user'],
        $data['amount'], $data['app_time'], $data['embed_data'], $data['item']
    ]);
    return hash_hmac('sha256', $signatureData, $key);
}

private function sendToZaloPay($url, $data)
{
    $client = new \GuzzleHttp\Client();
    try {
        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => $data,
        ]);
        
        return json_decode($response->getBody()->getContents(), true);
    } catch (\Exception $e) {
        Log::error('Error sending request to ZaloPay:', ['error' => $e->getMessage()]);
        return ['success' => false, 'message' => 'Error sending request to ZaloPay'];
    }
}
public function handleZaloPayCallback(Request $request)
{
    Log::info("Received ZaloPay callback", ['data' => $request->all()]);

    $result = [];
    try {
        $key2 = "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz"; // Khóa bí mật của bạn
        $postdata = $request->getContent();
        $postdatajson = json_decode($postdata, true);
        
        // Kiểm tra xem dữ liệu có tồn tại hay không
        if (!isset($postdatajson["data"]) || !isset($postdatajson["mac"])) {
            Log::error("Dữ liệu callback không hợp lệ.");
            $result["return_code"] = -1;
            $result["return_message"] = "Invalid callback data.";
            return response()->json($result);
        }

        // Kiểm tra tính hợp lệ của MAC
        $mac = hash_hmac("sha256", $postdatajson["data"], $key2);
        if (strcmp($mac, $postdatajson["mac"]) !== 0) {
            Log::error("Invalid callback MAC from ZaloPay.");
            $result["return_code"] = -1;
            $result["return_message"] = "MAC not equal";
            return response()->json($result);
        }

        // Giải mã dữ liệu
        $data = json_decode($postdatajson["data"], true);

        // Kiểm tra các trường cần thiết từ ZaloPay
        if (!isset($data["app_trans_id"]) || !isset($data["amount"])) {
            Log::error("Thiếu thông tin cần thiết từ ZaloPay.");
            $result["return_code"] = -3;
            $result["return_message"] = "Missing required fields.";
            return response()->json($result);
        }

        $order = HoaDon::where('ma_hoa_don', $data['app_trans_id'])->first();

        if ($order) {
            // Cập nhật trạng thái hóa đơn tùy theo logic của bạn (ví dụ kiểm tra `amount` hoặc `zp_trans_id` nếu cần)
            $order->trang_thai_thanh_toan= HoaDon::TRANG_THAI_THANH_TOAN['Đã thanh toán'];

            $order->save();
    
            Log::info("Cập nhật trạng thái đơn hàng thành công: ", (array)$order);
            $result["return_code"] = 1;
            $result["return_message"] = "Cập nhật trạng thái đơn hàng thành công.";
            return response()->json($result);
        } else {
            Log::error("Không tìm thấy hóa đơn với mã: " . $data['app_trans_id']);
            $result["return_code"] = -3;
            $result["return_message"] = "Không tìm thấy hóa đơn.";
            return response()->json($result);
        }
           
    } catch (\Exception $e) {
        Log::error("Lỗi trong callback từ ZaloPay: " . $e->getMessage());
        $result["return_code"] = 0;
        $result["return_message"] = "Error: " . $e->getMessage();
    }

    return response()->json($result);
}
}