<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
      
            $danhmucs = DanhMuc::query()->latest('id');
            return view('admins.danhmucs.index', compact('danhmucs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admins.danhmucs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if($request->isMethod('POST')){
            $params = $request->post();
            $params = $request->except('_token');
            if($request->hasFile('anh_danh_muc')){
                $filePath = $request->file('anh_danh_muc')->store('uploads/danhmucs','public');

            }else{
                $filePath = null;
            }
            $params['anh_danh_muc'] = $filePath;
            DanhMuc::create($params);
            return redirect()->route('danhmucs.index')->with('msg','Thêm danh mục thành công');
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
        //
    }
}
