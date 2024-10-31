<?php

namespace App\Http\Controllers\Admin;

use App\Models\BaiViet;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Danh sách bài viết";

        $author = $request->input('user_id');
        $date = $request->input('ngay_dang');
        $status = $request->input('trang_thai');

        $query = BaiViet::query();

        if ($author) {
            $query->where('user_id', $author);
        }

        if ($date) {
            $query->whereDate('created_at', $date);
        }

        if (!is_null($status)) { 
            $query->where('trang_thai', $status);
        }

        $listBaiViet = $query->get();

        $users = User::all(); 

        return view('admins.baiviets.index', compact('title', 'listBaiViet', 'users'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới bài viết";

        $listDanhMuc = DanhMuc::query()->get();

        return view('admins.baiviets.create', compact('title', 'listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->isMethod('POST')){
            $param = $request->except('_token');

            if($request->has('anh_bai_viet')){
                $filename = $request->file('anh_bai_viet')->store('baiviets', 'public');
            }else{
                $filename = null;
            }

            $param['anh_bai_viet'] = $filename;

            $param['user_id'] = auth()->id(); // Hoặc một giá trị user_id cụ thể nếu bạn không dùng auth

            BaiViet::create($param);

            return redirect()->route('admin.baiviets.index')->with('success', 'Thêm bài viết thành công');
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
        $title = "Chỉnh sửa bài viết";

        $listDanhMuc = DanhMuc::query()->get();

        $baiViet = BaiViet::findOrFail($id);

        return view('admins.baiviets.update', compact('title', 'baiViet', 'listDanhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $param = $request->except('_token', '_method');

            $baiViet = BaiViet::findOrFail($id);

            if($request->has('anh_bai_viet')){
                if($baiViet->anh_bai_viet && Storage::disk('public')->exists($baiViet->anh_bai_viet)){
                    Storage::disk('public')->delete($baiViet->anh_bai_viet);
                }
                $filename = $request->file('anh_bai_viet')->store('baiviets', 'public');
            }else{
                $filename = $baiViet->anh_bai_viet;
            }

            $param['anh_bai_viet'] = $filename;

            $baiViet->update($param);

            return redirect()->route('admin.baiviets.index')->with('success', 'Cập nhật bài viết thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $baiViet = BaiViet::query()->findOrFail($id);
        
        // Xóa hình ảnh đại diện của bai viết
        if($baiViet->anh_bai_viet && Storage::disk('public')->exists($baiViet->anh_bai_viet)){
            Storage::disk('public')->delete($baiViet->anh_bai_viet);
        }

        // Xóa bài viết
        $baiViet->delete();

        return redirect()->route('admin.baiviets.index')->with('success', 'Xóa bài viết thành công');
    }


    public function onOffBaiViet($id)
    {
        // Tìm kiếm bản ghi bài viết theo ID
        $BaiViet= BaiViet::find($id);

        if (!$BaiViet) {
            return redirect()->route('admin.baiviets.index')->with('error', 'Bài viết không tồn tại.');
        }

        if ($BaiViet->trang_thai) {
            // Nếu trạng thái hiện tại là đang hoạt động, chuyển sang ngừng hoạt động
            $BaiViet->trang_thai = false;
            $BaiViet->save();
            return redirect()->back()->with('success', 'Bài viết đã được duyệt');
        } else {
            // Nếu trạng thái hiện tại là ngừng hoạt động, chuyển sang hoạt động
            $BaiViet->trang_thai = true;
            $BaiViet->save();
            return redirect()->back()->with('error', 'Bài viết chưa được duyệt');
        }
    }
}
