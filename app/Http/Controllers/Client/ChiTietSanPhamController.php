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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ChiTietSanPhamController extends Controller
{
    public function index(){

        return view('clients.chitietsanpham');

    }
    public function show(string $id)
    {
        // Tìm sản phẩm mà không bao gồm các sản phẩm đã xóa mềm
        $sanpham = SanPham::withTrashed()->find($id);
        
        if ($sanpham) {
            // Lấy các biến thể của sản phẩm, bao gồm cả những biến thể đã xóa mềm
            $bienthesanphams = BienTheSanPham::withTrashed()->where('san_pham_id', $id)->get();
            
            // Lấy hình ảnh sản phẩm
            $anhsanphams = HinhAnhSanPham::where('san_pham_id', $id)->get();
            
            // Lấy màu sắc và dung lượng của từng biến thể
            $mauSacIds = $bienthesanphams->pluck('mau_sac_id')->unique(); // Lấy id màu sắc từ các biến thể
            $mauSacs = MauSac::whereIn('id', $mauSacIds)->get(); // Truy vấn màu sắc tương ứng
    
            $dungLuongIds = $bienthesanphams->pluck('dung_luong_id')->unique(); // Lấy id dung lượng từ các biến thể
            $dungLuongs = DungLuong::whereIn('id', $dungLuongIds)->get(); // Truy vấn dung lượng tương ứng
            
            // Lấy danh sách đánh giá sản phẩm với phân trang
            $danhgias = DanhGiaSanPham::latest('id')->where('san_pham_id', $id)->paginate(10);
            
            // Tính điểm trung bình
            $diemtrungbinh = DanhGiaSanPham::where('san_pham_id', $id)->avg('diem_so');
            
            // Tính số lượt đánh giá
            $soluotdanhgia = DanhGiaSanPham::where('san_pham_id', $id)->count(); // Tổng số đánh giá
    
            // Tính tỷ lệ phần trăm cho mỗi loại sao
            $starCounts = DanhGiaSanPham::select(DB::raw('diem_so, count(*) as count'))
                ->where('san_pham_id', $id)
                ->groupBy('diem_so')
                ->pluck('count', 'diem_so');
    
            $totalRatings = $starCounts->sum(); // Tổng số đánh giá
            $starPercentage = [];
    
            for ($i = 1; $i <= 5; $i++) {
                $percentage = $totalRatings > 0 ? ($starCounts->get($i, 0) / $totalRatings) * 100 : 0;
                $starPercentage[$i] = $percentage;
            }
    
            // Trả về view client với các biến cần thiết
            return view('clients.chitietsanpham', compact(
                'sanpham', 
                'bienthesanphams', 
                'anhsanphams', 
                'mauSacs', // Truyền thông tin màu sắc vào view
                'dungLuongs', // Truyền thông tin dung lượng vào view
                'danhgias', 
                'diemtrungbinh', 
                'soluotdanhgia', // Tổng số đánh giá
                'starPercentage' // Truyền tỷ lệ phần trăm sao vào view
            ));
        }
    
        // Chuyển hướng nếu không tìm thấy sản phẩm
        return redirect()->route('clients.chitietsanpham')->with('error', 'Không tìm thấy sản phẩm');
    }
    public function layGiaBienThe(Request $request)
{
    $sanPhamId = $request->input('san_pham_id');
    $mauSacId = $request->input('mau_sac_id');
    $dungLuongId = $request->input('dung_luong_id');

    // Lấy biến thể tương ứng với sản phẩm, màu sắc và dung lượng
    $bienThe = BienTheSanPham::where('san_pham_id', $sanPhamId)
        ->where('mau_sac_id', $mauSacId)
        ->where('dung_luong_id', $dungLuongId)
        ->first();

    if ($bienThe) {
        return response()->json([
            'status' => 'success',
            'gia_moi' => $bienThe->gia_moi,
        ]);
    }

    return response()->json([
        'status' => 'error',
        'message' => 'Không tìm thấy biến thể.',
    ]);
}


    
}
