<?php

// app/Http/Controllers/VnpayController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Mail\InvoiceCreated;
use Illuminate\Support\Facades\Mail;

class VNPayController extends Controller
{
    public function createPayment($amount, $orderId, $orderInfo)
{
    // Lấy cấu hình từ file config
    $vnp_TmnCode = config('vnpay.vnp_TmnCode');
    $vnp_HashSecret = config('vnpay.vnp_HashSecret');
    $vnp_Url = config('vnpay.vnp_Url');
    $vnp_ReturnUrl = config('vnpay.vnp_ReturnUrl');
    
    // Log các giá trị cấu hình VNPay
    Log::info('VNPay Configurations:', [
        'vnp_TmnCode' => $vnp_TmnCode,
        'vnp_HashSecret' => $vnp_HashSecret,
        'vnp_Url' => $vnp_Url,
        'vnp_ReturnUrl' => $vnp_ReturnUrl,
    ]);

    // Thông tin giao dịch
    $vnp_TxnRef = $orderId; // Mã đơn hàng (unique)
    $vnp_OrderInfo = $orderInfo;
    $vnp_Amount = $amount * 100; // Số tiền (VNPay yêu cầu đơn vị là VND * 100)
    $vnp_IpAddr = request()->ip(); // Lấy IP khách hàng
    $vnp_BankCode = ""; //Mã phương thức thanh toán

    // Log thông tin đơn hàng
    Log::info('Order Information:', [
        'vnp_TxnRef' => $vnp_TxnRef,
        'vnp_OrderInfo' => $vnp_OrderInfo,
        'vnp_Amount' => $vnp_Amount,
        'vnp_IpAddr' => $vnp_IpAddr,
    ]);

    // Dữ liệu gửi tới VNPay
    $inputData = [
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => now()->format('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => "vn",
        "vnp_OrderType" => "other",
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_ReturnUrl" => $vnp_ReturnUrl,
        "vnp_TxnRef" => $vnp_TxnRef,
    ];

    // Nếu có mã ngân hàng, thêm vào
    
if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}

ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
    // Trả về URL thanh toán
    return response()->json([
        'success' => true,
        'url' => $vnp_Url,
    ]);
}
public function thanhToanLai($amount, $orderId, $orderInfo)
{
    // Lấy cấu hình từ file config
    $vnp_TmnCode = config('vnpay.vnp_TmnCode');
    $vnp_HashSecret = config('vnpay.vnp_HashSecret');
    $vnp_Url = config('vnpay.vnp_Url');
    $vnp_ReturnUrl = config('vnpay.vnp_ReturnUrl');
    
    // Log các giá trị cấu hình VNPay
    Log::info('VNPay Configurations:', [
        'vnp_TmnCode' => $vnp_TmnCode,
        'vnp_HashSecret' => $vnp_HashSecret,
        'vnp_Url' => $vnp_Url,
        'vnp_ReturnUrl' => $vnp_ReturnUrl,
    ]);

    // Thông tin giao dịch
    $vnp_TxnRef = $orderId; // Mã đơn hàng (unique)
    $vnp_OrderInfo = $orderInfo;
    $vnp_Amount = $amount * 100; // Số tiền (VNPay yêu cầu đơn vị là VND * 100)
    $vnp_IpAddr = request()->ip(); // Lấy IP khách hàng
    $vnp_BankCode = ""; //Mã phương thức thanh toán

    // Log thông tin đơn hàng
    Log::info('Order Information:', [
        'vnp_TxnRef' => $vnp_TxnRef,
        'vnp_OrderInfo' => $vnp_OrderInfo,
        'vnp_Amount' => $vnp_Amount,
        'vnp_IpAddr' => $vnp_IpAddr,
    ]);

    // Dữ liệu gửi tới VNPay
    $inputData = [
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => now()->format('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => "vn",
        "vnp_OrderType" => "other",
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_ReturnUrl" => $vnp_ReturnUrl,
        "vnp_TxnRef" => $vnp_TxnRef,
    ];

    // Nếu có mã ngân hàng, thêm vào
    
if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}

ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
  // Trả về URL thanh toán
return redirect($vnp_Url);

}
public function handleReturn(Request $request)
{
    $vnp_HashSecret = config('vnpay.vnp_HashSecret');
// Lấy chữ ký từ phản hồi VNPAY
$vnp_SecureHash = $request->input('vnp_SecureHash');

// Thu thập và xử lý các tham số "vnp_"
$inputData = [];
foreach ($request->all() as $key => $value) {
    if (substr($key, 0, 4) === "vnp_") {
        $inputData[$key] = $value;
    }
}

// Loại bỏ 'vnp_SecureHash' khỏi dữ liệu
unset($inputData['vnp_SecureHash']);

// Sắp xếp theo key tăng dần
ksort($inputData);

// Xây dựng chuỗi dữ liệu để tính SecureHash
$hashData = "";
$i = 0;
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData .= '&' . urlencode($key) . '=' . urlencode($value);
    } else {
        $hashData .= urlencode($key) . '=' . urlencode($value);
        $i = 1;
    }
}

// Tính toán SecureHash
$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

