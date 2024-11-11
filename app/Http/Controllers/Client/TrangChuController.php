<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\Banner;
use App\Models\KhuyenMai;
use App\Models\DanhMuc;
use App\Models\BaiViet;

class TrangChuController extends Controller
{
    
    public function index()
    {
         // Lấy các banner có trạng thái là hiển thị (ví dụ trang_thai = 1)
         $banners = Banner::all();

         // Lấy danh sách khuyến mãi còn hiệu lực
         $khuyenMais = KhuyenMai::where('trang_thai', 1) // Kiểm tra trạng thái
         ->where('ngay_ket_thuc', '>=', now()) // Kiểm tra ngày kết thúc
         ->orderBy('ngay_ket_thuc', 'asc') // Sắp xếp theo ngày kết thúc gần nhất
         ->take(5) // Lấy  khuyến mãi
         ->get();

        // Lấy 10 sản phẩm nổi bật (có lượt xem cao)
        $sanPhamsNoiBat = SanPham::with('bienThe')
            ->whereNull('deleted_at') // Chỉ lấy sản phẩm chưa xóa
            ->orderBy('luot_xem', 'desc') // Sắp xếp theo lượt xem
            ->take(8) // Lấy 8 sản phẩm
            ->get();

            // Lấy tất cả danh mục
        $danhMucs = DanhMuc::withCount('sanPhams')->get(); // Lấy danh sách danh mục và số lượng sản phẩm
        $sanPhamsMoiNhat = SanPham::with('bienThe')
            ->whereNull('deleted_at') // Bỏ qua sản phẩm đã bị xóa mềm
            ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo mới nhất
            ->take(6) // Lấy 6 sản phẩm
            ->get();

        $sanPhams = SanPham::with('bienThe')
            ->whereNull('deleted_at') // Bỏ qua những sản phẩm đã bị xóa mềm
            ->inRandomOrder() // Lấy ngẫu nhiên
            ->limit(8) // Giới hạn số lượng sản phẩm muốn lấy
            ->get();    

        // Lấy danh sách bài viết với trạng thái là 'active' (ví dụ trang_thai = 1)
        $baiViets = BaiViet::where('trang_thai', 1)
            ->orderBy('created_at', 'desc') // Sắp xếp bài viết theo ngày tạo mới nhất
            ->get();    

        // Trả về view và truyền dữ liệu sang
       return view('clients.trangchu', compact('khuyenMais','banners','sanPhamsNoiBat','danhMucs','sanPhamsMoiNhat','sanPhams','baiViets'));
    }
}
