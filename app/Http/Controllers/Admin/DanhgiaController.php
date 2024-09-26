<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DanhGiaSanPham;
use App\Http\Controllers\Controller;
use App\Models\SanPham;

class DanhgiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy dữ liệu từ form search
        $search = $request->input('search');

        $listSanPham = SanPham::when($search, function ($query, $search) {
            return $query->where('ten_san_pham', 'like', "%{$search}%");
        })
        ->paginate(5);

        $title = "Đánh giá sản phẩm";

        return view('admins.danhgias.index', compact('title', 'listSanPham'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Đánh giá sản phẩm";
        $sanPham = SanPham::query()->findOrFail($id);
        $danhgias = DanhGiaSanPham::where('san_pham_id', $sanPham->id)->paginate(5);
        $diemtrungbinh = DanhGiaSanPham::where('san_pham_id', $id)->avg('diem_so');
        $soluotdanhgia = DanhGiaSanPham::where('san_pham_id', $id)->count();

        return view('admins.danhgias.show', compact('title', 'sanPham', 'danhgias', 'diemtrungbinh', 'soluotdanhgia'));
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
        $danhGia = DanhGiaSanPham::findOrFail($id);

        $danhGia->delete($id);

        return redirect()->route('admin.danhgias.index')->with('success', 'Xóa nhận xết thành công');
    }
}
