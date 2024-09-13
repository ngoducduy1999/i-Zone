<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'mat_khau' => 'required',
        ],
        [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'mat_khau.required' => 'Mật khẩu không được để trống',
        ]);
        
        // Thay đổi tên cột mật khẩu trong việc xác thực
        $credentials = [
            'email' => $request->email,
            'password' => $request->mat_khau,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Chuyển hướng dựa trên vai trò
            if ($user->vai_tro == 'admin') {
                return redirect()->route('admin');
            } elseif ($user->vai_tro == 'staff') {
                return redirect()->route('staff'); // Thêm route dành cho staff
            }

            // Đăng nhập thành công (không phải admin hoặc staff)
            return redirect()->intended('/');
        }

        // Đăng nhập thất bại
        return redirect()->back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác']);
    }

    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
