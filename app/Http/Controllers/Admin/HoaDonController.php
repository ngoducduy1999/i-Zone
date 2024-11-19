<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HoaDon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Log;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $title = "Danh sách đơn hàng";

    // Lấy tham số từ request
    $ngayBatDau = $request->input('ngay_bat_dau');
    $ngayKetThuc = $request->input('ngay_ket_thuc');
    $phuongThucThanhToan = $request->input('phuong_thuc_thanh_toan');
    $trangThaiThanhToan = $request->input('trang_thai_thanh_toan');
    $trangThai = $request->input('trang_thai');

    $query = HoaDon::query();

    // Áp dụng lọc theo ngày tháng
    if ($ngayBatDau) {
        $query->whereDate('ngay_dat_hang', '>=', $ngayBatDau);
    }

    if ($ngayKetThuc) {
        $query->whereDate('ngay_dat_hang', '<=', $ngayKetThuc);
    }

    // Áp dụng lọc theo phương thức thanh toán
    if ($phuongThucThanhToan) {
        $query->where('phuong_thuc_thanh_toan', $phuongThucThanhToan);
    }

    if ($trangThaiThanhToan) {
        $query->where('trang_thai_thanh_toan', $trangThaiThanhToan);
    }

    // Áp dụng lọc theo trạng thái
    if ($trangThai) {
        $query->where('trang_thai', $trangThai);

    }

    // Lấy danh sách hóa đơn
    $listHoaDon = $query->orderBy('id', 'desc')->get();

    $trangThaiHoaDon = HoaDon::TRANG_THAI;
    $type_huy_don_hang = HoaDon::HUY_DON_HANG;
    $type_da_nhan_hang = HoaDon::DA_NHAN_HANG;

    return view('admins.hoadons.index', compact('title', 'listHoaDon', 'trangThaiHoaDon', 'type_huy_don_hang', 'type_da_nhan_hang'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $title = "Thông tin chi tiết đơn hàng";

    // Lấy hóa đơn theo ID
    $hoaDon = HoaDon::query()->findOrFail($id);

    // Lấy thông tin chi tiết sản phẩm theo hóa đơn cùng với biến thể sản phẩm và sản phẩm
    $chiTietHoaDons = $hoaDon->chiTietHoaDons()->with(['bienTheSanPham.sanPham'])->get();

    // Tính tổng thành tiền của các sản phẩm
    $tongThanhTien = $chiTietHoaDons->sum('thanh_tien');

    // Tiền ship cố định
    $tienShip = 50000;

    // Giảm giá
    $giamGia = $hoaDon->giam_gia;

    // Tổng tiền cuối cùng sau khi thêm tiền ship và giảm giá
    $tongTienCuoi = $tongThanhTien + $tienShip - $giamGia;


    // Các thuộc tính khác của hóa đơn
    $trangThaiHoaDon = HoaDon::TRANG_THAI;
    $phuongThucThanhToan = HoaDon::PHUONG_THUC_THANH_TOAN;
    $trangThaiThanhToan = HoaDon::TRANG_THAI_THANH_TOAN;

    return view('admins.hoadons.show', compact('title', 'hoaDon', 'chiTietHoaDons', 'trangThaiHoaDon', 'phuongThucThanhToan', 'trangThaiThanhToan', 'tongThanhTien', 'tienShip', 'giamGia', 'tongTienCuoi'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $hoaDon = HoaDon::query()->findOrFail($id);

    // Lấy giá trị mới của trạng thái thanh toán
    $newTrangThaiThanhToan = $request->input('trang_thai_thanh_toan');
    $currentTrangThaiThanhToan = $hoaDon->trang_thai_thanh_toan;

    // Kiểm tra nếu phương thức thanh toán là "Chuyển khoản" thì không cho phép thay đổi trạng thái thanh toán
    if ($hoaDon->phuong_thuc_thanh_toan === 'Chuyển khoản' && $newTrangThaiThanhToan) {
        return redirect()->route('admin.hoadons.index')->with('error', 'Không thể thay đổi trạng thái thanh toán khi phương thức thanh toán là "Chuyển khoản"');
    }

    // Cập nhật trạng thái thanh toán nếu phương thức thanh toán là "Thanh toán khi nhận hàng"
    if ($hoaDon->phuong_thuc_thanh_toan === 'Thanh toán khi nhận hàng' && $newTrangThaiThanhToan) {
        $hoaDon->trang_thai_thanh_toan = $newTrangThaiThanhToan;
    }

    // Kiểm tra trạng thái đơn hàng chỉ khi phương thức thanh toán không phải là "Thanh toán khi nhận hàng"
    if ($hoaDon->phuong_thuc_thanh_toan !== 'Thanh toán khi nhận hàng') {
        $newTrangThai = $request->input('trang_thai');
        $currentTrangThai = $hoaDon->trang_thai;

        // Kiểm tra nếu đơn hàng đã bị hủy
        if ($currentTrangThai === HoaDon::HUY_DON_HANG) {
            return redirect()->route('admin.hoadons.index')->with('error', 'Đơn hàng đã bị hủy, không thể thay đổi trạng thái');
        }

        // Kiểm tra trạng thái đơn hàng có thể thay đổi hay không (Không thể thay đổi ngược lại trạng thái)
        $trangThais = array_keys(HoaDon::TRANG_THAI);
        $currentIndex = array_search($currentTrangThai, $trangThais);
        $newIndex = array_search($newTrangThai, $trangThais);

        if ($newIndex === false || $newIndex < $currentIndex) {
            return redirect()->route('admin.hoadons.index')->with('error', 'Không thể cập nhật ngược lại trạng thái đơn hàng');
        }

        // Cập nhật trạng thái đơn hàng nếu hợp lệ
        $hoaDon->trang_thai = $newTrangThai;
    }

    // Lưu lại thông tin đơn hàng đã thay đổi
    $hoaDon->save();

    return redirect()->route('admin.hoadons.index')->with('success', 'Cập nhật trạng thái thành công');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
