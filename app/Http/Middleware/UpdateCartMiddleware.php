<?php

namespace App\Http\Middleware;

use App\Models\BienTheSanPham;
use App\Models\SanPham;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class UpdateCartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
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
        return $next($request);
    }
}
