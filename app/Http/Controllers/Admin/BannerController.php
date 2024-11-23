<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bannersHea = Banner::where('vi_tri', 'header')->get();
        $bannersSide = Banner::where('vi_tri', 'sidebar')->get();
        $bannersFoot = Banner::where('vi_tri', 'footer')->get();
        return view('admins.banners.index', compact('bannersHea', 'bannersSide', 'bannersFoot'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sanphams = SanPham::latest()->get();
        return view('admins.banners.create', compact('sanphams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate các trường dữ liệu
        $request->validate([
            'ten_banner.*' => 'required|string|max:255',
            'hinh_anh' => 'required',
            'hinh_anh.*' => 'image|mimes:jpg,jpeg,png,gif,bmp,webp,svg|max:2048',
            'url_lien_ket.*' => 'nullable',
        ], [
            'ten_banner.*.required' => 'Tên banner không được để trống.',
            'ten_banner.*.string' => 'Tên banner phải là một đoạn chuỗi.',
            'ten_banner.*.max' => 'Tên banner phải < 255 ký tự.',

            'hinh_anh.required' => 'Hình ảnh banner không được để trống.',
            'hinh_anh.*.image' => 'Hình ảnh phải là ảnh',
            'hinh_anh.*.mimes' => 'Hình ảnh phải có định dạng jpg,jpeg,png,gif,bmp,webp,svg.',
            'hinh_anh.*.max' => 'Hình ảnh phải có dung lượng nhỏ hơn 2mb.',

        ]);

        // Lấy tất cả thông tin từ form
        $ten_banners = $request->input('ten_banner');
        $vi_tri = $request->input('vi_tri');
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
        $banners = Banner::latest()->where('vi_tri', $vi_tri)->get();
        $sanphams = SanPham::latest()->get();
        return view('admins.banners.show', compact('banners', 'vi_tri', 'sanphams'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($vi_tri)
    {
        $banners = Banner::where('vi_tri', $vi_tri)->get();
        if (!$banners) {
            return redirect()->route('admin.banners.index')->with('error', 'Banner không tồn tại');
        }
        // dd($banners);
        $sanphams = SanPham::latest()->get();
        return view('admins.banners.update', compact('banners', 'sanphams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'ten_banner' => 'required',
            'ten_banner.*' => 'required|string|max:255',
            'anh_banner.*' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp,webp,svg|max:2048',
            'url_lien_ket.*' => 'required',
        ],[
            'ten_banner.required' => 'Tên banner không được để trống.',
            'ten_banner.*.required' => 'Tên banner không được để trống.',
            'ten_banner.*.string' => 'Tên banner phải là một đoạn chuỗi.',
            'ten_banner.*.max' => 'Tên banner phải < 255 ký tự.',

            'anh_banner.*.image' => 'Hình ảnh phải là ảnh',
            'anh_banner.*.mimes' => 'Hình ảnh phải có định dạng jpg,jpeg,png,gif,bmp,webp,svg.',
            'anh_banner.*.max' => 'Hình ảnh phải có dung lượng nhỏ hơn 2mb.',
        ]);
        foreach ($request->ten_banner as $key => $value) {
            $banner = Banner::find($key);
            $old_image = $banner->anh_banner;
            $banner->ten_banner = $value;
            if ($request->hasFile('anh_banner.' . $key)) {
                $file = $request->file('anh_banner.' . $key);
                $path = $file->store('banners', 'public');
                $banner->anh_banner = $path;
                if (file_exists(public_path('storage/' . $old_image))) {
                    unlink(public_path('storage/' . $old_image));
                }
            }
            $banner->url_lien_ket = $request->input('url_lien_ket')[$key];
            $banner->save();
        }
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
        $banners = Banner::where('vi_tri', $banner->vi_tri)->get();
        if (count($banners) <= 1) {
            return redirect()->back()->with('error', 'Còn một banner không thể xóa!');
        }
        if (!$banner) {
            return redirect()->route('admin.banners.index')->with('error', 'Banner không tồn tại!');
        }
        $old_image = $banner->anh_banner;
        if (file_exists(public_path('storage/' . $old_image))) {
            unlink(public_path('storage/' . $old_image));
        }
        $banner->delete();
        return redirect()->back()->with('success', 'Xóa banner thành công!');
    }
}
