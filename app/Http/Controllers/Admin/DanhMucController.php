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
        // Lấy tất cả danh mục
        $danhmucs = DanhMuc::all();
        return view('admins.danhmucs.index', compact('danhmucs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Hiển thị form tạo mới danh mục
        return view('admins.danhmucs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Kiểm tra và validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'ten_danh_muc' => 'required|string|max:255|unique:danh_mucs,ten_danh_muc',
            'mo_ta' => 'nullable|string',
            'anh_danh_muc' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'ten_danh_muc.required' => 'Tên danh mục không được để trống',
            'ten_danh_muc.string' => 'Tên danh mục phải là chuỗi',
            'ten_danh_mucunique' => 'Tên danh mục đã tồn tại',
            'ten_danh_muc.max' => 'Tên danh mục không quá 255 ký tự',

            'anh_danh_muc.image' => 'Ảnh danh mục phải là ảnh',
            'anh_danh_muc.mimes' => 'Ảnh danh mục phải có đuôi jpg, png, jpeg, gif',
        ]);

        // Lấy toàn bộ request trừ _token
        $params = $request->except('_token');
    
        // Xử lý ảnh danh mục nếu có
        if ($request->hasFile('anh_danh_muc')) {
            $fileName = time() . '_' . $request->file('anh_danh_muc')->getClientOriginalName();
            $filePath = $request->file('anh_danh_muc')->storeAs('danhmucs', $fileName, 'public');
            $params['anh_danh_muc'] = 'storage/' . $filePath;
        } else {
            $params['anh_danh_muc'] = null;
        }

        // Tạo danh mục mới
        DanhMuc::create($params);

        // Chuyển hướng và thông báo thành công
        return redirect()->route('admin.danhmucs.index')->with('msg', 'Thêm danh mục thành công');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Lấy danh mục theo ID và hiển thị form chỉnh sửa
        $danhmucs = DanhMuc::findOrFail($id);
        return view('admins.danhmucs.update', compact('danhmucs'));
    }

    public function show(string $id)
    {
        $danhmucs = DanhMuc::find($id);
        if (!$danhmucs) {
            return redirect()->route('admin.danhmucs.index')->with('error', 'Danh mục không tồn tại');
        }
        return view('admins.danhmucs.show', compact('danhmucs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Lấy danh mục theo ID
        $danhmucs = DanhMuc::findOrFail($id);

        // Validate dữ liệu đầu vào, bỏ qua bản ghi hiện tại khi kiểm tra tính duy nhất
        $validatedData = $request->validate([
            'ten_danh_muc' => 'required|string|max:255|unique:danh_mucs,ten_danh_muc,' . $danhmucs->id,
            'mo_ta' => 'nullable|string',
            'anh_danh_muc' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'ten_danh_muc.required' => 'Tên danh mục không được để trống',
            'ten_danh_muc.string' => 'Tên danh mục phải là chuỗi',
            'ten_danh_muc.unique' => 'Tên danh mục đã tồn tại',
            'ten_danh_muc.max' => 'Tên danh mục không quá 255 ký tự',

            'anh_danh_muc.image' => 'Ảnh danh mục phải là ảnh',
            'anh_danh_muc.mimes' => 'Ảnh danh mục phải có đuôi jpg, png, jpeg, gif',
        ]);
       
        // Lưu ảnh mới nếu có
        if ($request->hasFile('anh_danh_muc')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($danhmucs->anh_danh_muc) {
                Storage::disk('public')->delete($danhmucs->anh_danh_muc);
            }

            // Lưu ảnh mới
            $fileName = time() . '_' . $request->file('anh_danh_muc')->getClientOriginalName();
            $filePath = $request->file('anh_danh_muc')->storeAs('danhmucs', $fileName, 'public');
            $validatedData['anh_danh_muc'] = 'storage/' .$filePath;
        }

        // Cập nhật danh mục
        $danhmucs->update($validatedData);

        // Chuyển hướng và thông báo thành công
        return redirect()->route('admin.danhmucs.index')->with('msg', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Lấy danh mục theo ID
        $danhMuc = DanhMuc::findOrFail($id);

        // Xóa danh mục
        if ($danhMuc->anh_danh_muc) {
            // Xóa ảnh từ storage
            Storage::disk('public')->delete($danhMuc->anh_danh_muc);
        }

        // Xóa bản ghi danh mục
        $danhMuc->delete();

        // Chuyển hướng và thông báo thành công
        return back()->with('msg', 'Xóa danh mục thành công!');
    }

}
