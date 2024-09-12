<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Hiển thị danh sách người dùng
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Hiển thị form tạo người dùng mới
    public function create()
    {
        return view('users.create');
    }

    // Lưu người dùng mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mat_khau' => 'required|string|min:8',
            'so_dien_thoai' => 'nullable|string|max:20',
            'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validate cho file ảnh
            'vai_tro' => 'required|in:quan_ly,khach_hang,nhan_vien',
            'dia_chi' => 'nullable|string',
        ]);

        // Xử lý upload ảnh đại diện
        $filePath = null;
        if ($request->hasFile('anh_dai_dien')) {
            $filePath = $request->file('anh_dai_dien')->store('avatars', 'public');
        }

        $user = new User([
            'ten' => $request->get('ten'),
            'email' => $request->get('email'),
            'mat_khau' => bcrypt($request->get('mat_khau')),
            'so_dien_thoai' => $request->get('so_dien_thoai'),
            'anh_dai_dien' => $filePath,
            'vai_tro' => $request->get('vai_tro'),
            'dia_chi' => $request->get('dia_chi'),
        ]);

        $user->save();

        return redirect('/users')->with('success', 'User created successfully.');
    }

    // Hiển thị chi tiết người dùng
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // Hiển thị form chỉnh sửa người dùng
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Cập nhật người dùng
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'so_dien_thoai' => 'nullable|string|max:20',
            'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validate cho file ảnh
            'vai_tro' => 'required|in:admin,user,guest',
            'dia_chi' => 'nullable|string',
        ]);

        $user = User::findOrFail($id);
        $user->ten = $request->get('ten');
        $user->email = $request->get('email');
        if ($request->get('mat_khau')) {
            $user->mat_khau = bcrypt($request->get('mat_khau'));
        }
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

        $user->vai_tro = $request->get('vai_tro');
        $user->dia_chi = $request->get('dia_chi');

        $user->save();

        return redirect('/users')->with('success', 'User updated successfully.');
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

        return redirect('/users')->with('success', 'User deleted successfully.');
    }
}
