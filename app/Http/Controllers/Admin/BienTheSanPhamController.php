<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BienTheSanPham;
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
        return view('admins.bienthesanphams.index', compact('sanpham', 'bienthes'));
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
