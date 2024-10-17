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
        $listDanhMuc = DanhMuc::all();
        $listDungLuong = DungLuong::all();
    
        $categoryId = $request->input('danh_muc_id');
        $dungLuongIds = $request->input('dung_luong_id', []);
        $priceRange = $request->input('price_range'); // Nhận giá trị khoảng giá
    
        // Số sản phẩm trên mỗi trang
        $perPage = 10; // Bạn có thể thay đổi giá trị này theo nhu cầu
    
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
            ->paginate(9); // Phân trang
    
        // Get top-rated products
        $topRatedProducts = SanPham::join('danh_gia_san_phams', 'san_phams.id', '=', 'danh_gia_san_phams.san_pham_id')
            ->select('san_phams.*', DB::raw('AVG(danh_gia_san_phams.diem_so) as avg_rating'))
            ->groupBy('san_phams.id')
            ->orderByDesc('avg_rating')
            ->take(5) // limit to top 5 products
            ->get();
    
        return view('clients.trangsanpham', compact('listSanPham', 'listDanhMuc', 'listDungLuong', 'categoryId', 'dungLuongIds', 'priceRange', 'topRatedProducts'));
    }
    
}
