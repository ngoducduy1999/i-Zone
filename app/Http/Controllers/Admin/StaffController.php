<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role; // Sử dụng đúng mô hình Role từ thư viện Spatie
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    // Hiển thị danh sách nhân viên
    public function index()
    {   $staffs = User::whereHas('roles', function ($query) {
        $query->where('name', '!=', 'admin');
    })->get();
    
        return view('admins.staff.index', compact('staffs'));
    }

    // Hiển thị form tạo nhân viên mới
    public function create()
{
    // Lấy tất cả các vai trò trừ 'admin'
    $roles = Role::where('name', '!=', 'admin')->get();

    // Truyền vai trò vào view
    return view('admins.staff.create', compact('roles'));
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
        'vai_tro' => 'required|exists:roles,name', // Kiểm tra vai trò có tồn tại
        'dia_chi' => 'nullable|string',
        'ngay_sinh' => 'required|date', // Thêm field ngày sinh
    ]);

    // Xử lý upload ảnh đại diện
    $filePath = null;
    if ($request->hasFile('anh_dai_dien')) {
        $filePath = $request->file('anh_dai_dien')->store('avatars', 'public');
    }

    $user = User::create([
        'ten' => $request->get('ten'),
        'email' => $request->get('email'),
        'mat_khau' => bcrypt($request->input('mat_khau')),
        'so_dien_thoai' => $request->get('so_dien_thoai'),
        'anh_dai_dien' => $filePath,
        'vai_tro' => 'staff',
        'dia_chi' => $request->get('dia_chi'),
        'ngay_sinh' => $request->get('ngay_sinh'), // Lưu ngày sinh
    ]);

    $user->assignRole($request->get('vai_tro'));

    return redirect()->route('admin.nhanviens')->with('success', 'Nhân viên đã được thêm thành công');
}

    // Hiển thị thông tin chi tiết của nhân viên
    public function show($id)
    {
        // Lấy tất cả các vai trò trừ 'admin'
        $roles = Role::where('name', '!=', 'admin')->pluck('name')->toArray(); // Lấy tên vai trò, loại trừ admin
        $staff = User::findOrFail($id);
        return view('admins.staff.show', compact('staff','roles'));
    }


    // Cập nhật thông tin nhân viên
   

    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required',
            'ngay_sinh' => 'required|date',
            'email' => 'required|email',
            'dia_chi' => 'required',
            'so_dien_thoai' => 'required',
            'vai_tro' => 'required'

        ]);
    
        $user = User::findOrFail($id);
        if ($user->vai_tro !== 'staff') {
            return response()->json([
                'success' => false,
                'message' => 'Bạn chỉ có thể sửa thông tin của người dùng có vai trò staff.'
            ], 403); // Trả về mã lỗi 403 Forbidden
        }
        $user->ten = $request->ten;
        $user->ngay_sinh = $request->ngay_sinh;
        $user->email = $request->email;
        $user->dia_chi = $request->dia_chi;
        $user->so_dien_thoai = $request->so_dien_thoai;
    
        if ($request->hasFile('anh_dai_dien')) {
            if ($user->anh_dai_dien) {
                Storage::disk('public')->delete($user->anh_dai_dien);
            }
            $path = $request->file('anh_dai_dien')->store('avatars', 'public');
            $user->anh_dai_dien = $path;
        }
        $user->syncRoles([$request->get('vai_tro')]);
        $user->save();
    
        return response()->json(['success' => true, 'message' => 'Cập nhật thành công!']);
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

        return redirect()->back()->with('success', 'Nhân viên đã được xóa');
    }
}
