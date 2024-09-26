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
        $keyword = $request->input('keyword');

        // Tìm kiếm sản phẩm trong cơ sở dữ liệu
        $listSanPham = SanPham::where('ten_san_pham', 'LIKE', "%{$keyword}%")          
            ->get();

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

        $listDanhGia = DanhGiaSanPham::where('san_pham_id', $sanPham->id)->get();

        return view('admins.danhgias.show', compact('title', 'sanPham', 'listDanhGia'));
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
