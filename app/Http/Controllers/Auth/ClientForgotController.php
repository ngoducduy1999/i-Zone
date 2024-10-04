<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientForgotController extends Controller
{
    public function showForgot(){

        return view('clients.forgot');

    }
}
