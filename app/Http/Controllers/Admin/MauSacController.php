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
            'ten_mau_sac' => 'required|string|max:255|unique:mau_sacs,ten_mau_sac',
            'ma_mau' => 'required|string|max:7|unique:mau_sacs,ma_mau' // Validation cho ma_mau
        ], [
            'ten_mau_sac.required' => 'Tên màu sắc không được để trống!',
            'ten_mau_sac.string' => 'Tên màu sắc phải là một chuỗi!',
            'ten_mau_sac.unique' => 'Tên màu sắc đã tồn tại!',
            'ma_mau.required' => 'Mã màu không được để trống!',
            'ma_mau.string' => 'Mã màu phải là một chuỗi ký tự!',
            'ma_mau.unique' => 'Mã màu đã tồn tại!',
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
            'ten_mau_sac' => 'required|string|max:255|unique:mau_sacs,ten_mau_sac,'. $id,
            'ma_mau' => 'required|string|max:7|unique:mau_sacs,ma_mau,'. $id,
        ], [
            'ten_mau_sac.required' => 'Tên màu sắc không được để trống!',
            'ten_mau_sac.string' => 'Tên màu sắc phải là một chuỗi!',
            'ten_mau_sac.unique' => 'Tên màu sắc đã tồn tại!',
            'ma_mau.required' => 'Mã màu không được để trống!',
            'ma_mau.string' => 'Mã màu phải là một chuỗi ký tự!',
            'ma_mau.unique' => 'Mã màu đã tồn tại!',
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
    // Tìm màu sắc theo ID
    $mausac = MauSac::findOrFail($id);

    // Kiểm tra xem có biến thể sản phẩm nào liên quan còn số lượng không
    // $hasActiveVariants = $mausac->bienthesanphams()->where('so_luong', '>', 0)->exists();
    if(!$mausac){
        return redirect()->back()->with('error', 'Không tìm thấy màu sắc!');
    }
    $counmausac = $mausac->bienTheSanPhams()->withTrashed()->get();
    if (count($counmausac) > 0) {
        return redirect()->back()->with('error', 'Màu sắc đã có sản phẩm, không thể xóa!');
    }

    // Nếu không có biến thể nào còn số lượng, thực hiện xóa mềm
    $mausac->delete();

    return redirect()->route('admin.mausacs.index')->with('success', 'Xóa màu thành công!');
}

}
