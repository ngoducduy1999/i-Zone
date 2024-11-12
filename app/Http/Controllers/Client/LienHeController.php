<?php

namespace App\Http\Controllers\Client;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LienHeController extends Controller
{
    public function index(){
        $danhMucs = DanhMuc::all();
        return view('clients.lienhe',compact('danhMucs'));

    }
}
