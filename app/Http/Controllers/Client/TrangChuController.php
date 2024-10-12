<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\Banner;
use App\Models\KhuyenMai;
use App\Models\DanhMuc;

class TrangChuController extends Controller
{
    
    public function index()
    {
         // Lấy các banner có trạng thái là hiển thị (ví dụ trang_thai = 1)
         $banners = Banner::where('trang_thai', 1)->orderBy('created_at', 'desc')->first(); // Bản ghi mới nhất
        $banners1 = Banner::where('trang_thai', 1)->orderBy('created_at', 'desc')->skip(1)->first(); // Bản ghi mới thứ 2
        $banners2 = Banner::where('trang_thai', 1)->orderBy('created_at', 'desc')->skip(2)->first(); // Bản ghi mới thứ 3
 

         // Lấy danh sách khuyến mãi còn hiệu lực
         $khuyenMais = KhuyenMai::where('trang_thai', 1) // Kiểm tra trạng thái
         ->where('ngay_ket_thuc', '>=', now()) // Kiểm tra ngày kết thúc
         ->orderBy('ngay_ket_thuc', 'asc') // Sắp xếp theo ngày kết thúc gần nhất
         ->take(3) // Lấy 3 khuyến mãi
         ->get();

        // Lấy 10 sản phẩm nổi bật (có lượt xem cao)
        $featuredProducts = SanPham::with('bienThe')
            ->whereNull('deleted_at') // Chỉ lấy sản phẩm chưa xóa
            ->orderBy('luot_xem', 'desc') // Sắp xếp theo lượt xem
            ->take(8) // Lấy 8 sản phẩm
            ->get();

            // Lấy tất cả danh mục
        $danhMucs = DanhMuc::withCount('sanPhams')->get(); // Lấy danh sách danh mục và số lượng sản phẩm
        $sanPhamsMoiNhat = SanPham::with('bienTheSanPhams')
            ->whereNull('deleted_at') // Bỏ qua sản phẩm đã bị xóa mềm
            ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo mới nhất
            ->take(5) // Lấy 5 sản phẩm
            ->get();

        // Trả về view và truyền dữ liệu sang
       return view('clients.trangchu', compact('khuyenMais','banners', 'banners1', 'banners2','featuredProducts','danhMucs'));
    }
}
