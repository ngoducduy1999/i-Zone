<?php

namespace App\Http\Controllers\admin;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        $danhmucs = DanhMuc::query()->findOrFail($id);

        return view('admins.danhmucs.update',compact(  'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $danhmucs = DanhMuc::find($id);
        if (!$danhmucs) {
            return redirect()->route('admin.danhmucs.index')->with('error', 'Danh mục không tồn tại');
        }
        $data = $request->validate(
            [
                'ten_danh_muc' => ['required', 'string', 'max:255'],
                'anh_danh_muc' => ['image', 'mimes:jpg,png,jpeg,gif'],
            ],
            [
                'ten_danh_muc.required' => 'Tên danh mục không được để trống',
                'ten_danh_muc.string' => 'Tên danh mục phải là chuỗi',
                'ten_danh_muc.max' => 'Tên danh mục không quá 255 ký tự',

                'anh_danh_muc.image' => 'Ảnh danh mục phải là ảnh',
                'anh_danh_muc.mimes' => 'Ảnh danh mục phải có đuôi jpg, png, jpeg, gif',
            ]
        );
        $old_danh_muc = $danhmucs->anh_danh_muc;
        if (isset($request['anh_danh_muc'])) {
            $path_danh_muc = $request->file('anh_danh_muc')->store('danhmucs', 'public');
            $data['anh_danh_muc'] = 'storage/' . $path_danh_muc;
            if ($old_danh_muc) {
                if (file_exists($old_danh_muc)) {
                    unlink($old_danh_muc);
                }
            }
        }
        $danhmucs->update($data);
        return redirect()->back()->with('success', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $danhMuc = DanhMuc::find($id);
        if($danhMuc) {
        
            $danhMuc->delete();
            if($danhMuc->anh_danh_muc && Storage::disk('public')->exists('uploads/danhmucs', 'public')){
                Storage::disk('public')->delete($danhMuc->anh_danh_muc);
            }
            return back()->with('delete', 'Xóa danh mục thành công!');
        }else {
            return back()->with('error', 'Danh mục không tồn tại!');
        }
    }
}
