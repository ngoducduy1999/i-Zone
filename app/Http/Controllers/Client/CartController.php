<?php

namespace App\Http\Controllers\Client;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\BienTheSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;

class CartController extends Controller
{
    


    public function AddCart(Request $request, string $id)
    {
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
}
