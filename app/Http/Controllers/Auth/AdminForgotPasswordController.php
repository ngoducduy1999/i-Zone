<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Notifications\AdminResetPasswordNotification;

class AdminForgotPasswordController extends Controller
{
    // Hiển thị form yêu cầu email để gửi link đặt lại mật khẩu
    public function showLinkRequestForm()
    {
        return view('auth.passwords.admin-email');
    }

    // Hiển thị form reset với token và email
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.admin-reset')->with([
            'token' => $token,
            'email' => $request->email
        ]);
    }

    // Gửi link đặt lại mật khẩu
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('admins')->sendResetLink(
            $request->only('email'),
            function ($admin, $token) {
                // Tùy chỉnh URL
                $url = url(route('admin.password.reset', [
                    'token' => $token,
                    'email' => $admin->getEmailForPasswordReset(),
                ], false));

                // Sử dụng Notification với URL custom
                $admin->notify(new AdminResetPasswordNotification($url));
            }
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // Xử lý việc đặt lại mật khẩu
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($admin, $password) {
                $admin->forceFill([
                    'mat_khau' => Hash::make($password), // Sử dụng cột 'mat_khau'
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('admin.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
