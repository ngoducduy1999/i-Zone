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
        $tags = tag::all();
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
    $request->validate([
        'ten_tag' => 'required|string|unique:tags,ten_tag', // Tên là bắt buộc, phải là chuỗi, và duy nhất trong bảng tags
        
    ], [
        'ten_tag.required' => 'Tên không được để trống.',
       
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
        $tag = tag::find($id);
        if (!$tag) {
            return redirect()->route('admin.tags.index')->with('error', 'Khuyến mại không tồn tại');
        }
        return view('admins.tags.update', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ten_tag' => 'required|string|unique:tags,ten_tag,' . $id, // Kiểm tra duy nhất với ngoại lệ cho bản ghi hiện tại
            
        ], [
            'ten_tag.required' => 'Tên tag không được để trống.'
            
        ]);

        // Tìm kiếm bản ghi Tên tag theo ID
        $tag = tag::find($id);

        if (!$tag) {
            return redirect()->route('admin.tag.index')->with('error', 'Tên tag không tồn tại.');
        }

        // Cập nhật dữ liệu Tên tag
        $tag->update([
            'ten_tag' => $request->ten_tag,
            
            // Giữ trạng thái hiện tại không thay đổi
            'trang_thai' => $tag->trang_thai,
        ]);

        // Kiểm tra và cập nhật trạng thái nếu cần
        
        
    
        return redirect()->route('admin.tag.index')->with('success', 'Tên tag đã được cập nhật thành công.');
    }
    
    public function destroy($id)
    {
        // Tìm kiếm bản ghi Tên tag theo ID
        $tag = tag::find($id);
    
        if (!$tag) {
            return redirect()->route('admin.tag.index')->with('error', 'Tên tag không tồn tại.');
        }
    
        // Xóa bản ghi
        $tag->delete();
    
        return redirect()->route('admin.tag.index')->with('success', 'Tên tag đã được xóa thành công.');
    }
    
    public function onOffTag($id)
    {
        // Tìm kiếm bản ghi Tên tag theo ID
        $Tag = Tag::find($id);

        if (!$Tag) {
            return redirect()->route('admin.tags.index')->with('error', 'Tên tag không tồn tại.');
        }

        // So sánh ngày hiện tại với ngày kết thúc của Tên tag
       

        

        // Cập nhật trạng thái Tên tag nếu còn thời gian
        if ($Tag->trang_thai) {
            // Nếu trạng thái hiện tại là đang hoạt động, chuyển sang ngừng hoạt động
            $Tag->trang_thai = false;
            $Tag->save();
            return redirect()->back()->with('success', 'Ngừng hoạt động Tên tag.');
        } else {
            // Nếu trạng thái hiện tại là ngừng hoạt động, chuyển sang hoạt động
            $Tag->trang_thai = true;
            $Tag->save();
            return redirect()->back()->with('success', 'Tên tag đã được kích hoạt.');
        }
    }
    
}
