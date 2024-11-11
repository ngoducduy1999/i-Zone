<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    //
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        $danhMucs = DanhMuc::all();
        return view('auth.customer_login',compact('danhMucs'));
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
        return redirect('');
    }
}
