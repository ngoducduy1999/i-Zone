<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // Validate các trường dữ liệu
        $request->validate([
            'ten_banner' => 'required|array',
            'ten_banner.*' => 'required|string|max:255',
            'vi_tri' => 'required|string|max:50',
            'ngay_bat_dau' => 'required|array',
            'ngay_bat_dau.*' => 'required|date',
            'ngay_ket_thuc' => 'required|array',
            'ngay_ket_thuc.*' => 'required|date|after_or_equal:ngay_bat_dau.*',
            'hinh_anh' => 'required|array',
            'hinh_anh.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'url_lien_ket' => 'nullable|array', // Add validation for URLs (optional)
            'url_lien_ket.*' => 'nullable|url', // Validate each URL
        ]);
    
        // Lấy tất cả thông tin từ form
        $ten_banners = $request->input('ten_banner');
        $vi_tri = $request->input('vi_tri');
        $ngay_bat_dau = $request->input('ngay_bat_dau');
        $ngay_ket_thuc = $request->input('ngay_ket_thuc');
        $hinh_anhs = $request->file('hinh_anh'); // Lấy danh sách ảnh đã upload
        $url_lien_kets = $request->input('url_lien_ket'); // Lấy danh sách URL liên kết (có thể rỗng)
    
        // Duyệt qua tất cả các ảnh và tạo banner cho từng ảnh
        foreach ($hinh_anhs as $index => $file) {
            // Lưu file ảnh vào thư mục storage (hoặc public nếu cần)
            $fileName = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('banners', $fileName, 'public');
    
            // Tạo mới banner cho mỗi ảnh
            $banner = new Banner();
            $banner->ten_banner = $ten_banners[$index]; // Tên banner tương ứng
            $banner->vi_tri = $vi_tri; // "Vị trí" áp dụng chung
            $banner->ngay_bat_dau = $ngay_bat_dau[$index]; // Ngày bắt đầu tương ứng
            $banner->ngay_ket_thuc = $ngay_ket_thuc[$index]; // Ngày kết thúc tương ứng
            $banner->anh_banner = $filePath; // Lưu đường dẫn ảnh
            $banner->url_lien_ket = $url_lien_kets[$index] ?? null; // Lưu URL liên kết nếu có
            $banner->save();
        }
    
        // Redirect lại trang hoặc thông báo thành công
        return redirect()->route('admin.banners.index')->with('success', 'Banner đã được thêm thành công.');
    }
    public function show($vi_tri)
{
    // Lọc các banner theo vị trí được truyền vào
    $banners = Banner::where('vi_tri', $vi_tri)->get();
    
    return view('admins.banners.show', compact('banners', 'vi_tri'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banners.index')->with('error', 'Banner không tồn tại');
        }
        return view('admins.banners.update', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banners.index')->with('error', 'Banner không tồn tại');
        }

        $data = $request->validate(
            [
                'ten_banner' => ['required', 'string', 'max:255'],
                'anh_banner' => ['array'],
                'anh_banner.*' => ['image', 'mimes:jpg,png,jpeg,gif'],
                'ngay_bat_dau' => ['required', 'date'],
                'ngay_ket_thuc' => ['required', 'date', 'after_or_equal:ngay_bat_dau'],
                'vi_tri' => ['required', 'integer'],
            ],
            [
                'ten_banner.required' => 'Tên banner không được để trống',
                'ten_banner.string' => 'Tên banner phải là chuỗi',
                'ten_banner.max' => 'Tên banner không quá 255 ký tự',

                'anh_banner.array' => 'Ảnh banner phải là một mảng',
                'anh_banner.*.image' => 'Ảnh banner phải là ảnh',
                'anh_banner.*.mimes' => 'Ảnh banner phải có đuôi jpg, png, jpeg, gif',

                'ngay_bat_dau.required' => 'Ngày bắt đầu không được để trống',
                'ngay_ket_thuc.required' => 'Ngày kết thúc không được để trống',
                'ngay_ket_thuc.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu',
                'vi_tri.required' => 'Vị trí không được để trống',
            ]
        );

        // Update banner images
        $old_banners = json_decode($banner->anh_banner, true);
        
        // Delete old images
        foreach ($old_banners as $old_banner) {
            if (file_exists(public_path($old_banner))) {
                unlink(public_path($old_banner));
            }
        }

        $paths = [];
        if (isset($request['anh_banner'])) {
            foreach ($request['anh_banner'] as $file) {
                $path_banner = $file->store('banners', 'public');
                $paths[] = 'storage/' . $path_banner;
            }
        }

        $data['anh_banner'] = json_encode($paths);
        $banner->update($data);
        
        return redirect()->back()->with('success', 'Cập nhật banner thành công');
    }

    public function onOffBanner($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banners.index')->with('error', 'Banner không tồn tại');
        }
        $banner->trang_thai = !$banner->trang_thai; // Toggle trạng thái
        $banner->save();

        return redirect()->back()->with('success', $banner->trang_thai ? 'Hoạt động banner' : 'Ngừng hoạt động banner');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banners.index')->with('error', 'Banner không tồn tại');
        }

        // Delete old images
        $old_banners = json_decode($banner->anh_banner, true);
        foreach ($old_banners as $old_banner) {
            if (file_exists(public_path($old_banner))) {
                unlink(public_path($old_banner));
            }
        }

        $banner->delete();
        return redirect()->back()->with('success', 'Xóa banner thành công');
    }
}
