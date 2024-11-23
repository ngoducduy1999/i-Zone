<?php

// app/Http/Middleware/RoleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Kiểm tra nếu người dùng có bất kỳ vai trò nào trong danh sách
        if (!in_array(auth()->user()->vai_tro, $roles)) {
            return redirect()->route('home'); // Hoặc trả về lỗi nếu không có quyền
        }

        return $next($request);
    }
}
