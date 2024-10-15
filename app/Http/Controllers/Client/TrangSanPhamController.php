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
    public function index(Request $request) {
        // Lấy tất cả danh mục và dung lượng
        $listDanhMuc = DanhMuc::all();
        $listDungLuong = DungLuong::all();
    
        // Lấy ID danh mục từ query string (nếu có)
        $categoryId = $request->input('danh_muc_id');
    
        // Lấy danh sách dung_luong_id từ request (nếu có)
        $dungLuongIds = $request->input('dung_luong_id');
    
        // Lọc sản phẩm theo danh mục và dung lượng
        $listSanPham = SanPham::when($categoryId, function($query) use ($categoryId) {
                return $query->where('danh_muc_id', (int)$categoryId);
            })
            ->when($dungLuongIds, function($query) use ($dungLuongIds) {
                return $query->whereHas('bienTheSanPhams', function($q) use ($dungLuongIds) {
                    $q->whereIn('dung_luong_id', $dungLuongIds);
                });
            })
            ->get();
    
        return view('clients.trangsanpham', compact('listSanPham', 'listDanhMuc', 'listDungLuong', 'categoryId', 'dungLuongIds'));
    }    
}
