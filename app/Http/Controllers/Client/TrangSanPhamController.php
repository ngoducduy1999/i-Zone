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
    
        if ($request->filled('search')) {
            $query->where('ten_san_pham', 'like', '%' . $request->search . '%');
        }
        
        // Lọc theo danh mục
        if ($request->filled('danh_muc')) {
            $query->where('danh_muc_id', $request->danh_muc);
        }

        // Lọc theo dung lượng
        if ($request->filled('dung_luong')) {
            $query->whereHas('bienTheSanPhams', function($q) use ($request) {
                $q->whereIn('dung_luong_id', $request->dung_luong);
            });
        }

        // Lọc theo màu sắc
        if ($request->filled('mau_sac')) {
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
        $listSanPham = $query->paginate(16);

        // Kiểm tra xem có sản phẩm nào không
        $hasProducts = $listSanPham->isNotEmpty(); // true nếu có sản phẩm, false nếu không có

        // Lấy 4 sản phẩm với điểm số đánh giá trung bình cao nhất
        $products = SanPham::with('danhGias')
            ->whereHas('danhGias') // Chỉ lấy sản phẩm có đánh giá
            ->withAvg('danhGias', 'diem_so') // Tính điểm trung bình trực tiếp
            ->orderByDesc('danh_gias_avg_diem_so') // Sắp xếp theo điểm trung bình
            ->take(4)
            ->get();

        return view('clients.trangsanpham', compact('listSanPham', 'danhMucs', 'dungLuongs', 'mauSacs', 'products', 'hasProducts'));
    }
    public function search(Request $request){
       $searchTerm = $request->get('search');

       // Nếu không có từ khóa tìm kiếm, trả về mảng rỗng
       if (empty($searchTerm)) {
           return response()->json([]);
       }

       // Tìm kiếm sản phẩm theo từ khóa và giới hạn kết quả là 5 sản phẩm
       $sanPhams = SanPham::where('ten_san_pham', 'like', '%' . $searchTerm . '%')
           ->orWhere('ma_san_pham', 'like', '%' . $searchTerm . '%')
           ->whereNull('deleted_at') // Lọc sản phẩm đã xóa
           ->limit(5) // Giới hạn kết quả tìm kiếm tối đa 5 sản phẩm
           ->get();
        return response()->json($sanPhams);
    }

}
