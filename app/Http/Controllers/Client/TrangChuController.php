<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\Banner;
use App\Models\KhuyenMai;

class TrangChuController extends Controller
{
    
    public function index()
    {
         // Lấy các banner có trạng thái là hiển thị (ví dụ trang_thai = 1)
         $banners = Banner::where('trang_thai', 1)->orderBy('created_at', 'desc')->first(); // Bản ghi mới nhất
        $banners1 = Banner::where('trang_thai', 1)->orderBy('created_at', 'desc')->skip(1)->first(); // Bản ghi mới thứ 2
        $banners2 = Banner::where('trang_thai', 1)->orderBy('created_at', 'desc')->skip(2)->first(); // Bản ghi mới thứ 3
         // Trả về view và truyền dữ liệu banners sang

         // Lấy danh sách khuyến mãi còn hiệu lực
         $khuyenMais = KhuyenMai::where('trang_thai', 1) // Kiểm tra trạng thái
         ->where('ngay_ket_thuc', '>=', now()) // Kiểm tra ngày kết thúc
         ->orderBy('ngay_ket_thuc', 'asc') // Sắp xếp theo ngày kết thúc gần nhất
         ->take(3) // Lấy 3 khuyến mãi
         ->get();

       return view('clients.trangchu', compact('khuyenMais','banners', 'banners1', 'banners2'));
    }
}
