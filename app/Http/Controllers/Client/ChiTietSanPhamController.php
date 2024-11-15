<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BienTheSanPham;
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
    
        if ($sanpham) {
            $sanpham->increment('luot_xem');
            $tagsanphams = TagSanPham::where('san_pham_id', $id)->get();
            $bienthesanphams = BienTheSanPham::withTrashed()->where('san_pham_id', $id)->get();
            $anhsanphams = HinhAnhSanPham::where('san_pham_id', $id)->get();
    
            $mauSacIds = $bienthesanphams->pluck('mau_sac_id')->unique();
            $mauSacs = MauSac::whereIn('id', $mauSacIds)->get();
    
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
    
            // Lấy sản phẩm mới nhất, bán nhiều nhất, xem nhiều nhất, và có giảm giá nhiều nhất trên toàn bộ bảng
            $sanPhamMoiNhat = SanPham::latest()->first();
            $sanPhamBanNhieuNhat = SanPham::orderBy('da_ban', 'desc')->first();
            $sanPhamXemNhieuNhat = SanPham::orderBy('luot_xem', 'desc')->first();
    
            // Lấy sản phẩm có giảm giá nhiều nhất từ biến thể
            $sanPhamGiamGiaNhieuNhat = SanPham::whereHas('bienthesanphams', function ($query) {
                    $query->orderByRaw('(gia_cu - gia_moi) desc');
                })
                ->with(['bienthesanphams' => function ($query) {
                    $query->orderByRaw('(gia_cu - gia_moi) desc')->limit(1);
                }])
                ->first();
                $isLoved = [];
                $products = [];
            if(Auth::user()){
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
                'sanPhamBanNhieuNhat',
                'sanPhamXemNhieuNhat',
                'sanPhamGiamGiaNhieuNhat',
                'products',
                'isLoved',
                'hasReview'
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
    
}
