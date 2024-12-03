<?php

namespace App\Http\Controllers\Client;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\BienTheSanPham;
use App\Models\KhuyenMai;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function index()
    {
        $this->UpdateCart();
        return view('clients.cart.cart');
    }

    public function AddCart(Request $request, string $id)
    {
        $this->UpdateCart();
        $quantity = intval($request->query('quantity'));
        $mauSacId = intval($request->query('mauSacId'));
        $dungLuongId = intval($request->query('dungLuongId'));

        if (!$quantity || !$mauSacId || !$dungLuongId) {
            return redirect()->back()->with('error', 'Thông tin sản phẩm không đầy đủ.');
        }
        $product = SanPham::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
        $bienthe = BienTheSanPham::where('san_pham_id', $id)->where('dung_luong_id', $dungLuongId)->where('mau_sac_id', $mauSacId)->first();
        if (!$bienthe) {
            return redirect()->back()->with('error', 'Biến thể không tồn tại.');
        }
        $oldCart = Session('cart') ? Session('cart') : [];
        $newCart = new Cart($oldCart);
        $newCart->AddCart($product, $bienthe, $quantity);
        $request->session()->put('cart', $newCart);
        return view('clients.cart.cart-drop');
    }

    public function DeleteItemCart(Request $request, $idbt)
    {
        $this->UpdateCart();
        $oldCart = Session('cart') ? Session('cart') : [];
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($idbt);
        if (count($newCart->products) > 0) {
            $request->session()->put('cart', $newCart);
        } else {
            $request->session()->forget('cart');
        }
        return view('clients.cart.cart-drop');
    }

    public function DeleteItemListCart(Request $request, $idbt)
    {
        $this->UpdateCart();
        $oldCart = Session('cart') ? Session('cart') : [];
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($idbt);
        if (count($newCart->products) > 0) {
            $request->session()->put('cart', $newCart);
        } else {
            $request->session()->forget('cart');
        }
        return view('clients.cart.cart-list');
    }

    public function UpdateItemCart(Request $request, $idbt)
    {
        $this->UpdateCart();
        $quantity = intval($request->query('quantity'));
        if ($quantity < 1) {
            $quantity = 1;
        }
        $oldCart = Session('cart') ? Session('cart') : [];
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($idbt, $quantity);
        $request->session()->put('cart', $newCart);
        return view('clients.cart.cart-list');
    }

    public function  CartListDrop()
    {
        $this->UpdateCart();
        return view('clients.cart.cart-drop');
    }

    public function  CartList()
    {
        $this->UpdateCart();
        return view('clients.cart.cart-list');
    }


    public function discount(Request $request, string $discountCode)
    {
        $this->UpdateCart();
        Log::info("Received discount code: " . $discountCode);
        $discount = KhuyenMai::where('ma_khuyen_mai', $discountCode)->first();

        if ($discount) {
            $nowDate = now();
            $startDate = $discount->ngay_bat_dau;
            $endDate = $discount->ngay_ket_thuc;

            if ($nowDate->between($startDate, $endDate) && $discount->trang_thai != 0) {
                $discountPercentage = $discount->phan_tram_khuyen_mai;

                // Lưu mã giảm giá và phần trăm giảm giá vào session
                $request->session()->put('discount_code', $discountCode);
                $request->session()->put('discount_percentage', $discountPercentage);
                $request->session()->put('maxDiscount', $discount->giam_toi_da);

                return view('clients.cart.cart-list', ['discount' => $discountPercentage, 'maxDiscount' => $discount->giam_toi_da]);
            } else {
                return response()->json(['message' => 'Mã giảm giá đã hết hạn.'], 400);
            }
        }
        return response()->json(['message' => 'Mã giảm giá không hợp lệ.'], 404);
    }

    public function  UpdateCart(){
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            $totalPrice = 0;
            foreach ($cart->products as $idbt => $product) {
                $bienThe = BienTheSanPham::where('id', $idbt)->first();
                if ($bienThe) {
                    $sanPham = SanPham::where('id', $bienThe->san_pham_id)->first();
                    if ($sanPham) {
                        $cart->products[$idbt]['bienthe'] = $bienThe;
                        if ($product['quantity'] >= $bienThe->so_luong) {
                            $cart->products[$idbt]['quantity'] = $bienThe->so_luong;
                        }
                        if ($bienThe->so_luong <= 0) {
                            unset($cart->products[$idbt]);
                            continue;
                        }
                        $totalPrice += $cart->products[$idbt]['quantity'] * $bienThe->gia_moi;
                    } else {
                        unset($cart->products[$idbt]);
                        continue;
                    }
                } else {
                    unset($cart->products[$idbt]);
                    continue;
                }
            }
            if (count($cart->products) > 0) {
                $cart->totalProduct = count($cart->products);
                $cart->totalPrice = $totalPrice;
                Session::put('cart', value: $cart);
            } else {
                Session::forget('cart');
            }
        }
    }
    
}
