<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\BaiViet;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BaiVietController extends Controller
{
    public function index(Request $request)
{
    $title = "Danh sách bài viết";

    // Khởi tạo truy vấn cho bài viết
    $query = BaiViet::with(['user', 'danhMuc']);

    // Lọc theo người đăng
    if ($request->filled('user_id')) {
        $query->where('user_id', $request->user_id);
    }

    // Lọc theo ngày đăng
    if ($request->filled('ngay_dang')) {
        $query->whereDate('created_at', $request->ngay_dang);
    }

    // Lọc theo trạng thái
    if ($request->filled('trang_thai')) {
        $query->where('trang_thai', $request->trang_thai);
    }

    // Lấy danh sách bài viết với các điều kiện lọc
    $listBaiViet = $query->paginate(10); // Sử dụng phân trang nếu cần

    // Lấy tất cả người dùng
    $users = User::all();

    // Trả về view với dữ liệu cần thiết
    return view('admins.baiviets.index', compact('title', 'listBaiViet', 'users'));
}

    public function create()
    {
        $title = "Thêm mới bài viết";
        $listDanhMuc = DanhMuc::all(); // Lấy danh sách danh mục
        
        return view('admins.baiviets.create', compact('title', 'listDanhMuc'));
    }

    public function store(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $request->validate([
        'tieu_de' => 'required|string|max:255',
        'noi_dung' => 'required|string',
        'anh_bai_viet' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'danh_muc_id' => 'required|exists:danh_mucs,id',
    ]);

    $param = $request->except('_token');

    // Kiểm tra và lưu ảnh bài viết nếu có
    if ($request->hasFile('anh_bai_viet')) {
        $filename = $request->file('anh_bai_viet')->store('baiviets', 'public');
        $param['anh_bai_viet'] = $filename;
    } else {
        $param['anh_bai_viet'] = null; // Nếu không có ảnh, gán là null
    }

    $param['user_id'] = auth()->id(); // Lấy ID của người dùng hiện tại
    $param['trang_thai'] = false; // Đặt trạng thái bài viết là chưa duyệt

    // Tạo bài viết mới
    BaiViet::create($param);

    return redirect()->route('admin.baiviets.index')->with('success', 'Thêm bài viết thành công');
}


    public function edit($id)
{
    // Lấy bài viết theo ID
    $baiViet = BaiViet::findOrFail($id);
    
    // Lấy danh mục để hiển thị trong dropdown
    $listDanhMuc = DanhMuc::all();
    
    // Trả về view edit với dữ liệu cần thiết
    return view('admins.baiviets.update', [
        'title' => 'Sửa bài viết',
        'baiViet' => $baiViet,
        'listDanhMuc' => $listDanhMuc,
    ]);
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'tieu_de' => 'required|string|max:255',
            'noi_dung' => 'required|string',
            'anh_bai_viet' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
        ]);

        $baiViet = BaiViet::findOrFail($id);
        $param = $request->except('_token', '_method');

        if ($request->hasFile('anh_bai_viet')) {
            // Xóa hình ảnh cũ nếu có
            if ($baiViet->anh_bai_viet && Storage::disk('public')->exists($baiViet->anh_bai_viet)) {
                Storage::disk('public')->delete($baiViet->anh_bai_viet);
            }
            $filename = $request->file('anh_bai_viet')->store('baiviets', 'public');
            $param['anh_bai_viet'] = $filename;
        }

        $baiViet->update($param);
        return redirect()->route('admin.baiviets.index')->with('success', 'Cập nhật bài viết thành công');
    }

    public function destroy($id)
    {
        $baiViet = BaiViet::findOrFail($id);
        
        // Xóa hình ảnh nếu có
        if ($baiViet->anh_bai_viet && Storage::disk('public')->exists($baiViet->anh_bai_viet)) {
            Storage::disk('public')->delete($baiViet->anh_bai_viet);
        }

        $baiViet->delete();
        return redirect()->route('admin.baiviets.index')->with('success', 'Xóa bài viết thành công');
    }


    public function onOffBaiViet($id)
{
    // Tìm kiếm bản ghi bài viết theo ID
    $BaiViet = BaiViet::find($id);

    if (!$BaiViet) {
        return redirect()->route('admin.baiviets.index')->with('error', 'Bài viết không tồn tại.');
    }

    // Chuyển đổi trạng thái bài viết
    $BaiViet->trang_thai = !$BaiViet->trang_thai; // Đảo ngược trạng thái hiện tại

    // Lưu trạng thái mới
    $BaiViet->save();

    // Gửi thông báo thành công dựa trên trạng thái mới
    if ($BaiViet->trang_thai) {
        return redirect()->back()->with('success', 'Bài viết đã được duyệt');
    } else {
        return redirect()->back()->with('error', 'Bài viết chưa được duyệt');
    }
}

}
