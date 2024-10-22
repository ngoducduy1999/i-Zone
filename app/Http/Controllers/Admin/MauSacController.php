<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MauSac;
use Illuminate\Http\Request;

class MauSacController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mausacs = MauSac::all();
        return view('admins.mausacs.index', compact('mausacs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.mausacs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten_mau_sac' => 'required|string|max:255',
            'ma_mau' => 'required|string|max:7' // Validation cho ma_mau
        ], [
            'ten_mau_sac.required' => 'Tên màu sắc không được để trống!',
            'ten_mau_sac.string' => 'Tên màu sắc phải là một chuỗi!',
            'ma_mau.required' => 'Mã màu không được để trống!',
            'ma_mau.string' => 'Mã màu phải là một chuỗi ký tự!',
        ]);

        $params = $request->except('_token');
        MauSac::create($params);

        return redirect()->route('admin.mausacs.index')->with('success', 'Thêm màu sắc mới thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mausac = MauSac::findOrFail($id);
        return view('admins.mausacs.update', compact('mausac'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ten_mau_sac' => 'required|string|max:255',
            'ma_mau' => 'required|string|max:7'
        ], [
            'ten_mau_sac.required' => 'Tên màu sắc không được để trống!',
            'ten_mau_sac.string' => 'Tên màu sắc phải là một chuỗi!',
            'ma_mau.required' => 'Mã màu không được để trống!',
            'ma_mau.string' => 'Mã màu phải là một chuỗi ký tự!'
        ]);

        $params = $request->except('_token', '_method');
        $mausac = MauSac::findOrFail($id);
        $mausac->update($params);

        return redirect()->route('admin.mausacs.index')->with('success', 'Cập nhật màu thành công!');
    }

    /**
     * Toggle the status of a color (active/inactive).
     */
    public function onOffMauSac($id)
    {
        $mausac = MauSac::find($id);
        if (!$mausac) {
            return redirect()->route('admin.mausacs.index')->with('error', 'Màu sắc không tồn tại');
        }

        $mausac->trang_thai = !$mausac->trang_thai;
        $mausac->save();

        $message = $mausac->trang_thai ? 'Hoạt động màu sắc' : 'Ngừng hoạt động màu sắc';
        return redirect()->back()->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mausac = MauSac::findOrFail($id);
        $mausac->delete();

        return redirect()->route('admin.mausacs.index')->with('success', 'Xóa màu thành công!');
    }
}
