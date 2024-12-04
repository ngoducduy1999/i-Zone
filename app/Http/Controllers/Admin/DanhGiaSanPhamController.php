<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhGiaSanPham;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use App\Models\BienTheSanPham;
use App\Models\SanPham;
use App\Models\TraLoi;

class DanhGiaSanPhamController extends Controller
{
    // Hiển thị danh sách đánh giá sản phẩm
    public function index(Request $request)
    {
        $query = DanhGiaSanPham::query();

        // Lọc theo sản phẩm
        if ($request->has('san_pham') && $request->san_pham != '') {
            $query->where('san_pham_id', $request->san_pham);
        }

        // Lọc theo điểm số (diem_so)
        if ($request->has('diem_so') && $request->diem_so != '') {
            $query->where('diem_so', $request->diem_so);
        }

        // Lọc theo trạng thái (có câu trả lời hay không)
        if ($request->has('trang_thai') && $request->trang_thai != '') {
            if ($request->trang_thai == '0') {
                $query->doesntHave('replies'); // Không có câu trả lời
            } else {
                $query->has('replies'); // Có câu trả lời
            }
        }

        // Eager load các mối quan hệ (user, sản phẩm, câu trả lời)
        $danhGias = $query->with(['user', 'sanPham', 'replies'])->get();

        $sanPhams = SanPham::all(); // Lấy tất cả sản phẩm cho việc lọc

        return view('admins.danhgias.index', compact('danhGias', 'sanPhams'));
    }

    public function show($danhGiaId)
    {
        
        // Lấy chi tiết đánh giá và các câu trả lời
        $danhGia = DanhGiaSanPham::with(['user', 'traLois.user'])
            ->findOrFail($danhGiaId);
            $title = 'Chi tiết đánh giá sản phẩm';
        // Lấy các ID hóa đơn của người dùng có trạng thái là 'hoàn thành'
        $hoaDonIds = HoaDon::where('user_id', $danhGia->user_id)
            ->where('trang_thai', 7) // Trạng thái = 7 (hoàn thành)
            ->pluck('id');

        // Lấy các ID biến thể đã mua cho từng hóa đơn
        $bienTheIds = ChiTietHoaDon::whereIn('hoa_don_id', $hoaDonIds)
            ->whereHas('bienTheSanPham', function ($query) use ($danhGia) {
                $query->where('san_pham_id', $danhGia->san_pham_id); // Lọc theo sản phẩm trong đánh giá
            })
            ->pluck('bien_the_san_pham_id');

        // Lấy các biến thể đã mua và gán vào đánh giá
        $danhGia->bienTheDaMua = BienTheSanPham::whereIn('id', $bienTheIds)
            ->with(['mauSac', 'dungLuong']) // Lấy thêm thông tin màu sắc và dung lượng
            ->get();

        // Trả về view với dữ liệu chi tiết đánh giá
        return view('admins.danhgias.show', compact('danhGia','title'));
    }

    // Xử lý trả lời đánh giá
    public function traLoi(Request $request, $danhGiaId)
    {
        // Kiểm tra nếu người dùng là admin (hoặc có quyền trả lời)
        $this->validate($request, [
            'noi_dung' => 'required|string|max:500',
        ]);

        // Lấy đánh giá tương ứng
        $danhGia = DanhGiaSanPham::findOrFail($danhGiaId);

        // Tạo câu trả lời mới từ admin
        TraLoi::create([
            'danh_gia_id' => $danhGiaId,
            'user_id' => auth()->id(), // ID của admin hoặc người quản trị
            'noi_dung' => $request->noi_dung,
        ]);

        // Chuyển hướng lại trang chi tiết đánh giá với thông báo
        return redirect()->route('admin.Danhgias.show', $danhGiaId)
                         ->with('success', 'Trả lời thành công!');
    }
    public function updateResponse(Request $request, $id)
{
    $traLoi = TraLoi::find($id);
    
    if ($traLoi) {
        $traLoi->noi_dung = $request->noi_dung;
        $traLoi->save();
    }

    return redirect()->back()->with('success', 'Cập nhật câu trả lời thành công.');
}

}


