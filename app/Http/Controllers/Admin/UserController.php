<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role; // Thêm dòng này
use Illuminate\Support\Facades\Log; // Thêm dòng này


class UserController extends Controller
{
    // Gán vai trò cho người dùng
    public function assignRole(Request $request, $user)
    {
        // Lấy thông tin người dùng
        $user = User::findOrFail($user);

        // Đổi ID của vai trò thành tên trước khi gọi syncRoles
        $roleNames = Role::whereIn('id', $request->roles)->pluck('name')->toArray();

        // Log danh sách vai trò mới
        Log::info('Updating roles for user ID ' . $user->id, ['roles' => $roleNames]);

        // Gán các vai trò mới cho người dùng
        $user->syncRoles($roleNames);

        // Trở lại với thông báo thành công
        return redirect()->route('admins.users.index')->with('success', 'Gán vai trò cho người dùng thành công');
    }
    public function khachhangs()
    {
        $users = User::where('vai_tro', 'user')->get();
        return view('admins.taikhoans.khachhang', compact('users'));
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
    public function profile()
    {
        $profile = Auth::user(); // Lấy người dùng hiện tại
        return view('admins.taikhoans.profile', compact('profile')); // Trả về view với dữ liệu người dùng
    }
}
