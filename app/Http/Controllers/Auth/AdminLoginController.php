<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminLoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        // khi vào admin bắt buộc phải đăng nhập lại
        if (Auth::check()) {
            Auth::logout();
            return view('auth.admin_login');
        } else {
            return view('auth.admin_login');
        }
        // // khi đăng nhập ở client có role:admin,staff thì không cần đăng nhập
        // if (Auth::check()) {
        //     if(Auth::user()->vai_tro=='admin' || Auth::user()->vai_tro=='staff'){
        //         return redirect()->route('admin.dashboard');
        //     }
        //     return view('auth.admin_login');
        // } else {
        //     return view('auth.admin_login');
        // }
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
            // Chuyển hướng dựa trên vai trò
            if ($user->vai_tro == 'admin' || $user->vai_tro == 'staff') {
                return redirect()->route('admin.dashboard');
            } 
            // elseif ($user->vai_tro == 'staff') {
            //     return redirect()->route('staff.dashboard'); // Thêm route dành cho staff
            // }
            else {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Bạn không có quyền truy cập']);
            }
        }

        // Đăng nhập thất bại
        return redirect()->back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác']);
    }
     // Xử lý đăng xuất
     public function logout()
     {
         Auth::logout();
         return redirect('/admin');
     }
}
