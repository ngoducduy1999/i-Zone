<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DungLuong;
use Illuminate\Http\Request;

class DungLuongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dungluongs = DungLuong::all();
        return view('admins.dungluongs.index',compact('dungluongs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admins.dungluongs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        if($request->isMethod('POST')){

            $validDungLuong = $request->validate([
                'ten_dung_luong'=>'required|string|max:255|unique:dung_luongs,ten_dung_luong'
            ],
            [
                'ten_dung_luong.required'=>'tên dung lượng không được để trống',
                'ten_dung_luong.string'=>'tên dung lượng phải là một chuỗi!',
                'ten_dung_luong.max'=>"Tên dung lượng không quá 255 ký tự!"
            ]);

            $params = $request->except('_token');

            DungLuong::create($params);

            return redirect()->route('admin.dungluongs.index')->with('success','Thêm mới dung lượng thành công');
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
        $dungluongs = DungLuong::query()->findOrFail($id);
        return view('admins.dungluongs.update',compact('dungluongs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if($request->isMethod("PUT")){

            $validDungLuong = $request->validate([
                'ten_dung_luong'=>'required|string|max:255|unique:dung_luongs,ten_dung_luong'
            ],
            [
                'ten_dung_luong.required'=>'tên dung lượng không được để trống!',
                'ten_dung_luong.string'=>'tên dung lượng phải là một chuỗi!',
                'ten_dung_luong.max'=>"Tên dung lượng không quá 255 ký tự!"
            ]);


            $params = $request->except('_token','_method');

            $dungluongs = DungLuong::query()->findOrFail($id);

            $dungluongs->update($params);

            return redirect()->route('admin.dungluongs.index')->with('success','cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dungluongs = DungLuong::findOrFail($id);

        $dungluongs->delete();

        return redirect()->route('admin.dungluongs.index')->with('success','Xóa kích cỡ dung lượng thành công');
    }
}
