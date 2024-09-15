<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Hiển thị danh sách người dùng
    public function index(Request $request)
    {
        $users = User::query()->paginate(1);
        $search = $request->input('search');
        $users = User::query()
        ->when($search, function($query,$search){
            return $query
            ->where('ten','like',"%{$search}%");
        })->paginate(2);

        return view('admins.taikhoans.index', compact('users'));
    }

    // Hiển thị form tạo người dùng mới
    public function create()
    {

    }

    // Lưu người dùng mới vào cơ sở dữ liệu
    public function store(Request $request)
    {

    }

    // Hiển thị chi tiết người dùng
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admins.taikhoans.show',compact('user'));

    }

    // Hiển thị form chỉnh sửa người dùng
    public function edit($id)
    {

    }

    // Cập nhật người dùng
    public function update(Request $request, $id)
    {

    }

    // Xóa người dùng (soft delete)
    public function destroy($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

       $img =  $users->anh_dai_dien;
       if($img && Storage::disk('public')->exists($img)){
        Storage::disk('public')->delete($img);

       }

       return redirect()->route('admin.users.index')->with('success','xóa tài khoản thành công');
    }
}
