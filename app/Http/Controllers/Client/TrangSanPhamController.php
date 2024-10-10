<?php

namespace App\Http\Controllers\Client;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\DungLuong;
use App\Models\MauSac;

class TrangSanPhamController extends Controller
{
    public function index(Request $request){  
        // Lấy tất cả danh mục
        $listDanhMuc = DanhMuc::all(); 

        // Lấy ID danh mục từ query string (nếu có)
        $categoryId = $request->route('id');
        // dd($categoryId); 

        // Lọc sản phẩm theo danh mục, nếu không có danh mục thì hiển thị tất cả sản phẩm
        $listSanPham = SanPham::when($categoryId, function($query) use ($categoryId) {
            return $query->where('danh_muc_id', (int)$categoryId); // Chuyển đổi thành số nguyên
                })
                ->get();
        // Trả về view và truyền dữ liệu
        return view('clients.trangsanpham', compact('listSanPham', 'listDanhMuc', 'categoryId'));
    }
}
