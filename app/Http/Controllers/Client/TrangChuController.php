<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\Banner;

class TrangChuController extends Controller
{
    
    public function index()
    {
         // Lấy các banner có trạng thái là hiển thị (ví dụ trang_thai = 1)
         $banners = Banner::where('trang_thai', 1)->orderBy('created_at', 'desc')->first(); // Bản ghi mới nhất
        $banners1 = Banner::where('trang_thai', 1)->orderBy('created_at', 'desc')->skip(1)->first(); // Bản ghi mới thứ 2
        $banners2 = Banner::where('trang_thai', 1)->orderBy('created_at', 'desc')->skip(2)->first(); // Bản ghi mới thứ 3
         // Trả về view và truyền dữ liệu banners sang
         return view('clients.trangchu', compact('banners', 'banners1', 'banners2'));
    }
}
