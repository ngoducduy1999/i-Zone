<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\Banner;
use App\Models\KhuyenMai;
use App\Models\DanhMuc;
use App\Models\BaiViet;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class TrangChuController extends Controller
{
    public function index()
    {
        $bannersHeas = Banner::where('vi_tri', 'header')->where('trang_thai', 1)->get(); // w 420 h 350
        $bannersSides = Banner::latest('id')->where('vi_tri', 'sidebar')->where('trang_thai', 1)->limit(2)->get();
        $bannersFoots = Banner::where('vi_tri', 'footer')->where('trang_thai', 1)->get(); // w 420 h 350
        $danhMucs = DanhMuc::withCount('sanPhams')->get();
        $khuyenMais = KhuyenMai::where('trang_thai', 1)
            ->where('ngay_bat_dau', '<=', now())
            ->where('ngay_ket_thuc', '>=', now())
            ->orderBy('ngay_ket_thuc', 'asc')
            ->get();
            $hot15 = SanPham::limit(15)
            ->with('bienTheSanPhams', 'hinhAnhSanPhams')
            ->where('is_hot', 1)
            ->get();
        if (count($hot15) > 0) {
            $products = $hot15->count() < 8 ? $hot15 : $hot15->random(8);
        } else {
            $products = SanPham::limit(8)
                ->with('bienTheSanPhams', 'hinhAnhSanPhams')
                ->orderBy('luot_xem', 'desc')
                ->get();
        }
        $allIdProducts = $products->pluck('id')->toArray();
        $new20 = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams')
            ->whereNotIn('id', $allIdProducts)
            ->latest()
            ->limit(20)
            ->get();
        $newProducts = $new20->count() < 6 ? $new20 : $new20->random(6);
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

        return view('clients.trangchu-old', compact('bannersHeas', 'bannersSides', 'bannersFoots', 'danhMucs', 'khuyenMais', 'products', 'newProducts', 'randProducts', 'isLoved', 'isLoved2', 'isLoved3', 'baiViets'));
    }

    public function indexOld()
    {
         // Lấy các banner có trạng thái là hiển thị (ví dụ trang_thai = 1)
         $banners = Banner::all();
         $danhMucs=DanhMuc::all();
         // Lấy danh sách khuyến mãi còn hiệu lực
         $khuyenMais = KhuyenMai::where('trang_thai', 1) // Trạng thái kích hoạt 
            ->where('ngay_bat_dau', '<=', now())
            ->where('ngay_ket_thuc', '>=', now())          
             ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo mới nhất
             ->orderBy('ngay_ket_thuc', 'asc')
             ->take(3) // Giới hạn lấy 3 bản ghi
             ->get();
             
         
        // Lấy 10 sản phẩm nổi bật (có lượt xem cao)
        $sanPhamsNoiBat = SanPham::with('bienThe')
            ->whereNull('deleted_at') // Chỉ lấy sản phẩm chưa xóa
            ->orderBy('luot_xem', 'desc') // Sắp xếp theo lượt xem
            ->take(8) // Lấy 8 sản phẩm
            ->get();

            // Lấy tất cả danh mục
        $danhMucs = DanhMuc::withCount('sanPhams')->get(); // Lấy danh sách danh mục và số lượng sản phẩm
        $sanPhamsMoiNhat = SanPham::with('bienThe')
            ->whereNull('deleted_at') // Bỏ qua sản phẩm đã bị xóa mềm
            ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo mới nhất
            ->take(6) // Lấy 6 sản phẩm
            ->get();

        $sanPhams = SanPham::with('bienThe')
            ->whereNull('deleted_at') // Bỏ qua những sản phẩm đã bị xóa mềm
            ->inRandomOrder() // Lấy ngẫu nhiên
            ->limit(5) // Giới hạn số lượng sản phẩm muốn lấy
            ->get();    

        // Lấy danh sách bài viết với trạng thái là 'active' (ví dụ trang_thai = 1)
        $baiViets = BaiViet::where('trang_thai', 1)
            ->orderBy('created_at', 'desc') // Sắp xếp bài viết theo ngày tạo mới nhất
            ->take(3) // Lấy 4 bài viết
            ->get();   // Thực hiện truy vấn và lấy kết quả   

        // Trả về view và truyền dữ liệu sang
       return view('clients.trangchu', compact('khuyenMais','banners','sanPhamsNoiBat','danhMucs','sanPhamsMoiNhat','sanPhams','baiViets','danhMucs'));
    }
}
