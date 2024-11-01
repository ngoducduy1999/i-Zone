<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\BaiViet;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrangBaiVietController extends Controller
{
    public function index(Request $request)
{
    $danhMucs = DanhMuc::withCount('baiViets')->get();

    // Kiểm tra xem có tham số danh mục không
    $selectedCategory = $request->input('danh_muc');

    if ($selectedCategory) {
        // Lọc bài viết theo danh mục và phân trang
        $baiViet = BaiViet::where('danh_muc_id', $selectedCategory)->paginate(5); // Số lượng bài viết mỗi trang
    } else {
        // Lấy tất cả bài viết và phân trang
        $baiViet = BaiViet::paginate(5); // Số lượng bài viết mỗi trang
    }

    $user = User::find(1);
    $latestPosts = BaiViet::orderBy('created_at', 'desc')->take(5)->get();

    return view('clients.baiviet', compact('baiViet', 'user', 'danhMucs', 'latestPosts'));
}

}
