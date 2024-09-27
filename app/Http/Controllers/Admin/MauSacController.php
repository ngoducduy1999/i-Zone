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
        //
        $mausacs = MauSac::all();
        return view('admins.mausacs.index',compact('mausacs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admins.mausacs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if($request->isMethod('POST')){
            $validMauSac = $request->validate([
                'ten_mau_sac'=>'required|string|max:255'
            ],
            [
                'ten_mau_sac.required'=>'Tên màu sắc không được để trống !',
                'teb_mau_sac.string'=>'Tên màu sắc phải là một chuỗi!'
            ]
        );

        $params = $request->except('_token');

        MauSac::create($params);

        return redirect()->route('admin.mausacs.index')->with('success','Thêm màu sắc mới thành công');


        }
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
        $mausac = MauSac::query()->findOrFail($id);

        return view('admins.mausacs.update',compact('mausac'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if($request->isMethod('PUT')){
            $params = $request->except('_token','_method');

            $mausacs = MauSac::query()->findOrFail($id);

            $mausacs->update($params);

            return redirect()->route('admin.mausacs.index')->with('success','Cập nhật màu thành công!');
        }
    }


    public function onOffBanner($id)
    {
        $mausacs = MauSac::find($id);
        if (!$mausacs) {
            return redirect()->route('admin.mausacs.index')->with('error', 'Màu sắc không tồn tại');
        }
        if ($mausacs->trang_thai == true) {
            $mausacs->trang_thai = false;
            $mausacs->save();
            return redirect()->back()->with('success', 'Ngừng hoạt động màu sắc');
        } else {
            $mausacs->trang_thai = true;
            $mausacs->save();
            return redirect()->back()->with('success', 'Hoạt hoạt động màu sắc');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $mausacs = MauSac::findOrFail($id);

        $mausacs->delete();

        return redirect()->route('admin.mausacs.index')->with('success','xóa màu thành công!');
    }
}
