<?php

namespace App\Http\Controllers\Client;

use App\Models\MauSac;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\DungLuong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrangSanPhamController extends Controller
{
    public function index(Request $request) {
        // Lấy các thuộc tính để hiển thị form lọc
        $danhMucs = DanhMuc::all();
        $dungLuongs = DungLuong::all();
        $mauSacs = MauSac::all();
        $query = SanPham::with(['bienTheSanPhams', 'danhGias']); // Tải trước các quan hệ
    
        // Lọc theo danh mục
        if ($request->has('danh_muc') && $request->danh_muc != '') {
            $query->where('danh_muc_id', $request->danh_muc);
        }
    
        // Lọc theo dung lượng
        if ($request->has('dung_luong') && !empty($request->dung_luong)) {
            $query->whereHas('bienTheSanPhams', function($q) use ($request) {
                $q->whereIn('dung_luong_id', $request->dung_luong);
            });
        }
    
        // Lọc theo màu sắc
        if ($request->has('mau_sac') && !empty($request->mau_sac)) {
            $query->whereHas('bienTheSanPhams', function($q) use ($request) {
                $q->whereIn('mau_sac_id', $request->mau_sac);
            });
        }
    
        // Lọc theo giá
        if ($request->has('price') && is_array($request->price)) {
            $query->whereHas('bienTheSanPhams', function($q) use ($request) {
                $q->where(function($query) use ($request) {
                    foreach ($request->price as $priceRange) {
                        switch ($priceRange) {
                            case 'duoi-1-trieu':
                                $query->orWhere('gia_moi', '<', 1000000);
                                break;
                            case '1-den-5-trieu':
                                $query->orWhereBetween('gia_moi', [1000000, 5000000]);
                                break;
                            case '5-den-10-trieu':
                                $query->orWhereBetween('gia_moi', [5000000, 10000000]);
                                break;
                            case '10-den-20-trieu':
                                $query->orWhereBetween('gia_moi', [10000000, 20000000]);
                                break;
                            case 'tren-20-trieu':
                                $query->orWhere('gia_moi', '>', 20000000);
                                break;
                        }
                    }
                });
            });
        }
    
        // Lấy tất cả sản phẩm và đánh giá của chúng
        $listSanPham = $query->paginate(9);
    
        // Lấy 4 sản phẩm với điểm số đánh giá trung bình cao nhất
        $products = SanPham::with('danhGias')
        ->whereHas('danhGias') // Chỉ lấy sản phẩm có đánh giá
        ->get()
        ->sortByDesc(function($product) {
            return $product->danhGias->count() > 0 ? $product->danhGias->avg('diem_so') : 0; // Kiểm tra có đánh giá hay không
        })->take(4); // Lấy 4 sản phẩm đánh giá cao nhất
    
        return view('clients.trangsanpham', compact('listSanPham', 'danhMucs', 'dungLuongs', 'mauSacs', 'products'));
    }
      
}    