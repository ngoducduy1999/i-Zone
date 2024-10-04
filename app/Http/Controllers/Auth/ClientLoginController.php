<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientLoginController extends Controller
{
    public function showLogin(){

        return view('clients.login');

    }
}
