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
    // Lấy tất cả các danh mục
    $danhMucs = DanhMuc::withCount('baiViets')->get();

    // Lấy danh mục được chọn từ yêu cầu
    $danhMucId = $request->input('danh_muc');

    // Lấy tất cả các bài viết đã được duyệt và lọc theo danh mục nếu có
    $baiVietQuery = BaiViet::where('trang_thai', true);

    // Nếu có danh mục được chọn, thêm điều kiện lọc
    if ($danhMucId) {
        $baiVietQuery->where('danh_muc_id', $danhMucId);
    }

    // Kiểm tra xem có từ khóa tìm kiếm không
    if ($request->filled('search')) {
        $baiVietQuery->where('tieu_de', 'like', '%' . $request->search . '%')
                      ->orWhere('noi_dung', 'like', '%' . $request->search . '%');
    }

    // Phân trang
    $baiViet = $baiVietQuery->paginate(6); 

    // Lấy thông tin người dùng đã đăng nhập
    $user = auth()->user();

    // Lấy các bài viết mới nhất (giả sử 5 bài mới nhất)
    $latestPosts = BaiViet::where('trang_thai', true)->orderBy('created_at', 'desc')->take(5)->get();

    // Trả về view với các biến cần thiết
    return view('clients.baiviet', compact('baiViet', 'user', 'latestPosts', 'danhMucs'));
}


public function show($id, Request $request)
{
    $danhMucs = DanhMuc::withCount('baiViets')->get();
    $danhMucId = $request->input('danh_muc');
    $baiVietQuery = BaiViet::where('trang_thai', true);
    if ($danhMucId) {
        $baiVietQuery->where('danh_muc_id', $danhMucId);
    }
    $post = BaiViet::with(['user', 'danhMuc'])->findOrFail($id);

    $user = auth()->user();

    $latestPosts = BaiViet::where('trang_thai', true)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

    return view('clients.chitietbaiviet', [
        'post' => $post,
        'user' => $user,
        'latestPosts' => $latestPosts,
        'danhMucs' => $danhMucs,
    ]);
}


}
