<?php

namespace App\Http\Controllers\Client;

use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrangSanPhamController extends Controller
{
    public function index(){
        $listSanPham = SanPham::query()->get();
        return view('clients.trangsanpham', compact('listSanPham'));
    }
}
