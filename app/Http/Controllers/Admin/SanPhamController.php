<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BienTheSanPham;
use App\Models\DanhGiaSanPham;
use App\Models\DanhMuc;
use App\Models\DungLuong;
use App\Models\HinhAnhSanPham;
use App\Models\MauSac;
use App\Models\SanPham;
use App\Models\Tag;
use App\Models\TagSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sanphams = SanPham::withTrashed()->latest('id')->get();
        $tagsanphams = TagSanPham::get();
        $bienthesanphams = BienTheSanPham::withTrashed()->latest('id')->get();
        $anhsanphams = HinhAnhSanPham::get();
        return view('admins.sanphams.index', compact('sanphams', 'bienthesanphams', 'tagsanphams', 'anhsanphams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $danhmucs = DanhMuc::get();
        $tags = Tag::where('trang_thai', 1)->get();
        $mausacs = MauSac::where('trang_thai', 1)->get();
        $dungluongs = DungLuong::where('trang_thai', 1)->get();
        return view('admins.sanphams.create', compact('danhmucs', 'mausacs', 'dungluongs', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate sản phẩm
        $datasanpham = $request->validate(
            [
                'ma_san_pham' => ['required', 'string', 'max:255', 'unique:san_phams,ma_san_pham'],
                'ten_san_pham' => ['required', 'string', 'max:255'],
                'danh_muc_id' => ['required', 'integer', 'exists:danh_mucs,id'],
                'anh_san_pham' => ['required', 'mimes:jpg,jpeg,png,gif', 'max:2048'], // Thêm quy tắc kích thước tệp
                'mo_ta' => ['required', 'string'],
            ],
            [
                'ma_san_pham.required' => 'Mã sản phẩm không được để trống.',
                'ma_san_pham.string' => 'Mã sản phẩm phải là chuỗi ký tự.',
                'ma_san_pham.max' => 'Mã sản phẩm không được vượt quá 255 ký tự.',
                'ma_san_pham.unique' => 'Mã sản phẩm đã tồn tại.',

                'ten_san_pham.required' => 'Tên sản phẩm không được để trống.',
                'ten_san_pham.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
                'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',

                'danh_muc_id.required' => 'Danh mục ID không được để trống.',
                'danh_muc_id.integer' => 'Danh mục ID phải là số nguyên.',
                'danh_muc_id.exists' => 'Danh mục ID không tồn tại.',

                'anh_san_pham.required' => 'Ảnh sản phẩm không được để trống.',
                'anh_san_pham.mimes' => 'Ảnh sản phẩm phải có định dạng jpg, jpeg, png, hoặc gif.',
                'anh_san_pham.max' => 'Ảnh sản phẩm không được vượt quá 2MB.', // Thêm thông báo kích thước tệp

                'mo_ta.required' => 'Mô tả không được để trống.',
                'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',
            ]
        );


        // validate ảnh sản phẩm
        $dataanhsanphams = $request->validate(
            [
                'hinh_anh' => ['required', 'array'],
                'hinh_anh.*' => ['file', 'mimes:jpg,jpeg,png,gif', 'max:2048'], // Thêm quy tắc kích thước tệp
            ],
            [
                'hinh_anh.required' => 'Album ảnh không được để trống',
                'hinh_anh.array' => 'Album ảnh phải là một mảng',
                'hinh_anh.*.file' => 'Có ảnh sai định dạng',
                'hinh_anh.*.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png, hoặc gif',
                'hinh_anh.*.max' => 'Ảnh không được vượt quá 2MB',
            ]
        );
        //biến thể sản phẩm
        $databienthesanphams = $request->validate([
            'dung_luong_id.*' => ['required', 'exists:dung_luongs,id'],
            'mau_sac_id.*' => ['required', 'exists:mau_sacs,id'],
            'gia_cu.*' => ['required', 'numeric', 'min:1'],
            'gia_moi.*' => ['required', 'numeric', 'min:1'],
            'so_luong.*' => ['required', 'integer', 'min:0'],
        ], [
            'dung_luong_id.*.required' => 'Dung lượng không được để trống.',
            'dung_luong_id.*.exists' => 'Dung lượng không tồn tại.',
            'mau_sac_id.*.required' => 'Màu sắc không được để trống.',
            'mau_sac_id.*.exists' => 'Màu sắc không tồn tại.',
            'gia_cu.*.required' => 'Giá cũ không được để trống.',
            'gia_cu.*.numeric' => 'Giá cũ phải là số.',
            'gia_cu.*.min' => 'Giá cũ phải lớn hơn hoặc bằng 1.',
            'gia_moi.*.required' => 'Giá mới không được để trống.',
            'gia_moi.*.numeric' => 'Giá mới phải là số.',
            'gia_moi.*.min' => 'Giá mới phải lớn hơn hoặc bằng 1.',
            'so_luong.*.required' => 'Số lượng không được để trống.',
            'so_luong.*.integer' => 'Số lượng phải là số nguyên.',
            'so_luong.*.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
        ]);
        // sản phẩm
        if (isset($request['anh_san_pham'])) {
            $path_anh_san_pham = $request->file('anh_san_pham')->store('thumbnail', 'public');
            $datasanpham['anh_san_pham'] = 'storage/' . $path_anh_san_pham;
        }
        $datasanpham['luot_xem'] = 0;
        $datasanpham['da_ban'] = 0;
        $sanpham = SanPham::create($datasanpham);
        //album ảnh
        $hinh_anhs = $request->file('hinh_anh');
        foreach ($hinh_anhs as $hinh_anh) {
            $path = $hinh_anh->store('albums', 'public');
            HinhAnhSanPham::create([
                'san_pham_id' => $sanpham['id'],
                'hinh_anh' => 'storage/' . $path,
            ]);
        }
        // Xử lý và lưu biến thể sản phẩm
        foreach ($databienthesanphams['dung_luong_id'] as $index => $dung_luong_id) {
            BienTheSanPham::create([
                'san_pham_id' => $sanpham['id'],
                'so_luong' => $databienthesanphams['so_luong'][$index],
                'gia_cu' => $databienthesanphams['gia_cu'][$index],
                'gia_moi' => $databienthesanphams['gia_moi'][$index],
                'dung_luong_id' => $dung_luong_id,
                'mau_sac_id' => $databienthesanphams['mau_sac_id'][$index],
            ]);
        }
        // tag sản phẩm
        $tags = $request->input('tag_id', []);
        if (!empty($tags)) {
            $data = [];
            foreach ($tags as $tagId) {
                $data[] = [
                    'tag_id' => $tagId,
                    'san_pham_id' => $sanpham['id'],
                ];
            }
            if (!empty($data)) {
                TagSanPham::insert($data);
            }
        }
        return redirect()->route('admin.sanphams.index')->with('success', 'Thêm thành công sản phẩm');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sanpham = SanPham::withTrashed()->find($id);
        if ($sanpham) {
            $bienthesanphams = BienTheSanPham::withTrashed()->where('san_pham_id', $id)->get();
            $anhsanphams = HinhAnhSanPham::where('san_pham_id', $id)->get();
            $tagsanphams = TagSanPham::where('san_pham_id', $id)->get();
            $danhgias = DanhGiaSanPham::latest('id')->where('san_pham_id', $id)->paginate(5);
            $diemtrungbinh = DanhGiaSanPham::where('san_pham_id', $id)->avg('diem_so');
            $soluotdanhgia = DanhGiaSanPham::where('san_pham_id', $id)->count();
            return view('admins.sanphams.show', compact('sanpham', 'bienthesanphams', 'anhsanphams', 'tagsanphams', 'danhgias', 'diemtrungbinh', 'soluotdanhgia'));
        }
        return redirect()->route('admin.sanphams.index')->with('error', 'Không tìm thấy sản phẩm');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sanpham = SanPham::withTrashed()->find($id);
        if ($sanpham) {
            $bienthesanphams = BienTheSanPham::withTrashed()->where('san_pham_id', $id)->get();
            $hinh_anhs = HinhAnhSanPham::where('san_pham_id', $id)->get();
            $tagsanphams = TagSanPham::where('san_pham_id', $id)->get();

            $danhmucs = DanhMuc::get();
            $tags = Tag::where('trang_thai', 1)->get();
            $mausacs = MauSac::where('trang_thai', 1)->get();
            $dungluongs = DungLuong::where('trang_thai', 1)->get();
            return view('admins.sanphams.update', compact('sanpham', 'bienthesanphams', 'hinh_anhs', 'tagsanphams', 'danhmucs', 'tags', 'mausacs', 'dungluongs'));
        }
        return redirect()->route('admin.sanphams.index')->with('error', 'Không tìm thấy sản phẩm');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // sản phẩm
        $sanpham = SanPham::withTrashed()->find($id);
        $old_anh_san_pham = $sanpham->anh_san_pham;
        $datasanpham = $request->validate(
            [
                'ma_san_pham' => ['string', 'max:255', Rule::unique('san_phams', 'ma_san_pham')->ignore($id)],
                'ten_san_pham' => ['required', 'string', 'max:255'],
                'danh_muc_id' => ['required', 'integer', 'exists:danh_mucs,id'],
                'anh_san_pham' => ['mimes:jpg,jpeg,png,gif', 'max:2048'], // Thêm quy tắc kích thước tệp
                'mo_ta' => ['required', 'string'],
            ],
            [
                'ma_san_pham.required' => 'Mã sản phẩm không được để trống.',
                'ma_san_pham.string' => 'Mã sản phẩm phải là chuỗi ký tự.',
                'ma_san_pham.max' => 'Mã sản phẩm không được vượt quá 255 ký tự.',
                'ma_san_pham.unique' => 'Mã sản phẩm đã tồn tại.',

                'ten_san_pham.required' => 'Tên sản phẩm không được để trống.',
                'ten_san_pham.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
                'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',

                'danh_muc_id.required' => 'Danh mục ID không được để trống.',
                'danh_muc_id.integer' => 'Danh mục ID phải là số nguyên.',
                'danh_muc_id.exists' => 'Danh mục ID không tồn tại.',

                'anh_san_pham.mimes' => 'Ảnh sản phẩm phải có định dạng jpg, jpeg, png, hoặc gif.',
                'anh_san_pham.max' => 'Ảnh sản phẩm không được vượt quá 2MB.', // Thêm thông báo kích thước tệp

                'mo_ta.required' => 'Mô tả không được để trống.',
                'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',
            ]
        );
        if (isset($request['anh_san_pham'])) {
            $path_anh_san_pham = $request->file('anh_san_pham')->store('thumbnail', 'public');
            $datasanpham['anh_san_pham'] = 'storage/' . $path_anh_san_pham;
            if ($old_anh_san_pham) {
                if (file_exists($old_anh_san_pham)) {
                    unlink($old_anh_san_pham);
                }
            }
        }
        $sanpham->update($datasanpham);
        // ảnh sản phẩm
        $dataanhsanphams = $request->validate([
            'hinh_anh.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Tệp phải là hình ảnh với định dạng jpeg, png, jpg, gif và kích thước tối đa 2MB
            'deleted_images' => 'nullable|string', // Các ảnh đã xóa, nếu có
            'old_images' => 'nullable|string', // Các ảnh cũ, nếu có
        ]);
        $deletedImageIds = explode(',', $request->input('deleted_images')); // Chia chuỗi các ID ảnh đã xóa thành mảng
        // Xóa các ảnh đã được chỉ định để xóa
        if (!empty($deletedImageIds)) {
            foreach ($deletedImageIds as $imageId) {
                $image = HinhAnhSanPham::find($imageId); // Tìm ảnh theo ID
                if ($image) {
                    $filePath = $image->hinh_anh; // Lấy đường dẫn file của ảnh
                    // Kiểm tra xem đường dẫn file có hợp lệ trước khi xóa
                    $filePath = str_replace('storage/', '', $filePath);
                    if ($filePath && Storage::exists($filePath)) {
                        Storage::delete($filePath);
                    }
                    // Xóa bản ghi ảnh khỏi cơ sở dữ liệu
                    $image->delete();
                }
            }
        }
        // Xử lý các ảnh mới được tải lên
        if ($request->hasFile('hinh_anh')) {
            foreach ($request->file('hinh_anh') as $hinh_anh) {
                $path = $hinh_anh->store('albums', 'public'); // Lưu tệp ảnh và lấy đường dẫn
                // Lưu thông tin ảnh vào cơ sở dữ liệu
                HinhAnhSanPham::create([
                    'hinh_anh' => 'storage/' . $path, // Đường dẫn ảnh lưu trữ
                    'san_pham_id' => $sanpham['id'], // ID của sản phẩm
                ]);
            }
        }
        // // biến thể sản phẩm cũ
        $databienthesanphams = $request->validate([
            'dung_luong_id.*' => ['required', 'exists:dung_luongs,id'],
            'mau_sac_id.*' => ['required', 'exists:mau_sacs,id'],
            'gia_cu.*' => ['required', 'numeric', 'min:1'],
            'gia_moi.*' => ['required', 'numeric', 'min:1'],
            'so_luong.*' => ['required', 'integer', 'min:0'],
            'trangthai.*' => ['nullable', 'boolean'],
        ], [
            'dung_luong_id.*.required' => 'Dung lượng không được để trống.',
            'dung_luong_id.*.exists' => 'Dung lượng không tồn tại.',
            'mau_sac_id.*.required' => 'Màu sắc không được để trống.',
            'mau_sac_id.*.exists' => 'Màu sắc không tồn tại.',
            'gia_cu.*.required' => 'Giá cũ không được để trống.',
            'gia_cu.*.numeric' => 'Giá cũ phải là số.',
            'gia_cu.*.min' => 'Giá cũ phải lớn hơn hoặc bằng 1.',
            'gia_moi.*.required' => 'Giá mới không được để trống.',
            'gia_moi.*.numeric' => 'Giá mới phải là số.',
            'gia_moi.*.min' => 'Giá mới phải lớn hơn hoặc bằng 1.',
            'so_luong.*.required' => 'Số lượng không được để trống.',
            'so_luong.*.integer' => 'Số lượng phải là số nguyên.',
            'so_luong.*.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
        ]);
        $dungLuongIds = $request->input('dung_luong_id', []);
        $mauSacIds = $request->input('mau_sac_id', []);
        $giaCu = $request->input('gia_cu', []);
        $giaMoi = $request->input('gia_moi', []);
        $soLuong = $request->input('so_luong', []);
        $variantIds = $request->input('variant_id', []);
        $trangthai = $request->input('trangthai', []);
        foreach ($variantIds as $index => $idbienthe) {
            $bienthe = BienTheSanPham::withTrashed()->find($idbienthe);
            if ($bienthe) {
                $bienthe->update([
                    'dung_luong_id' => $dungLuongIds[$index],
                    'mau_sac_id' => $mauSacIds[$index],
                    'gia_cu' => $giaCu[$index],
                    'gia_moi' => $giaMoi[$index],
                    'so_luong' => $soLuong[$index],
                ]);
                if (isset($trangthai[$index]) && $trangthai[$index] == 0) {
                    $bienthe->delete(); // Xóa biến thể sản phẩm
                } else {
                    $bienthe->restore();
                }
            }
        }
        //biến thể sản phẩm mới
        if ($request->has('new_dung_luong_id')) {
            $databienthesanphammois = $request->validate([
                'new_dung_luong_id.*' => ['required', 'exists:dung_luongs,id'],
                'new_mau_sac_id.*' => ['required', 'exists:mau_sacs,id'],
                'new_gia_cu.*' => ['required', 'numeric', 'min:1'],
                'new_gia_moi.*' => ['required', 'numeric', 'min:1'],
                'new_so_luong.*' => ['required', 'integer', 'min:0'],
            ], [
                'new_dung_luong_id.*.required' => 'Dung lượng không được để trống.',
                'new_dung_luong_id.*.exists' => 'Dung lượng không tồn tại.',
                'new_mau_sac_id.*.required' => 'Màu sắc không được để trống.',
                'new_mau_sac_id.*.exists' => 'Màu sắc không tồn tại.',
                'new_gia_cu.*.required' => 'Giá cũ không được để trống.',
                'new_gia_cu.*.numeric' => 'Giá cũ phải là số.',
                'new_gia_cu.*.min' => 'Giá cũ phải lớn hơn hoặc bằng 1.',
                'new_gia_moi.*.required' => 'Giá mới không được để trống.',
                'new_gia_moi.*.numeric' => 'Giá mới phải là số.',
                'new_gia_moi.*.min' => 'Giá mới phải lớn hơn hoặc bằng 1.',
                'new_so_luong.*.required' => 'Số lượng không được để trống.',
                'new_so_luong.*.integer' => 'Số lượng phải là số nguyên.',
                'new_so_luong.*.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
            ]);
            foreach ($databienthesanphammois['new_dung_luong_id'] as $index => $new_dung_luong_id) {
                BienTheSanPham::create([
                    'san_pham_id' => $sanpham['id'],
                    'so_luong' => $databienthesanphammois['new_so_luong'][$index],
                    'gia_cu' => $databienthesanphammois['new_gia_cu'][$index],
                    'gia_moi' => $databienthesanphammois['new_gia_moi'][$index],
                    'dung_luong_id' => $new_dung_luong_id,
                    'mau_sac_id' => $databienthesanphammois['new_mau_sac_id'][$index],
                ]);
            }
        }
        // // // tags
        $newTags = $request->input('tag_id', []);
        if (!is_array($newTags)) {
            $newTags = [];
        }
        // Bắt đầu một giao dịch
        DB::transaction(function () use ($sanpham, $newTags) {
            // Lấy các tag hiện tại
            $currentTags = $sanpham->tags->pluck('id')->toArray();
            // Tính toán các tag cần thêm và xóa
            $tagsToAdd = array_diff($newTags, $currentTags);
            $tagsToRemove = array_diff($currentTags, $newTags);
            // Thêm các tag mới
            if (!empty($tagsToAdd)) {
                $sanpham->tags()->attach($tagsToAdd);
            }
            // Xóa các tag không còn được chọn
            if (!empty($tagsToRemove)) {
                $sanpham->tags()->detach($tagsToRemove);
            }
        });
        return redirect()->back()->with('success', 'Cập nhập thành công sản phẩm');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanpham = SanPham::withTrashed()->find($id);
        if (!$sanpham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        $sanpham->delete();
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }

    public function restore(string $id)
    {
        $sanpham = SanPham::withTrashed()->find($id);
        if (!$sanpham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        $sanpham->restore();
        return redirect()->back()->with('success', 'Khôi phục sản phẩm thành công');
    }
}
