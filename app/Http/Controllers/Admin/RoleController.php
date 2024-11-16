<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Hiển thị danh sách vai trò và quyền
    public function index()
    {
        $roles = Role::all(); // Lấy tất cả các vai trò
        $permissions = Permission::all(); // Lấy tất cả các quyền
        return view('admins.roles.index', compact('roles', 'permissions'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:roles,name'
        ]);
    
        // Không cho phép thêm vai trò có tên là "admin"
        if (strtolower($validated['name']) === 'admin') {
            return redirect()->route('admin.roles.index')->with('error', 'Không thể thêm vai trò admin.');
        }
    
        Role::create(['name' => $validated['name']]);
        return redirect()->route('admin.roles.index')->with('success', 'Thêm vai trò thành công.');
    }
    
    public function assignPermissions(Request $request, $roleId)
{
    $role = Role::findOrFail($roleId);

    // Lấy danh sách quyền từ request, mặc định là một mảng rỗng nếu không có gì
    $permissionsIds = $request->permissions ?? [];

    // Đảm bảo $permissionsIds là một mảng
    if (!is_array($permissionsIds)) {
        $permissionsIds = [];
    }

    // Chỉ cho phép vai trò 'admin' có quyền 'QL phan quyen'
    if ($role->name !== 'admin') {
        $permissions = Permission::whereIn('id', $permissionsIds)
            ->where('name', '!=', 'QL phan quyen') // Loại bỏ quyền 'QL phan quyen'
            ->pluck('name');
    } else {
        // Vai trò 'admin' được phép nhận mọi quyền
        $permissions = Permission::whereIn('id', $permissionsIds)->pluck('name');
    }

    // Cập nhật quyền cho vai trò
    $role->syncPermissions($permissions);

    return redirect()->route('admin.roles.index')->with('success', 'Cập nhật quyền thành công');
}

    
public function destroy($id)
{
    $role = Role::findOrFail($id);

    // Không cho phép xóa vai trò "admin"
    if (strtolower($role->name) === 'admin') {
        return redirect()->route('admin.roles.index')->with('error', 'Bạn không thể xóa vai trò admin.');
    }

    $role->delete();
    return redirect()->route('admin.roles.index')->with('success', 'Xóa vai trò thành công.');
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|unique:roles,name,' . $id
    ]);

    $role = Role::findOrFail($id);

    // Không cho phép sửa tên của vai trò "admin"
    if (strtolower($role->name) === 'admin' && strtolower($validated['name']) !== 'admin') {
        return redirect()->route('admin.roles.index')->with('error', 'Bạn không thể thay đổi tên vai trò admin.');
    }

    $role->update(['name' => $validated['name']]);
    return redirect()->route('admin.roles.index')->with('success', 'Cập nhật vai trò thành công.');
}

}
