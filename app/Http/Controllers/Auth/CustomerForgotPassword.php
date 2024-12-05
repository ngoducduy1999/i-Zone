<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
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

    
}
