<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BienTheSanPham;
use App\Models\DungLuong;
use App\Models\MauSac;
use App\Models\SanPham;
use Illuminate\Http\Request;

class BienTheSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $sanpham = SanPham::withTrashed()->where('id', $id)->first();
        $bienthes = BienTheSanPham::withTrashed()->where('san_pham_id', $id)->get();
        $mausacs = MauSac::where('trang_thai', 1)->get();
        $dungluongs = DungLuong::where('trang_thai', 1)->get();
        return view('admins.bienthesanphams.index', compact('sanpham', 'bienthes', 'mausacs', 'dungluongs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $san_pham_id = $request->get('san_pham_id');
        $databienthesanphams = $request->validate([
            'dung_luong_id.*' => ['required', 'exists:dung_luongs,id'],
            'mau_sac_id.*' => ['required', 'exists:mau_sacs,id'],
            'gia_cu.*' => ['required', 'numeric', 'min:1'],
            'gia_moi.*' => ['required', 'numeric', 'min:1'],
            'so_luong.*' => ['required', 'integer', 'min:0'],
        ], [
            'dung_luong_id.*.required' => 'Dung lượng không được để trống.',
            'dung_luong_id.*.exists' => 'Dung lượng không tồn tại.',
            'mau_sac_id.*.required' => 'Màu sắc không được để trống.',
            'mau_sac_id.*.exists' => 'Màu sắc không tồn tại.',
            'gia_cu.*.required' => 'Giá cũ không được để trống.',
            'gia_cu.*.numeric' => 'Giá cũ phải là số.',
            'gia_cu.*.min' => 'Giá cũ phải lớn hơn hoặc bằng 1.',
            'gia_moi.*.required' => 'Giá mới không được để trống.',
            'gia_moi.*.numeric' => 'Giá mới phải là số.',
            'gia_moi.*.min' => 'Giá mới phải lớn hơn hoặc bằng 1.',
            'so_luong.*.required' => 'Số lượng không được để trống.',
            'so_luong.*.integer' => 'Số lượng phải là số nguyên.',
            'so_luong.*.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
        ]);
        foreach ($databienthesanphams['dung_luong_id'] as $index => $dung_luong_id) {
            BienTheSanPham::create([
                'san_pham_id' => $san_pham_id,
                'so_luong' => $databienthesanphams['so_luong'][$index],
                'gia_cu' => $databienthesanphams['gia_cu'][$index],
                'gia_moi' => $databienthesanphams['gia_moi'][$index],
                'dung_luong_id' => $dung_luong_id,
                'mau_sac_id' => $databienthesanphams['mau_sac_id'][$index],
            ]);
        }
        return redirect()->back()->with('success', 'Thêm biến thể sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bienthe = BienTheSanPham::withTrashed()->find($id);
        if (!$bienthe) {
            return redirect()->back()->with('error', 'Biến thể sản phẩm không tồn tại');
        }
        $bienthe->delete();
        return redirect()->back()->with('success', 'Xóa biến thể sản phẩm thành công');
    }

    public function restore(string $id)
    {
        $bienthe = BienTheSanPham::withTrashed()->find($id);
        if (!$bienthe) {
            return redirect()->back()->with('error', 'Biến thể sản phẩm không tồn tại');
        }
        $bienthe->restore();
        return redirect()->back()->with('success', 'Khôi phục biến thể sản phẩm thành công');
    }
}
