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
    
        // Truyền giá trị đã chọn vào biến để sử dụng trong view
        $selectedDungLuongs = $request->input('dung_luong', []); // Dung lượng đã chọn
        $selectedColors = $request->input('mau_sac', []); // Màu sắc đã chọn
    
        // Tìm kiếm theo tên sản phẩm
        if ($request->filled('search')) {
            $query->where('ten_san_pham', 'like', '%' . $request->search . '%');
        }
    
        // Lọc theo danh mục
        if ($request->filled('danh_muc')) {
            $query->where('danh_muc_id', $request->danh_muc);
        }
    
        // Lọc theo dung lượng
        if ($request->filled('dung_luong')) {
            $selectedDungLuongs = is_array($request->dung_luong) 
                ? $request->dung_luong // Nếu là mảng, giữ nguyên
                : explode(',', $request->dung_luong); // Nếu là chuỗi, tách thành mảng
    
            $query->whereHas('bienTheSanPhams', function($q) use ($selectedDungLuongs) {
                $q->whereIn('dung_luong_id', $selectedDungLuongs);
            });
        }
    
        // Lọc theo màu sắc
        if ($request->filled('mau_sac')) {
            $selectedColors = is_array($request->mau_sac) 
                ? $request->mau_sac 
                : explode(',', $request->mau_sac);
        
            if (!empty($selectedColors)) {
                $query->whereHas('bienTheSanPhams', function($q) use ($selectedColors) {
                    $q->whereIn('mau_sac_id', $selectedColors);
                });
            }
        }
    
        // Lọc theo giá
        if ($request->has('price') && is_array($request->price)) {
            $query->whereHas('bienTheSanPhams', function($q) use ($request) {
                $q->where(function($query) use ($request) {
                    foreach ($request->price as $priceRange) {
                        switch ($priceRange) {
                            case 'duoi-5-trieu':
                                $query->orWhere('gia_moi', '<', 5000000);
                                break;
                            case '5-den-10-trieu':
                                $query->orWhereBetween('gia_moi', [5000000, 10000000]);
                                break;
                            case '10-den-20-trieu':
                                $query->orWhereBetween('gia_moi', [10000000, 20000000]);
                                break;
                            case '20-den-30-trieu':  
                                $query->orWhereBetween('gia_moi', [20000000, 30000000]);
                                break;
                            case 'tren-30-trieu':  
                                $query->orWhere('gia_moi', '>', 30000000);
                                break;
                        }
                    }
                });
            });
        }
    
        // Lấy tất cả sản phẩm và đánh giá của chúng
        $listSanPham = $query->paginate(12);
    
        // Kiểm tra xem có sản phẩm nào không
        $hasProducts = $listSanPham->isNotEmpty(); // true nếu có sản phẩm, false nếu không có
    
        // Lấy 4 sản phẩm với điểm số đánh giá trung bình cao nhất
        $products = SanPham::with('danhGias')
            ->whereHas('danhGias') // Chỉ lấy sản phẩm có đánh giá
            ->withAvg('danhGias', 'diem_so') // Tính điểm trung bình trực tiếp
            ->orderByDesc('danh_gias_avg_diem_so') // Sắp xếp theo điểm trung bình
            ->take(4)
            ->get();
    
        // Trả về view với các giá trị đã chọn
        return view('clients.trangsanpham', compact('listSanPham', 'danhMucs', 'dungLuongs', 'mauSacs', 'products', 'hasProducts', 'selectedDungLuongs', 'selectedColors'));
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
           ->orderBy('created_at', 'desc') // Sắp xếp theo cột luot_xem giảm dần
           ->limit(5) // Giới hạn kết quả tìm kiếm tối đa 5 sản phẩm
           ->get();
        return response()->json($sanPhams);
    }

}
