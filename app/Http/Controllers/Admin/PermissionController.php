<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    // Hiển thị danh sách quyền
    public function index()
    {
        $permissions = Permission::all();
        return view('admins.permissions.index', compact('permissions'));
    }

    // Tạo quyền mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name'
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('admin.permissions.index')->with('success', 'Quyền mới đã được tạo thành công');
    }

    public function update(Request $request, Permission $permission)
    {
    // Kiểm tra nếu quyền là 'QL phan quyen' thì không cho phép sửa
    if ($permission->name === 'QL phan quyen') {
        return redirect()->route('admin.permissions.index')->with('error', 'Không thể sửa quyền QL phan quyen.');
    }

    $request->validate([
        'name' => 'required|string|unique:permissions,name,' . $permission->id
    ]);

    $permission->update(['name' => $request->name]);

    return redirect()->route('admin.permissions.index')->with('success', 'Quyền đã được cập nhật');
    }
    public function destroy(Permission $permission)
    {
    // Kiểm tra nếu quyền là 'QL phan quyen' thì không cho phép xóa
    if ($permission->name === 'QL phan quyen') {
        return redirect()->route('admin.permissions.index')->with('error', 'Không thể xóa quyền QL phan quyen.');
    }

    $permission->delete();

    return redirect()->route('admin.permissions.index')->with('success', 'Quyền đã được xóa');
    }


}
