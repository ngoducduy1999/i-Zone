<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SanPham;
use App\Models\HoaDon;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\KhuyenMai;
class StaffDashboardController extends Controller
{
    public function index()
    {
        // 1. Tổng hợp các số liệu thống kê
        $tong_doanh_thu = HoaDon::sum('tong_tien');
        $tong_nguoi_dung = User::count();
        $tong_san_pham = SanPham::count();
        $tong_don_hang = HoaDon::count();
        
        // 2. Thống kê người dùng đăng ký theo ngày trong tháng hiện tại
        $nguoiDungTheoNgay = User::selectRaw('DATE(created_at) as ngay, COUNT(id) as so_luong_nguoi_dung')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->groupBy('ngay')
            ->orderBy('ngay', 'asc')
            ->get();

        $nguoiDungNgayData = $nguoiDungTheoNgay->pluck('so_luong_nguoi_dung')->toArray();
        $nguoiDungNgayLabels = $nguoiDungTheoNgay->pluck('ngay')->map(function($date) {
            return date('d/m', strtotime($date));
        })->toArray();

        // 3. Thống kê người dùng trung bình và hôm nay
        $ngay_dau_tien_nguoi_dung = User::min('created_at');
        $ngay_hien_tai = today();
        $so_ngay = $ngay_dau_tien_nguoi_dung ? $ngay_hien_tai->diffInDays(Carbon::parse($ngay_dau_tien_nguoi_dung)) + 1 : 0;
        $nguoi_dung_trung_binh = $so_ngay > 0 ? $tong_nguoi_dung / $so_ngay : 0;
        $nguoi_dung_hom_nay = User::whereDate('created_at', $ngay_hien_tai)->count();
        $phan_tram_nguoi_dung = $nguoi_dung_trung_binh > 0 ? round(($nguoi_dung_hom_nay / $nguoi_dung_trung_binh) * 100 - 100) : -100;

        // 4. Thống kê doanh thu trung bình và hôm nay
        $ngay_dau_tien_hoa_don = HoaDon::min('created_at');
        $so_ngay_hoa_don = $ngay_dau_tien_hoa_don ? $ngay_hien_tai->diffInDays(Carbon::parse($ngay_dau_tien_hoa_don)) + 1 : 0;
        $doanh_thu_trung_binh = $so_ngay_hoa_don > 0 ? $tong_doanh_thu / $so_ngay_hoa_don : 0;
        $doanh_thu_hom_nay = HoaDon::whereDate('created_at', $ngay_hien_tai)->sum('tong_tien');
        $phan_tram_doanh_thu = $doanh_thu_trung_binh > 0 ? round(($doanh_thu_hom_nay - $doanh_thu_trung_binh) / $doanh_thu_trung_binh * 100) : 0;

        // 5. Thống kê doanh thu theo ngày trong tháng hiện tại
        $doanhThuTheoNgay = HoaDon::selectRaw('DATE(created_at) as ngay, SUM(tong_tien) as tong_doanh_thu')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->groupBy('ngay')
            ->orderBy('ngay', 'asc')
            ->get();

        $doanhThuNgayData = $doanhThuTheoNgay->pluck('tong_doanh_thu')->toArray();
        $ngayLabels = $doanhThuTheoNgay->pluck('ngay')->map(function($date) {
            return date('d/m', strtotime($date));
        })->toArray();

        // 6. Thống kê doanh thu theo tháng
        $doanh_thu_theo_thang = HoaDon::selectRaw('YEAR(created_at) as nam, MONTH(created_at) as thang, SUM(tong_tien) as doanh_thu')
            ->groupBy('nam', 'thang')
            ->orderBy('nam', 'desc')
            ->orderBy('thang', 'desc')
            ->get();

        $doanh_thu_data = $doanh_thu_theo_thang->pluck('doanh_thu')->toArray();
        $thang_labels = $doanh_thu_theo_thang->map(function($item) {
            return $item->thang . '/' . $item->nam;
        })->toArray();

        // 7. Thống kê sản phẩm bán chạy
        $san_pham_ban_chay = SanPham::select(
            'san_phams.id', 
            'san_phams.ten_san_pham', 
            'danh_mucs.ten_danh_muc',
            'san_phams.anh_san_pham',
            DB::raw('SUM(chi_tiet_hoa_dons.so_luong) as tong_so_luong_ban'),
            DB::raw('SUM(chi_tiet_hoa_dons.so_luong * bien_the_san_phams.gia_moi) as tong_doanh_thu')
        )
        ->join('bien_the_san_phams', 'san_phams.id', '=', 'bien_the_san_phams.san_pham_id')
        ->join('chi_tiet_hoa_dons', 'bien_the_san_phams.id', '=', 'chi_tiet_hoa_dons.bien_the_san_pham_id')
        ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
        ->groupBy('san_phams.id', 'san_phams.ten_san_pham', 'san_phams.anh_san_pham', 'danh_mucs.ten_danh_muc')
        ->orderBy('tong_so_luong_ban', 'desc')
        ->take(4)
        ->get();

        // 8. Thống kê số lượng đơn hàng
        $ngay_dau_tien_don_hang = HoaDon::min('created_at');
        $so_ngay_don_hang = $ngay_dau_tien_don_hang ? $ngay_hien_tai->diffInDays(Carbon::parse($ngay_dau_tien_don_hang)) + 1 : 0;
        $don_hang_trung_binh = $so_ngay_don_hang > 0 ? $tong_don_hang / $so_ngay_don_hang : 0;
        $don_hang_hom_nay = HoaDon::whereDate('created_at', $ngay_hien_tai)->count();
        $phan_tram_don_hang = $don_hang_trung_binh > 0 ? round(($don_hang_hom_nay - $don_hang_trung_binh) / $don_hang_trung_binh * 100) : 0;

        // Thống kê đơn hàng theo ngày
        $donTheoNgay = HoaDon::selectRaw('DATE(created_at) as ngay, COUNT(id) as so_luong_don')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->groupBy('ngay')
            ->orderBy('ngay', 'asc')
            ->get();

        $donNgayData = $donTheoNgay->pluck('so_luong_don')->toArray();
        $donNgayLabels = $donTheoNgay->pluck('ngay')->map(function($date) {
            return date('d/m', strtotime($date));
        })->toArray();
        // 9. Thống kê số lượng sản phẩm theo danh mục từ bảng biến thể sản phẩm
        $danhMucSanPham = DB::table('bien_the_san_phams')
            ->join('san_phams', 'bien_the_san_phams.san_pham_id', '=', 'san_phams.id')
            ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
            ->select('danh_mucs.ten_danh_muc', DB::raw('SUM(bien_the_san_phams.so_luong) as so_luong_san_pham'))
            ->groupBy('danh_mucs.ten_danh_muc')
            ->orderBy('so_luong_san_pham', 'desc')
            ->get();

        $labelsDanhMuc = $danhMucSanPham->pluck('ten_danh_muc')->toArray();
        $dataDanhMuc = $danhMucSanPham->pluck('so_luong_san_pham')->toArray();
        // 11. Thống kê chương trình khuyến mãi
        $khuyenMai = KhuyenMai::all();

        $so_luong_khuyen_mai_hoat_dong = $khuyenMai->where('trang_thai', 1)->count();
        $so_luong_khuyen_mai_sap_het_han = $khuyenMai->where('ngay_ket_thuc', '<=', Carbon::now()->addDays(7))->count();

        $labelsKhuyenMai = ['Đang hoạt động', 'Sắp hết hạn'];
        $dataKhuyenMai = [$so_luong_khuyen_mai_hoat_dong, $so_luong_khuyen_mai_sap_het_han];  
        // Lấy danh sách sản phẩm và số lượng tồn kho từ bảng biến thể
        $products = DB::table('bien_the_san_phams')
            ->join('san_phams', 'bien_the_san_phams.san_pham_id', '=', 'san_phams.id')
            ->select('san_phams.ten_san_pham', DB::raw('SUM(bien_the_san_phams.so_luong) as so_luong'))
            ->groupBy('san_phams.ten_san_pham')
            ->get();
        
        // Lọc sản phẩm theo số lượng tồn kho
        $inStockProducts = $products->filter(function ($product) {
            return $product->so_luong >= 10; // Còn nhiều hàng
        });
        
        $lowStockProducts = $products->filter(function ($product) {
            return $product->so_luong > 0 && $product->so_luong < 10; // Sắp hết hàng
        });
        
        $outOfStockProducts = $products->filter(function ($product) {
            return $product->so_luong == 0; // Hết hàng
        });
        
        // Tạo mảng dữ liệu để hiển thị trên biểu đồ
        $labelsSanPham = $products->pluck('ten_san_pham')->toArray(); // Tên các sản phẩm
        $dataInStock = $inStockProducts->pluck('so_luong')->toArray(); // Sản phẩm còn hàng
        $dataLowStock = $lowStockProducts->pluck('so_luong')->toArray(); // Sản phẩm sắp hết hàng
        $dataOutOfStock = $outOfStockProducts->pluck('so_luong')->toArray(); 
        // Sản phẩm hết hàng// Đảm bảo rằng các mảng dữ liệu đều có cùng độ dài
       
       

    
        
    
       

        // 12. Trả về view
        return view('admins.dashboard', compact(
            'tong_doanh_thu',
            'tong_nguoi_dung',
            'tong_san_pham',
            'tong_don_hang',
            'doanh_thu_data',
            'thang_labels',
            'san_pham_ban_chay',
            'doanhThuNgayData',
            'ngayLabels',
            'nguoiDungNgayData',
            'nguoiDungNgayLabels',
            'phan_tram_nguoi_dung',
            'phan_tram_don_hang',
            'donNgayData',
            'donNgayLabels',
            'labelsDanhMuc',
            'dataDanhMuc',
            'phan_tram_doanh_thu',
            'labelsKhuyenMai',
            'dataKhuyenMai',
            'labelsSanPham' ,
            'dataInStock' ,
            'dataLowStock' ,
            'dataOutOfStock'
        ));
    }
    public function user()
    {
        return view('admins.taikhoans.index');
    }
}
