<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GioithieuController extends Controller
{
    //
    public function index()
    {
        return view('clients.gioithieu'); // Đảm bảo rằng file view 'gioithieu' tồn tại trong thư mục 'resources/views/client'
    }
}