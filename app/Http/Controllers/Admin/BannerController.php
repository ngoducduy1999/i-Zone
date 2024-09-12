<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admins.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'ten_banner' => ['required', 'string', 'max:255'],
                'anh_banner' => ['required', 'image', 'mimes:jpg,png,jpeg,gif'],
            ],
            [
                'ten_banner.required' => 'Tên banner không được để trống',
                'ten_banner.string' => 'Tên banner phải là chuỗi',
                'ten_banner.max' => 'Tên banner không quá 255 ký tự',

                'anh_banner.required' => 'Ảnh banner không được để trống',
                'anh_banner.image' => 'Ảnh banner phải là ảnh',
                'anh_banner.mimes' => 'Ảnh banner phải có đuôi jpg, png, jpeg, gif',
            ]
        );
        // Upload ảnh banner
        if (isset($request['anh_banner'])) {
            $path_banner = $request->file('anh_banner')->store('banners', 'public');
            $data['anh_banner'] = 'storage/' . $path_banner;
        }
        Banner::create($data);
        return redirect()->route('admin.banners.index')->with('success', 'Thêm mới banner thành công');
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
