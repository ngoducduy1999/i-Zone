<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\Banner;
use App\Models\KhuyenMai;
use App\Models\DanhMuc;
use App\Models\BaiViet;
use Illuminate\Support\Facades\Auth;

class TrangChuController extends Controller
{
    public function index()
    {
        $bannersHeas = Banner::where('vi_tri', 'header')->where('trang_thai', 1)->get(); // w 420 h 350
        $bannersSides = Banner::where('vi_tri', 'sidebar')->where('trang_thai', 1)->limit(2)->get();
        $bannersFoots = Banner::where('vi_tri', 'footer')->where('trang_thai', 1)->get(); // w 420 h 350
        $danhMucs = DanhMuc::withCount('sanPhams')->get();
        $khuyenMais = KhuyenMai::where('trang_thai', 1)
            ->where('ngay_bat_dau', '<=', now())
            ->where('ngay_ket_thuc', '>=', now())
            ->orderBy('ngay_ket_thuc', 'asc')
            ->get();
        $products = SanPham::limit(8)
            ->with('bienTheSanPhams', 'hinhAnhSanPhams')
            ->orderBy('luot_xem', 'desc')
            ->get();
        $allIdProducts = $products->pluck('id')->toArray();
        $newProducts = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams')
            ->whereNotIn('id', $allIdProducts)
            ->latest()
            ->limit(6)
            ->get();
        $allIdNewProducts = $newProducts->pluck('id')->toArray();
        $randProducts = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams')
            ->whereNotIn('id', $allIdProducts)
            ->whereNotIn('id', $allIdNewProducts)
            ->inRandomOrder()
            ->limit(4)
            ->get();
        if (Auth::user()) {
            $isLoved = [];
            $isLoved2 = [];
            $isLoved3 = [];
            $yeuThichs = Auth::user()->sanPhamYeuThichs()->pluck('san_pham_id')->toArray();
            foreach ($products as $product) {
                $isLoved[$product->id] = in_array($product->id, $yeuThichs);
            }
            foreach ($newProducts as $newProduct) {
                $isLoved2[$newProduct->id] = in_array($newProduct->id, $yeuThichs);
            }
            foreach ($randProducts as $randProduct) {
                $isLoved3[$randProduct->id] = in_array($randProduct->id, $yeuThichs);
            }
        } else {
            $isLoved = [];
            $isLoved2 = [];
            $isLoved3 = [];
        }
        $baiViets = BaiViet::where('trang_thai', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('clients.trangchu', compact('bannersHeas', 'bannersSides', 'bannersFoots', 'danhMucs', 'khuyenMais', 'products', 'newProducts', 'randProducts', 'isLoved', 'isLoved2', 'isLoved3', 'baiViets'));
    }
}
