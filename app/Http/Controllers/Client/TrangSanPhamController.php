<?php

namespace App\Http\Controllers\Client;

use App\Models\MauSac;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\DungLuong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TrangSanPhamController extends Controller
{
    public function index(Request $request) {
        // Lấy danh sách danh mục, dung lượng và màu sắc
        $listDanhMuc = DanhMuc::all();
        $listDungLuong = DungLuong::all();
        $listMauSac = MauSac::all();
    
        // Lấy các giá trị từ request
        $categoryId = $request->input('danh_muc_id');
        $dungLuongIds = $request->input('dung_luong_id', []);
        $mauSacIds = $request->input('mau_sac_id', []);
        $priceRange = $request->input('price_range');
    
        $perPage = 10; 
    
        // Lọc sản phẩm
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
        ->when(!empty($mauSacIds), function($query) use ($mauSacIds) {
            return $query->whereHas('bienTheSanPhams', function($q) use ($mauSacIds) {
                $q->whereIn('mau_sac_id', $mauSacIds);
            });
        })
        ->paginate(9);
    
        // Lấy sản phẩm được đánh giá cao nhất
        $topRatedProducts = SanPham::join('danh_gia_san_phams', 'san_phams.id', '=', 'danh_gia_san_phams.san_pham_id')
            ->select('san_phams.*', DB::raw('AVG(danh_gia_san_phams.diem_so) as avg_rating'))
            ->groupBy('san_phams.id')
            ->orderByDesc('avg_rating')
            ->take(5)
            ->get();
    
        return view('clients.trangsanpham', compact('listSanPham', 'listDanhMuc', 'listDungLuong', 'listMauSac', 'categoryId', 'dungLuongIds', 'mauSacIds', 'priceRange', 'topRatedProducts'));
    }
}
