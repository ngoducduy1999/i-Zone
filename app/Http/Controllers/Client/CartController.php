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
        $this->UpdateProducts();
        return view('clients.cart.cart');
    }

    public function AddCart(Request $request, string $id)
    {
        $this->UpdateProducts();
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
        $this->UpdateProducts();
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
        $this->UpdateProducts();
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
        $this->UpdateProducts();
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
        $this->UpdateProducts();
        return view('clients.cart.cart-drop');
    }

    public function  CartList()
    {
        $this->UpdateProducts();
        return view('clients.cart.cart-list');
    }


    public function discount(Request $request, string $discountCode)
    {
        $this->UpdateProducts();
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

                return view('clients.cart.cart-list', ['discount' => $discountPercentage]);
            } else {
                return response()->json(['message' => 'Mã giảm giá đã hết hạn.'], 400);
            }
        }
        return response()->json(['message' => 'Mã giảm giá không hợp lệ.'], 404);
    }

    public function UpdateProducts()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            foreach ($cart->products as $idbt => $product) {
                $bienThe = BienTheSanPham::where('id', $idbt)->first();
                if ($bienThe) {
                    $cart->products[$idbt]['bienthe'] = $bienThe;
                    if ($product['quantity'] > $bienThe->so_luong) {
                        $cart->products[$idbt]['quantity'] = $bienThe->so_luong;
                    }
                }
            }
            Session::put('cart', $cart);
        }
    }
}