// Ghi log để kiểm tra
Log::info('Dữ liệu phản hồi từ VNPAY:', $inputData);
Log::info('Chữ ký đã tính:', ['secureHash' => $secureHash]);
Log::info('Chữ ký từ VNPAY:', ['vnp_SecureHash' => $vnp_SecureHash]);

// So sánh chữ ký
if ($secureHash === $vnp_SecureHash) {
    Log::info('Chữ ký hợp lệ. Giao dịch thành công.');
} else {
    Log::warning('Chữ ký không hợp lệ. Giao dịch thất bại.');
}


    if ($secureHash === $vnp_SecureHash) {
        if ($inputData['vnp_ResponseCode'] === '00') {
            $hoaDon = HoaDon::where('ma_hoa_don', $inputData['vnp_TxnRef'])->first();
            $payDate = $request->input('vnp_PayDate'); // Thời gian giao dịch
            $formattedPayDate = Carbon::createFromFormat('YmdHis', $payDate);

            if ($hoaDon) {
                $hoaDon->trang_thai_thanh_toan= HoaDon::TRANG_THAI_THANH_TOAN['Đã thanh toán'];
                $hoaDon->thoi_gian_giao_dich = $formattedPayDate;
                $hoaDon->save();
                // Gửi email xác nhận
                Mail::to($hoaDon->email)->send(new InvoiceCreated($hoaDon));
                return view('payment.success', ['message' => 'Thanh toán thành công! ']);

            }
        }
        return view('payment.error', ['message' => 'Giao dịch thất bại']);
    }

    return view('payment.error', ['message' => 'Chữ ký không hợp lệ']);
}
public function queryTransaction(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'txnRef' => 'required',
        'transactionDate' => 'required|date_format:YmdHis',
    ]);
    
    // Generate random Request ID for this transaction
    $vnp_RequestId = rand(1, 10000); 

    // Define the required parameters for the API call
    $vnp_Command = "querydr"; // API command for querying transaction
    $vnp_TxnRef = $request->input('txnRef'); // Transaction reference
    $vnp_OrderInfo = "Query transaction"; // Description of the transaction
    $vnp_TransactionDate = $request->input('transactionDate'); // Date of the transaction
    $vnp_CreateDate = now()->format('YmdHis'); // Time of request creation
    $vnp_IpAddr = $request->ip(); // IP address of the client making the request

    // Log the incoming request data
    Log::info("Query Transaction Request Data", [
        'txnRef' => $vnp_TxnRef,
        'transactionDate' => $vnp_TransactionDate,
        'CreateDate' => $vnp_CreateDate,
        'IpAddr' => $vnp_IpAddr,
        'OrderInfo' => $vnp_OrderInfo
    ]);

    // Load configuration parameters from the environment file
    
    $vnp_TmnCode = config('vnpay.vnp_TmnCode');
    $vnp_HashSecret = config('vnpay.vnp_HashSecret');
    $apiUrl = config('vnpay.vnp_TransactionApiUrl');

    // Prepare data to send in the request
    $datarq = [
        "vnp_RequestId" => $vnp_RequestId,
        "vnp_Version" => "2.1.0",
        "vnp_Command" => $vnp_Command,
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_TxnRef" => $vnp_TxnRef,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_TransactionDate" => $vnp_TransactionDate,
        "vnp_CreateDate" => $vnp_CreateDate,
        "vnp_IpAddr" => $vnp_IpAddr,
    ];

    // Format the data for hash generation
    $format = '%s|%s|%s|%s|%s|%s|%s|%s|%s';
    $dataHash = sprintf(
        $format,
        $datarq['vnp_RequestId'],
        $datarq['vnp_Version'],
        $datarq['vnp_Command'],
        $datarq['vnp_TmnCode'],
        $datarq['vnp_TxnRef'],
        $datarq['vnp_TransactionDate'],
        $datarq['vnp_CreateDate'],
        $datarq['vnp_IpAddr'],
        $datarq['vnp_OrderInfo']
    );

    // Generate checksum (HMAC SHA512)
    $checksum = hash_hmac('SHA512', $dataHash, $vnp_HashSecret);
    $datarq["vnp_SecureHash"] = $checksum;

    // Log the data being sent to VNPay
    Log::info("Data being sent to VNPay", $datarq);

    // Call the VNPay API with the prepared data
    $response = $this->callVNPayAPI('POST', $apiUrl, $datarq);

    // Decode the response
    $apiResponse = json_decode($response, true);

    // Log the response from VNPay
    Log::info("VNPay API Response", $apiResponse);

    // Check if the API response is valid
    if ($apiResponse === null) {
        return response()->json(['error' => 'Invalid response from VNPay', 'raw_response' => $response]);
    }

    // Return the result to the view
    return view('admins.transaction-result', [
        'response' => $apiResponse,
        'rawResponse' => $response,
    ]);
}



private function callVNPayAPI($method, $url, $data)
{
    $curl = curl_init();

    // Setup cURL options
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    if ($method === 'POST') {
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    }

    // Execute the request and capture the response
    $response = curl_exec($curl);
    
    if (curl_errno($curl)) {
        die('Connection Error: ' . curl_error($curl));
    }
    
    curl_close($curl);
    
    return $response;
}


}
