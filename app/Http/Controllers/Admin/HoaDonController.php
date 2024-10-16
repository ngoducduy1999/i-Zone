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
    public function index()
    {
        $title = "Danh sách hóa đơn";

        $listHoaDon = HoaDon::query()->paginate(5);

        $trangThaiHoaDon = HoaDon::TRANG_THAI;

        $type_huy_don_hang = HoaDon::HUY_DON_HANG;

        $type_da_nhan_hang = HoaDon::DA_NHAN_HANG;

        return view('admins.hoadons.index', compact('title', 'listHoaDon', 'trangThaiHoaDon', 'type_huy_don_hang','type_da_nhan_hang'));
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
    $title = "Thông tin chi tiết hóa đơn";

    // Lấy hóa đơn theo ID
    $hoaDon = HoaDon::query()->findOrFail($id);

    // Lấy thông tin chi tiết sản phẩm theo hóa đơn cùng với biến thể sản phẩm và sản phẩm
    $chiTietHoaDons = $hoaDon->chiTietHoaDons()->with(['bienTheSanPham.sanPham'])->get();

    // Các thuộc tính khác của hóa đơn
    $trangThaiHoaDon = HoaDon::TRANG_THAI;
    $phuongThucThanhToan = HoaDon::PHUONG_THUC_THANH_TOAN;

    return view('admins.hoadons.show', compact('title', 'hoaDon', 'chiTietHoaDons', 'trangThaiHoaDon', 'phuongThucThanhToan'));
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

        $currentTrangThai = $hoaDon->trang_thai;

        $newTrangThai = $request->input('trang_thai');

        $trangThais = array_keys(HoaDon::TRANG_THAI);

        // Kiểm tra nếu đơn hàng đã hủy thì không được thay đổi trạng thái nữa
        if($currentTrangThai === HoaDon::HUY_DON_HANG){
            return redirect()->route('admins.hoadons.index')->with('error', 'Đơn hàng đã bị hủy không thể thay đổi được trạng thái');
        }

        // Nếu trạng thái mới không được nằm sau trạng thái hiện tại
        if(array_search($newTrangThai, $trangThais) < array_search($currentTrangThai, $trangThais)){
            return redirect()->route('admin.hoadons.index')->with('error', 'Không thể cập nhật ngược lại trạng thái');
        }

        $hoaDon->trang_thai = $newTrangThai;

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
