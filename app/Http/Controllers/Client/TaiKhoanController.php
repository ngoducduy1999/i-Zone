<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
        //
        $user = Auth::user();
        $orders = $user->hoaDons()->get();

        $trang_thai_don_hang = HoaDon::TRANG_THAI;

        return view('clients.taikhoan.donhang',compact('orders','trang_thai_don_hang'));
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
        $profile = Auth::user();
        return view('clients.taikhoan.profile',compact('profile'));
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
}
