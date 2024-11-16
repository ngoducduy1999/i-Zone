<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\HoaDon;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Storage;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //lấy thông tin ng dùng đang đăng nhập
        $user = Auth::user();

        $danhMucs = DanhMuc::all();
        // lấy thông tin đơn hàng người dùng đã mua
        $orders = $user->hoaDons()->get();
        // lấy thuộc tính
        $trang_thai_don_hang = HoaDon::TRANG_THAI;

        return view('clients.taikhoan.donhang',compact('danhMucs','orders','trang_thai_don_hang'));
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
        //


        // Lấy hóa đơn theo ID
        $hoaDon = HoaDon::query()->findOrFail($id);

        // Lấy thông tin chi tiết sản phẩm theo hóa đơn cùng với biến thể sản phẩm và sản phẩm
        $chiTietHoaDons = $hoaDon->chiTietHoaDons()->with(['bienTheSanPham.sanPham'])->get();

        // Các thuộc tính khác của hóa đơn
        $trangThaiHoaDon = HoaDon::TRANG_THAI;
        $phuongThucThanhToan = HoaDon::PHUONG_THUC_THANH_TOAN;
        $trangThaiThanhToan = HoaDon::TRANG_THAI_THANH_TOAN;

        return view('clients.taikhoan.chitietdonhang', compact('trangThaiThanhToan','hoaDon', 'chiTietHoaDons', 'trangThaiHoaDon', 'phuongThucThanhToan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $user = Auth::user();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'so_dien_thoai' => 'nullable|string|max:20',
            'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dia_chi' => 'nullable|string',
        ]);

        $users = Auth::user();
        $users->ten = $request->get('ten');
        $users->email = $request->get('email');
        $users->so_dien_thoai = $request->get('so_dien_thoai');
        $users->dia_chi = $request->get('dia_chi');
        // Xử lý upload ảnh đại diện mới (nếu có)
        if ($request->hasFile('anh_dai_dien')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($users->anh_dai_dien) {
                Storage::disk('public')->delete($users->anh_dai_dien);
            }

            // Lưu ảnh mới
            $filePath = $request->file('anh_dai_dien')->store('avatars', 'public');
            $users->anh_dai_dien = $filePath;
        }



        $users->save();
        return redirect()->route('customer.profileUser')->with('success','cập nhật thông tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profileUser(){
        $danhMucs = DanhMuc::all();
        $donHangs = HoaDon::all();
        $profile = Auth::user();
        return view('clients.taikhoan.profile',compact('donHangs','danhMucs','profile'));
    }

    public function changePassword(Request $request){
        $user = Auth::user();

        // Xác thực mật khẩu cũ, mật khẩu mới và xác nhận mật khẩu mới
        $request->validate([
            'mat_khau_cu' => 'required', // Bắt buộc phải nhập mật khẩu cũ
            'mat_khau_moi' => 'required|min:8|confirmed' // Mật khẩu mới phải ít nhất 8 ký tự và khớp với xác nhận mật khẩu
        ]);

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->input('mat_khau_cu'), $user->mat_khau)) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng.');
        }


        // Cập nhật mật khẩu mới
        $user->mat_khau = Hash::make($request->input('mat_khau_moi'));
        $user->save();

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
    }

    public function cancelOrder($id,Request $request){
        $orders = HoaDon::findOrFail($id);

        // tìm đơn hàng nếu không có thông báo
        if(!$orders){
            return redirect()->back()->with('error','Đơn hàng không tồn hại!');
        }

        $orders->trang_thai = 6;

        if($orders->save()){
            return redirect()->back()->with('success','Đã hủy đơn hàng thành công!');
        }else{
            return redirect()->back()->with('error','Đã có lỗi khi hủy!');
        }
    }
    public function getOrder($id,Request $request){
        $orders = HoaDon::findOrFail($id);

        // tìm đơn hàng nếu không có thông báo
        if(!$orders){
            return redirect()->back()->with('error','Đơn hàng không tồn hại!');
        }

        $orders->trang_thai = 7;

        if($orders->save()){
            return redirect()->back()->with('success','Đã nhận được hàng. Cảm ơn bạn!');
        }else{
            return redirect()->back()->with('error','Đã có lỗi khi xác nhận nhận hàng thành công!');
        }
    }

}
