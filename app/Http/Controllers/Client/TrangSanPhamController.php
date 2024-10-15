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
        $listDanhMuc = DanhMuc::all();
        $listDungLuong = DungLuong::all();
    
        $categoryId = $request->input('danh_muc_id');
        $dungLuongIds = $request->input('dung_luong_id', []);
        $priceRange = $request->input('price_range'); // Nhận giá trị khoảng giá
    
        $listSanPham = SanPham::when($categoryId, function($query) use ($categoryId) {
                return $query->where('danh_muc_id', $categoryId);
            })
            ->when(!empty($dungLuongIds), function($query) use ($dungLuongIds) {
                return $query->whereHas('bienTheSanPhams', function($q) use ($dungLuongIds) {
                    $q->whereIn('dung_luong_id', $dungLuongIds);
                });
            })
            ->when($priceRange, function($query) use ($priceRange) {
                [$minPrice, $maxPrice] = explode('-', $priceRange);
                return $query->whereHas('bienTheSanPhams', function($q) use ($minPrice, $maxPrice) {
                    $q->whereBetween('gia_moi', [(int)$minPrice, (int)$maxPrice]);
                });
            })
            ->get();
    
        return view('clients.trangsanpham', compact('listSanPham', 'listDanhMuc', 'listDungLuong', 'categoryId', 'dungLuongIds', 'priceRange'));
    } 
}
