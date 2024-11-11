<?php

namespace App\Http\Controllers\Client;

use App\Models\MauSac;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\DungLuong;
use Illuminate\Http\Request;
use App\Models\BienTheSanPham;
use App\Http\Controllers\Controller;

class SanPhamDanhMucController extends Controller
{
    public function index(Request $request, $danh_muc_id)
{
    // Khởi tạo truy vấn cơ bản cho SanPham
    $query = SanPham::with(['bienTheSanPhams', 'danhGias']);

    // Xử lý tìm kiếm theo tên sản phẩm
    if ($request->filled('search')) {
        $query->where('ten_san_pham', 'like', '%' . $request->search . '%');
    }

    // Xử lý lọc theo giá
    if ($request->filled('price_range')) {
        switch ($request->price_range) {
            case 'under_1m':
                $query->whereHas('bienTheSanPhams', function ($q) {
                    $q->where('gia_moi', '<', 1000000);
                });
                break;
            case '1m_5m':
                $query->whereHas('bienTheSanPhams', function ($q) {
                    $q->whereBetween('gia_moi', [1000000, 5000000]);
                });
                break;
            case '5m_10m':
                $query->whereHas('bienTheSanPhams', function ($q) {
                    $q->whereBetween('gia_moi', [5000000, 10000000]);
                });
                break;
            case '10m_20m':
                $query->whereHas('bienTheSanPhams', function ($q) {
                    $q->whereBetween('gia_moi', [10000000, 20000000]);
                });
                break;
            case 'above_20m':
                $query->whereHas('bienTheSanPhams', function ($q) {
                    $q->where('gia_moi', '>', 20000000);
                });
                break;
        }
    }

    // Xử lý lọc theo màu sắc
    if ($request->filled('mau_sac_id')) {
        $query->whereHas('bienTheSanPhams', function ($q) use ($request) {
            $q->where('mau_sac_id', $request->mau_sac_id);
        });
    }

    // Xử lý lọc theo dung lượng
    if ($request->filled('dung_luong_id')) {
        $query->whereHas('bienTheSanPhams', function ($q) use ($request) {
            $q->where('dung_luong_id', $request->dung_luong_id);
        });
    }

    // Xử lý sắp xếp theo giá
    if ($request->filled('price_order')) {
        $query->orderBy(BienTheSanPham::select('gia_moi')
            ->whereColumn('bien_the_san_phams.san_pham_id', 'san_phams.id')
            ->limit(1), $request->price_order);
    }
    
    // Lọc sản phẩm theo danh mục
    $sanPhams = $query->where('danh_muc_id', $danh_muc_id)->paginate(12);

    // Lấy danh mục hiện tại và danh sách tất cả danh mục
    $danhMuc = DanhMuc::findOrFail($danh_muc_id);
    $danhMucs = DanhMuc::all();

    // Lấy danh sách màu sắc và dung lượng
    $mauSacs = MauSac::all();
    $dungLuongs = DungLuong::all();

    // Kiểm tra có sản phẩm nào không
    $hasProducts = $sanPhams->isNotEmpty();

    // Trả về view với các dữ liệu cần thiết
    return view('clients.sanpham_danhmuc', compact('sanPhams', 'danhMucs', 'danhMuc', 'danh_muc_id', 'hasProducts', 'mauSacs', 'dungLuongs'));
}

}
