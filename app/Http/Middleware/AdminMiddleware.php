<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Thay đổi logic của bạn ở đây nếu cần
        if (auth()->user() && auth()->user()->vai_tro == 'admin') {
            return $next($request);
        }
        
        return redirect('/'); // Hoặc chuyển hướng đến trang khác nếu không phải admin
    }
}
