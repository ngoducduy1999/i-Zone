<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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
        return redirect()->back()->with('success', 'Đã xóa tài khoản khách hàng.');
        // return redirect('/taikhoans')->with('success', 'User deleted successfully.');
    }
    public function profile()
    {
        $profile = Auth::user(); // Lấy người dùng hiện tại
        return view('admins.taikhoans.profile', compact('profile')); // Trả về view với dữ liệu người dùng
    }
    public function updateProfile(Request $request, $id)
    {
        // Custom validation messages
        $request->validate([
            'ten' => 'required|string|max:255',  // Tên là bắt buộc, chuỗi và tối đa 255 ký tự
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
            'so_dien_thoai' => 'required|regex:/^(0[3-9])[0-9]{8}$/',
            'dia_chi' => 'required|string|max:500',
            'anh_dai_dien' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'required' => ':attribute là bắt buộc.',
            'string' => ':attribute phải là chuỗi.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'email' => ':attribute phải là địa chỉ email hợp lệ.',
            'regex' => ':attribute không đúng định dạng.',
            'mimes' => ':attribute phải là một tệp ảnh với định dạng jpg, jpeg, png, gif.',
            'image' => ':attribute phải là một ảnh.',
            'nullable' => ':attribute có thể để trống.',
            'unique' => ':attribute đã tồn tại.',

            'ten.required' => 'Tên là bắt buộc.',
            'ten.string' => 'Tên phải là chuỗi.',
            'ten.max' => 'Tên không được vượt quá 255 ký tự.',

            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.unique' => 'Email này đã được sử dụng.',

            'so_dien_thoai.regex' => 'Số điện thoại không đúng định dạng.',
            'so_dien_thoai.required' => 'Số điện thoại là bắt buộc.',

            'dia_chi.required' => 'Địa chỉ là bắt buộc.',
            'dia_chi.string' => 'Địa chỉ phải là chuỗi.',
            'dia_chi.max' => 'Địa chỉ không được vượt quá 500 ký tự.',

            'anh_dai_dien.image' => 'Ảnh đại diện phải là một tệp ảnh.',
            'anh_dai_dien.mimes' => 'Ảnh đại diện phải có định dạng jpg, jpeg, png, hoặc gif.',
            'anh_dai_dien.max' => 'Ảnh đại diện không được vượt quá 2MB.',
        ]);

        $user = User::findOrFail($id);
        $user->ten = $request->ten;
        $user->email = $request->email;

        $user->so_dien_thoai = $request->so_dien_thoai ?? null;

        $user->dia_chi = $request->dia_chi;

        if ($request->hasFile('anh_dai_dien')) {
            if ($user->anh_dai_dien) {
                Storage::disk('public')->delete($user->anh_dai_dien);
            }
            $path = $request->file('anh_dai_dien')->store('profiles', 'public');
            $user->anh_dai_dien = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Cập nhật hồ sơ thành công!');
    }


    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
                'new_password_confirmation' => 'required|same:new_password',
            ],
            [
                'required' => ':attribute là bắt buộc.',
                'min' => ':attribute phải có ít nhất :min ký tự.',
                'confirmed' => 'Xác nhận :attribute không trùng khớp.',
                'regex' => ':attribute phải chứa ít nhất một chữ hoa, một chữ thường, một số và một ký tự đặc biệt.',
                'same' => ':attribute và :other phải giống nhau.',
                'current_password.required' => 'Mật khẩu cũ là bắt buộc.',
                'new_password.required' => 'Mật khẩu mới là bắt buộc.',
                'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
                'new_password.confirmed' => 'Mật khẩu xác nhận không trùng khớp.',
                'new_password.regex' => 'Mật khẩu mới phải chứa ít nhất một chữ hoa, một chữ thường, một số và một ký tự đặc biệt.',
                'new_password_confirmation.required' => 'Xác nhận mật khẩu mới là bắt buộc.',
                'new_password_confirmation.same' => 'Xác nhận mật khẩu mới phải giống với mật khẩu mới.',
            ]

        );


        $user = Auth::user();


        if (!Hash::check($request->current_password, $user->mat_khau)) {
            return redirect()->back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }


        if ($request->current_password === $request->new_password) {
            return redirect()->back()->withErrors(['new_password' => 'Mật khẩu mới không thể trùng với mật khẩu cũ.']);
        }

        $user->mat_khau = Hash::make($request->new_password); 
        $user->save();

        return redirect()->back()->with('success', 'Cập nhật mật khẩu thành công!');
    }

}
