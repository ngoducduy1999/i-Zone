<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DanhGiaSanPham;
use App\Http\Controllers\Controller;

class DanhgiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // // Lấy dữ liệu từ form search
        // $search = $request->input('search');
        // $searchTrangThai = $request->input('searchTrangThai');

        $title = "Đánh giá sản phẩm";
        $listDanhGia = DanhGiaSanPham::get();
        // $listDanhGia = DanhGiaSanPham::orderByDesc('trang_thai')
        // ->when($search, function ($query, $search) {
        //     return $query->whereHas('user', function ($q) use ($search) {
        //         $q->where('ten', 'like', "%{$search}%");  // Truy vấn qua quan hệ user
        //     })
        //     ->orWhereHas('sanPham', function ($q) use ($search) {
        //         $q->where('ten_san_pham', 'like', "%{$search}%");  // Truy vấn qua quan hệ sanPham
        //     });
        // })
        // ->when($searchTrangThai !== null, function ($query) use ($searchTrangThai) {
        //     return $query->where('trang_thai', '=', $searchTrangThai);
        // })
        // ->paginate(6);

        return view('admins.danhgias.index', compact('title', 'listDanhGia'));
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
        $danhGia = DanhGiaSanPham::findOrFail($id);

        $danhGia->delete($id);

        return redirect()->route('admin.danhgias.index')->with('success', 'Xóa nhận xết thành công');
    }
}
