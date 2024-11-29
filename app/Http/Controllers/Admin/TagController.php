<?php

namespace App\Http\Controllers\admin;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{
    public function index()
    {
        // Lấy tất cả thẻ tag, kể cả đã bị xóa mềm
        $tags = Tag::withTrashed()->get();
        return view('admins.tags.index', compact('tags'));
    }
    // Hiển thị form tạo Tên tag
    public function create()
    {
        return view('admins.tags.create');
    }

    public function store(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $validatedData = $request->validate([
            'ten_tag' => 'required|string|unique:tags,ten_tag', 
        ], [
            'ten_tag.required' => 'Tên không được để trống.',
            'ten_tag.unique' => 'Tên thẻ tag đã tồn tại',
        ]);

        $data = [
            'ten_tag' => $request->ten_tag,
            'trang_thai' => 1,
        ];
        tag::create($data);
        return redirect()->route('admin.tag.index')->with('success', 'Thẻ tag đã được tạo thành công.');
    }

    public function edit($id)
    {
        $tag = Tag::withTrashed()->findOrFail($id);
        return view('admins.tags.update', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::withTrashed()->findOrFail($id);

        $validatedData = $request->validate([
            'ten_tag' => 'required|string|unique:tags,ten_tag,' . $id, // Kiểm tra duy nhất với ngoại lệ cho bản ghi hiện tại
        ], [
            'ten_tag.required' => 'Tên tag không được để trống.',
            'ten_tag.unique' => 'Tên thẻ tag đã tồn tại',
        ]);
        
        // Cập nhật dữ liệu Tên tag
        $tag->update([
            'ten_tag' => $request->ten_tag,
            // Giữ trạng thái hiện tại không thay đổi
            'trang_thai' => $tag->trang_thai,
        ]);
        return redirect()->route('admin.tag.index')->with('success', 'Tên tag đã được cập nhật thành công.');
    }

    public function softDelete($id)
    {
        $tag = Tag::find($id);
        if ($tag) {
            $sanPhamTags = $tag->sanPhams()->withTrashed()->get();
            if (count($sanPhamTags) > 0) {
                return redirect()->back()->with('error', 'Thẻ tag vẫn còn sản phẩm, không thể ngừng hoạt động.');
            }
            $tag->trang_thai = 0;
            $tag->save();
            $tag->delete();
            return redirect()->back()->with('success', 'Xóa mềm thành công.');
        }
        return redirect()->back()->with('error', 'Không tìm thấy dữ liệu.');
    }

    public function restore($id)
    {
        $tag = Tag::withTrashed()->find($id);
        if ($tag) {
            $tag->trang_thai = 1;
            $tag->save();
            $tag->restore();
            return redirect()->back()->with('success', 'Khôi phục thành công.');
        }
        return redirect()->back()->with('error', 'Không tìm thấy dữ liệu.');
    }

}
