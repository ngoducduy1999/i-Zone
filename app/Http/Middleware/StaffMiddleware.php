<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->vai_tro == 'staff') {
            return $next($request);
        }

        return redirect('/'); // Chuyển hướng nếu không phải là staff
    }
}
