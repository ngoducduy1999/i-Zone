<?php

namespace App\Http\Controllers\Client;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SanPhamDanhMucController extends Controller
{
    public function index($danh_muc_id)
    {
        // Lọc các sản phẩm theo `danh_muc_id`
        $danhMucs = DanhMuc::all();
        $sanPhams = SanPham::where('danh_muc_id', $danh_muc_id)->get();

        // Trả về view riêng biệt cho sản phẩm theo danh mục
        return view('clients.sanpham_danhmuc', compact('sanPhams', 'danhMucs'));
    }
}
