<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    // Hiển thị trang đăng ký
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mat_khau' => 'required|string|min:8',
            'so_dien_thoai' => 'required|string|max:20',
            'ngay_sinh' => 'required|date',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Tạo người dùng mới
        $user = User::create([
            'ten' => $request->input('ten'),
            'email' => $request->input('email'),
            'mat_khau' => Hash::make($request->input('mat_khau')),
            'so_dien_thoai' => $request->input('so_dien_thoai'),
            'ngay_sinh' => $request->input('ngay_sinh'),
            'vai_tro' => 'user', // Default role for new users
        ]);
    
        event(new Registered($user));
    
        return redirect()->route('login')->with('success', 'Registration successful.');
    }
}
