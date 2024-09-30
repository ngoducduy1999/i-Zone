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
            'vai_tro' => 'required|in:staff', 
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

        return redirect('/admin/nhanviens')->with('success', 'User created successfully.');
    }

    // Hiển thị chi tiết người dùng
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admins.taikhoans.show', compact('user'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required',
            'ngay_sinh' => 'required|date',
            'email' => 'required|email',
            'dia_chi' => 'required',
            'so_dien_thoai' => 'required',

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
    
        $user->save();
    
        return response()->json(['success' => true, 'message' => 'Cập nhật thành công!']);
    }
    public function updatePassword(Request $request)
{
    // Lấy thông tin người dùng đang đăng nhập
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

    return redirect()->back()->with('success', 'Đổi mật khẩu thành công!'); // Quay lại trang trước với thông báo thành công
}

    

    

}
