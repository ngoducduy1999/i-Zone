<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BienTheSanPham;
use App\Models\TraLoi;
use App\Models\DanhGiaSanPham;
use App\Models\DanhMuc;
use App\Models\DungLuong;
use App\Models\HinhAnhSanPham;
use App\Models\MauSac;
use App\Models\SanPham;
use App\Models\Tag;
use App\Models\TagSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ChiTietSanPhamController extends Controller
{
    public function index()
    {

        return view('clients.chitietsanpham');
    }
    public function show(string $id)
    {
        $sanpham = SanPham::find($id);
        $danhgias = DanhGiaSanPham::with(['user', 'traLois.user'])->where('san_pham_id', $id)->get();
        if ($sanpham) {
            $sanpham->increment('luot_xem');
            $tagsanphams = TagSanPham::where('san_pham_id', $id)->get();
            $bienthesanphams = BienTheSanPham::withTrashed()->where('san_pham_id', $id)->get();
            $anhsanphams = HinhAnhSanPham::where('san_pham_id', $id)->get();

            $mauSacIds = $bienthesanphams->pluck('mau_sac_id')->unique();
            $mauSacs = MauSac::whereIn('id', $mauSacIds)
                ->where('trang_thai', 1) // Thêm điều kiện trạng thái bằng 1
                ->get();


            $dungLuongIds = $bienthesanphams->pluck('dung_luong_id')->unique();
            $dungLuongs = DungLuong::whereIn('id', $dungLuongIds)->get();

            $danhgias = DanhGiaSanPham::latest('id')->where('san_pham_id', $id)->paginate(10);
            $diemtrungbinh = DanhGiaSanPham::where('san_pham_id', $id)->avg('diem_so');
            $soluotdanhgia = DanhGiaSanPham::where('san_pham_id', $id)->count();
            $danhMucs = DanhMuc::withCount('sanPhams')->get(); // Lấy danh sách danh mục và số lượng sản phẩm
            $hasReview = DanhGiaSanPham::where('san_pham_id', $id)->exists(); // Kiểm tra sản phẩm có đánh giá hay chưa

            $starCounts = DanhGiaSanPham::select(DB::raw('diem_so, count(*) as count'))
                ->where('san_pham_id', $id)
                ->groupBy('diem_so')
                ->pluck('count', 'diem_so');

            $tongDanhGia = $starCounts->sum();
            $phanTramSao = [];
            for ($i = 1; $i <= 5; $i++) {
                $phantram = $tongDanhGia > 0 ? ($starCounts->get($i, 0) / $tongDanhGia) * 100 : 0;
                $phanTramSao[$i] = $phantram;
            }

            $sanPhamMoiNhat = SanPham::latest()->take(5)->with('bienthesanphams', 'danhMuc')->get();

            $isLoved = [];
            $products = [];
            if (Auth::user()) {
                $isLoved = [];
                $products = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams')->get();
                $yeuThichs = Auth::user()->sanPhamYeuThichs()->pluck('san_pham_id')->toArray();
                foreach ($products as $product) {
                    $isLoved[$product->id] = in_array($product->id, $yeuThichs);
                }
            }
            return view('clients.chitietsanpham', compact(
                'danhMucs',
                'sanpham',
                'bienthesanphams',
                'anhsanphams',
                'tagsanphams',
                'mauSacs',
                'dungLuongs',
                'danhgias',
                'diemtrungbinh',
                'soluotdanhgia',
                'phanTramSao',
                'sanPhamMoiNhat',
                'products',
                'isLoved',
                'hasReview',
                'danhgias'
            ));
        }

        return redirect()->route('trangchu')->with('error', 'Không tìm thấy sản phẩm');
    }

    public function layGiaBienThe(Request $request)
    {
        $sanPhamId = $request->input('san_pham_id');
        $mauSacId = $request->input('mau_sac_id');
        $dungLuongId = $request->input('dung_luong_id');

        // Lấy thông tin biến thể sản phẩm từ cơ sở dữ liệu
        $bienThe = BienTheSanPham::where('san_pham_id', $sanPhamId)
            ->where('mau_sac_id', $mauSacId)
            ->where('dung_luong_id', $dungLuongId)
            ->first();

        if ($bienThe && $bienThe->so_luong > 0) {  // Kiểm tra nếu có tồn kho
            return response()->json([
                'status' => 'success',
                'gia_moi' => $bienThe->gia_moi,
                'gia_cu' => $bienThe->gia_cu // Trả về giá cũ
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy biến thể sản phẩm hoặc hết hàng.'
            ]);
        }
    }
    public function getSoLuongBienThe(Request $request)
    {
        $sanPhamId = $request->input('san_pham_id');
        $mauSacId = $request->input('mau_sac_id');
        $dungLuongId = $request->input('dung_luong_id');

        // Lấy biến thể từ cơ sở dữ liệu dựa trên các tham số
        $bienThe = BienTheSanPham::where('san_pham_id', $sanPhamId)
            ->where('mau_sac_id', $mauSacId)
            ->where('dung_luong_id', $dungLuongId)
            ->first();

        // Kiểm tra nếu biến thể tồn tại và trả về số lượng còn lại
        if ($bienThe) {
            return response()->json([
                'status' => 'success',
                'so_luong' => $bienThe->so_luong // Trả về số lượng còn lại
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy biến thể sản phẩm'
            ]);
        }
    }
    public function reply(Request $request, $id)
    {
        // Kiểm tra xem người dùng có phải là admin không
        if (Auth::user()->vai_tro !== 'admin') {
            return redirect()->route('chitietsanpham')->with('error', 'Bạn không có quyền trả lời đánh giá!');
        }

        // Lấy đánh giá cần trả lời
        $danhGia = DanhGiaSanPham::findOrFail($id);

        // Tạo một bản ghi trả lời
        TraLoi::create([
            'danh_gia_id' => $danhGia->id,
            'user_id' => Auth::id(),
            'noi_dung' => $request->input('reply'),
        ]);

        // Sau khi trả lời đánh giá, chuyển hướng về trang chi tiết sản phẩm
        return redirect()->route('chitietsanpham', ['id' => $danhGia->san_pham_id])->with('success', 'Trả lời đánh giá thành công!');
    }
    public function editReply(Request $request, TraLoi $traLoi)
{
    // Kiểm tra quyền chỉnh sửa (chỉ chủ sở hữu hoặc admin mới có thể chỉnh sửa)
    if (Auth::user()->id !== $traLoi->user_id && Auth::user()->vai_tro !== 'admin') {
        return redirect()->route('chitietsanpham.index')->with('error', 'Bạn không có quyền sửa câu trả lời này.');
    }

    // Validate nội dung trả lời
    $request->validate([
        'reply' => 'required|string|max:1000',
    ]);

    // Cập nhật nội dung trả lời
    $traLoi->noi_dung = $request->input('reply');
    $traLoi->save();

    // Lấy ID sản phẩm từ đánh giá liên quan
    $sanPhamId = $traLoi->danhGiaSanPham->san_pham_id;

    // Redirect về chi tiết sản phẩm sau khi sửa
    return redirect()->route('chitietsanpham', ['id' => $sanPhamId])->with('success', 'Câu trả lời đã được cập nhật!');
}
}
