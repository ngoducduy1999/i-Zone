<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Notifications\CustomerForgotPasswordNoti;

class CustomerForgotPassword extends Controller
{
    //
    public function ShowformForgotPasswword()
    {
        return view('auth.passwords.customer-email');
    }

    public function formResetPassword(Request $request, $token = null){
        return view('auth.passwords.customer-reset')->with([
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function SendEmailForgot(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('users')->sendResetLink(
            $request->only('email'),
            function ($admin, $token) {
                // Tùy chỉnh URL
                $path = url(route('customer.password.reset', [
                    'token' => $token,
                    'email' => $admin->getEmailForPasswordReset(),
                ], false));

                // Sử dụng Notification với URL custom
                $admin->notify(new CustomerForgotPasswordNoti($path));
            }
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);

    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($customer, $password) {
                $customer->forceFill([
                    'mat_khau' => Hash::make($password), // Sử dụng cột 'mat_khau'
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('customer.login.post')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}
