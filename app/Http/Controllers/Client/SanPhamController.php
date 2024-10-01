<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index(){

        return view('clients.trangsanpham');

    }
}
