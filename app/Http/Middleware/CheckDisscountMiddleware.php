<?php

namespace App\Http\Middleware;

use App\Models\KhuyenMai;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDisscountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $discounts = KhuyenMai::get();
        if($discounts){
            foreach($discounts as $discount){
                $now = Carbon::now();
                if ($discount->ngay_ket_thuc < $now) {
                    $discount->update(['trang_thai' => false]);
                }
            }
        }
        return $next($request);
    }
}
