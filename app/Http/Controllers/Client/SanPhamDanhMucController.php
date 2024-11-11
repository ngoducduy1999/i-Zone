<?php

namespace App\Http\Controllers\Client;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SanPhamDanhMucController extends Controller
{
    public function index(Request $request, $danh_muc_id)
{
    // Lọc sản phẩm và xử lý tìm kiếm
    $query = SanPham::with(['bienTheSanPhams', 'danhGias']);
    if ($request->filled('search')) {
        $query->where('ten_san_pham', 'like', '%' . $request->search . '%');
    }

    // Lọc sản phẩm theo danh mục
    $sanPhams = $query->where('danh_muc_id', $danh_muc_id)->paginate(12);

    // Lấy danh mục hiện tại (đảm bảo là 1 đối tượng, không phải collection)
    $danhMuc = DanhMuc::findOrFail($danh_muc_id); // Tìm danh mục theo ID

    // Lấy tất cả danh mục (nếu cần)
    $danhMucs = DanhMuc::all();

    // Kiểm tra có sản phẩm nào không
    $hasProducts = $sanPhams->isNotEmpty();

    // Trả về view với các dữ liệu cần thiết
    return view('clients.sanpham_danhmuc', compact('sanPhams', 'danhMucs', 'danhMuc', 'danh_muc_id', 'hasProducts'));
}
}
