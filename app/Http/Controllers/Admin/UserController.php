<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Hiển thị danh sách khách hàng (chỉ vai trò 'user')
    public function khachhangs()
    {
        $users = User::where('vai_tro', 'user')->get();
        return view('admins.taikhoans.khachhang', compact('users'));
    }

    // Hiển thị danh sách nhân viên (chỉ vai trò 'staff')
    public function nhanviens()
    {
        $users = User::where('vai_tro', 'staff')->get();
        return view('admins.taikhoans.nhanvien', compact('users'));
    }

    // Hiển thị form tạo nhân viên
    public function create()
    {
        return view('admins.taikhoans.create');
    }

    // Lưu nhân viên mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mat_khau' => 'required|string|min:8',
            'so_dien_thoai' => 'nullable|string|max:20',
            'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validate cho file ảnh
            'vai_tro' => 'required|in:staff', // Vai trò mới cho phép cả 'admin', 'staff', và 'user'
            'dia_chi' => 'nullable|string',
            'ngay_sinh' => 'required|date', // Thêm field ngày sinh
        ]);

        // Xử lý upload ảnh đại diện
        $filePath = null;
        if ($request->hasFile('anh_dai_dien')) {
            $filePath = $request->file('anh_dai_dien')->store('avatars', 'public');
        }

        $user = new User([
            'ten' => $request->get('ten'),
            'email' => $request->get('email'),
            'mat_khau' => Hash::make($request->get('mat_khau')),
            'so_dien_thoai' => $request->get('so_dien_thoai'),
            'anh_dai_dien' => $filePath,
            'vai_tro' => $request->get('vai_tro'),
            'dia_chi' => $request->get('dia_chi'),
            'ngay_sinh' => $request->get('ngay_sinh'), // Lưu ngày sinh
        ]);

        $user->save();

        return redirect('admin.nhanviens')->with('success', 'User created successfully.');
    }

    // Hiển thị chi tiết người dùng
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admins.taikhoans.show', compact('user'));
    }
    
    // Hiển thị form chỉnh sửa nhân viên
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admins.taikhoans.edit', compact('user'));
    }

    
    // Xóa người dùng (soft delete)
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Xóa ảnh đại diện nếu tồn tại
        if ($user->anh_dai_dien) {
            Storage::disk('public')->delete($user->anh_dai_dien);
        }

        $user->delete();

        return redirect('/taikhoans')->with('success', 'User deleted successfully.');
    }
    //profile
    public function profile()
    {
        $profile = Auth::user(); // Lấy người dùng hiện tại
        return view('admins.taikhoans.profile', compact('profile')); // Trả về view với dữ liệu người dùng
    }
    // Cập nhật profile
    public function updateProfile(Request $request, $id)
{
    $request->validate([
        'ten' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'so_dien_thoai' => 'nullable|string|max:20',
        'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'dia_chi' => 'nullable|string',
    ]);

    $user = User::findOrFail($id);
    $user->ten = $request->get('ten');
    $user->email = $request->get('email');
    $user->so_dien_thoai = $request->get('so_dien_thoai');

    // Xử lý upload ảnh đại diện mới (nếu có)
    if ($request->hasFile('anh_dai_dien')) {
        // Xóa ảnh cũ nếu tồn tại
        if ($user->anh_dai_dien) {
            Storage::disk('public')->delete($user->anh_dai_dien);
        }

        // Lưu ảnh mới
        $filePath = $request->file('anh_dai_dien')->store('avatars', 'public');
        $user->anh_dai_dien = $filePath;
    }

    $user->dia_chi = $request->get('dia_chi');

    $user->save();

    return redirect()->route('admin.profile')->with('success', 'User updated successfully.');
    }
    //Sửa nhân viên
    public function update(Request $request, $id)
{
    $request->validate([
        'ten' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'so_dien_thoai' => 'nullable|string|max:20',
        'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'dia_chi' => 'nullable|string',
    ]);

    $user = User::findOrFail($id);
    $user->ten = $request->get('ten');
    $user->email = $request->get('email');
    $user->so_dien_thoai = $request->get('so_dien_thoai');

    // Xử lý upload ảnh đại diện mới (nếu có)
    if ($request->hasFile('anh_dai_dien')) {
        // Xóa ảnh cũ nếu tồn tại
        if ($user->anh_dai_dien) {
            Storage::disk('public')->delete($user->anh_dai_dien);
        }

        // Lưu ảnh mới
        $filePath = $request->file('anh_dai_dien')->store('avatars', 'public');
        $user->anh_dai_dien = $filePath;
    }

    $user->dia_chi = $request->get('dia_chi');

    $user->save();

    return redirect()->route('admin.nhanviens')->with('success', 'User updated successfully.');
    }
    
}
