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
        $sanphams = SanPham::withTrashed()->latest('id')->paginate(5);
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
        $request->validate(
            [
                'ma_san_pham' => ['required', 'string', 'max:255', 'unique:san_phams,ma_san_pham'],
                'ten_san_pham' => ['required', 'string', 'max:255'],
                'danh_muc_id' => ['required', 'integer', 'exists:danh_mucs,id'],
                'anh_san_pham' => ['required', 'mimes:jpg,jpeg,png,gif', 'max:4048'], // Thêm quy tắc kích thước tệp
                'mo_ta' => ['nullable', 'string'],

                // ảnh sản phẩm
                'hinh_anh' => ['required', 'array'],
                'hinh_anh.*' => ['file', 'mimes:jpg,jpeg,png,gif', 'max:4048'],

                // //biến thể sản phẩm
                'dung_luong_id.*' => ['required', 'exists:dung_luongs,id'],
                'mau_sac_id.*' => ['required', 'exists:mau_sacs,id'],
                'gia_cu.*' => ['required', 'numeric', 'min:1', 'max:4000000000'],
                'gia_moi.*' => ['required', 'numeric', 'min:1', 'max:4000000000'],
                'so_luong.*' => ['required', 'min:0', 'max:4000000000', 'integer'],
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
                'anh_san_pham.max' => 'Ảnh sản phẩm không được vượt quá 4MB.', // Thêm thông báo kích thước tệp

                'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',

                // ảnh sản phẩm
                'hinh_anh.required' => 'Album ảnh không được để trống',
                'hinh_anh.array' => 'Album ảnh phải là một mảng',
                'hinh_anh.*.file' => 'Có ảnh sai định dạng',
                'hinh_anh.*.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png, hoặc gif',
                'hinh_anh.*.max' => 'Ảnh không được vượt quá 4MB',

                // //biến thể sản phẩm
                'dung_luong_id.*.required' => 'Dung lượng không được để trống.',
                'dung_luong_id.*.exists' => 'Dung lượng không tồn tại.',
                'mau_sac_id.*.required' => 'Màu sắc không được để trống.',
                'mau_sac_id.*.exists' => 'Màu sắc không tồn tại.',

                'gia_cu.*.required' => 'Giá cũ không được để trống.',
                'gia_cu.*.numeric' => 'Giá cũ phải là số.',
                'gia_cu.*.min' => 'Giá cũ phải lớn hơn hoặc bằng 1.',
                'gia_cu.*.max' => 'Giá cũ phải nhỏ hơn 4 tỷ.',

                'gia_moi.*.required' => 'Giá mới không được để trống.',
                'gia_moi.*.numeric' => 'Giá mới phải là số.',
                'gia_moi.*.min' => 'Giá mới phải lớn hơn hoặc bằng 1.',
                'gia_moi.*.max' => 'Giá mới phải nhỏ hơn 4 tỷ.',

                'so_luong.*.required' => 'Số lượng không được để trống.',
                'so_luong.*.max' => 'Số lượng phải nhỏ hơn 4 tỷ.',
                'so_luong.*.integer' => 'Số lượng phải là số nguyên.',
                'so_luong.*.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
            ]
        );

        // // sản phẩm
        $datasanpham = $request->only([
            'ma_san_pham',
            'ten_san_pham',
            'danh_muc_id',
            'anh_san_pham',
            'mo_ta',
        ]);
        if ($request->hasFile('anh_san_pham')) {
            $path_anh_san_pham = $request->file('anh_san_pham')->store('thumbnail', 'public');
            $datasanpham['anh_san_pham'] = 'storage/' . $path_anh_san_pham;
        }
        $datasanpham['luot_xem'] = 0;
        $datasanpham['da_ban'] = 0;
        $sanpham = SanPham::create($datasanpham);
        // //album ảnh
        $hinh_anhs = $request->file('hinh_anh');
        foreach ($hinh_anhs as $hinh_anh) {
            $path = $hinh_anh->store('albums', 'public');
            HinhAnhSanPham::create([
                'san_pham_id' => $sanpham['id'],
                'hinh_anh' => 'storage/' . $path,
            ]);
        }
        // // Xử lý và lưu biến thể sản phẩm
        $flag = true;
        $databienthesanphams = $request->only(['dung_luong_id', 'mau_sac_id', 'gia_cu', 'gia_moi', 'so_luong']);
        foreach ($databienthesanphams['dung_luong_id'] as $index => $dung_luong_id) {
            $exists = BienTheSanPham::where('san_pham_id', $sanpham['id'])
                ->where('dung_luong_id', $dung_luong_id)
                ->where('mau_sac_id', $databienthesanphams['mau_sac_id'][$index])
                ->exists();
            if (!$exists) {
                BienTheSanPham::create([
                    'san_pham_id' => $sanpham['id'],
                    'so_luong' => $databienthesanphams['so_luong'][$index],
                    'gia_cu' => $databienthesanphams['gia_cu'][$index],
                    'gia_moi' => $databienthesanphams['gia_moi'][$index],
                    'dung_luong_id' => $dung_luong_id,
                    'mau_sac_id' => $databienthesanphams['mau_sac_id'][$index],
                ]);
            } else {
                $flag = false;
            }
        }
        // // tag sản phẩm
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
        if (!$flag) {
            return redirect()->route('admin.sanphams.edit', ['id' => $sanpham['id']])->with('error', 'Không thể thêm biến thể trùng!');
        }
        return redirect()->route('admin.sanphams.index')->with('success', 'Thêm thành công sản phẩm!');
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

            // Lấy danh sách đánh giá sản phẩm
            $danhgias = DanhGiaSanPham::latest('id')->where('san_pham_id', $id)->paginate(10);

            // Tính điểm trung bình và số lượt đánh giá
            $diemtrungbinh = DanhGiaSanPham::where('san_pham_id', $id)->avg('diem_so');
            $soluotdanhgia = DanhGiaSanPham::where('san_pham_id', $id)->count();

            // Tính tỷ lệ phần trăm cho mỗi loại sao
            $starCounts = DanhGiaSanPham::select(DB::raw('diem_so, count(*) as count'))
                ->where('san_pham_id', $id)
                ->groupBy('diem_so')
                ->pluck('count', 'diem_so');

            $totalRatings = $starCounts->sum(); // Tổng số đánh giá
            $starPercentage = [];

            for ($i = 1; $i <= 5; $i++) {
                $percentage = $totalRatings > 0 ? ($starCounts->get($i, 0) / $totalRatings) * 100 : 0;
                $starPercentage[$i] = $percentage;
            }

            return view('admins.sanphams.show', compact(
                'sanpham',
                'bienthesanphams',
                'anhsanphams',
                'tagsanphams',
                'danhgias',
                'diemtrungbinh',
                'soluotdanhgia',
                'starPercentage' // Truyền tỷ lệ phần trăm sao vào view
            ));
        }
        return redirect()->route('admin.sanphams.index')->with('error', 'Không tìm thấy sản phẩm');
    }

    public function filterDanhGia(string $id, $star)
    {
        $danhgias = DanhGiaSanPham::where('san_pham_id', $id);

        // Nếu star không phải 'all', lọc theo số sao
        if ($star !== 'all') {
            $danhgias = $danhgias->where('diem_so', (int)$star);
        }

        $danhgias = $danhgias->latest('id')->paginate(10);

        // Trả về HTML của danh sách đánh giá
        return view('admins.sanphams.danh_gia_list', compact('danhgias'));
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
        $request->validate(
            [
                'ma_san_pham' => ['string', 'max:255', Rule::unique('san_phams', 'ma_san_pham')->ignore($id)],
                'ten_san_pham' => ['required', 'string', 'max:255'],
                'danh_muc_id' => ['required', 'integer', 'exists:danh_mucs,id'],
                'anh_san_pham' => ['mimes:jpg,jpeg,png,gif', 'max:4048'],
                'mo_ta' => ['nullable', 'string'],

                // ảnh sản phẩm
                'hinh_anh.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:4048'], // Tệp phải là hình ảnh với định dạng jpeg, png, jpg, gif và kích thước tối đa 2MB
                'deleted_images' => ['nullable', 'string'], // Các ảnh đã xóa, nếu có
                'old_images' => ['nullable', 'string'],

                // // biến thể sản phẩm cũ
                'dung_luong_id.*' => ['required', 'exists:dung_luongs,id'],
                'mau_sac_id.*' => ['required', 'exists:mau_sacs,id'],
                'gia_cu.*' => ['required', 'numeric', 'min:1', 'max:4000000000'],
                'gia_moi.*' => ['required', 'numeric', 'min:1', 'max:4000000000'],
                'so_luong.*' => ['required', 'numeric', 'min:0', 'max:4000000000'],
                'trangthai.*' => ['nullable', 'boolean'],

                // // biến thể sản phẩm mới
                'new_dung_luong_id.*' => ['required', 'exists:dung_luongs,id'],
                'new_mau_sac_id.*' => ['required', 'exists:mau_sacs,id'],
                'new_gia_cu.*' => ['required', 'numeric', 'min:1', 'max:4000000000'],
                'new_gia_moi.*' => ['required', 'numeric', 'min:1', 'max:4000000000'],
                'new_so_luong.*' => ['required', 'integer', 'min:0', 'max:4000000000'],
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
                'anh_san_pham.max' => 'Ảnh sản phẩm không được vượt quá 4MB.',

                'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',

                // ảnh sản phẩm
                'hinh_anh.*.image' => 'Phải là ảnh',
                'hinh_anh.*.mimes' => 'Ảnh sản phẩm phải có định dạng jpg, jpeg, png, hoặc gif.',
                'hinh_anh.*.max' => 'Ảnh sản phẩm không được vượt quá 4MB.',

                // // biến thể sản phẩm cũ
                'dung_luong_id.*.required' => 'Dung lượng không được để trống.',
                'dung_luong_id.*.exists' => 'Dung lượng không tồn tại.',

                'mau_sac_id.*.required' => 'Màu sắc không được để trống.',
                'mau_sac_id.*.exists' => 'Màu sắc không tồn tại.',

                'gia_cu.*.required' => 'Giá cũ không được để trống.',
                'gia_cu.*.numeric' => 'Giá cũ phải là số.',
                'gia_cu.*.min' => 'Giá cũ phải lớn hơn hoặc bằng 1.',
                'gia_cu.*.max' => 'Giá cũ phải nhỏ hơn 4 tỷ.',

                'gia_moi.*.required' => 'Giá mới không được để trống.',
                'gia_moi.*.numeric' => 'Giá mới phải là số.',
                'gia_moi.*.min' => 'Giá mới phải lớn hơn hoặc bằng 1.',
                'gia_moi.*.max' => 'Giá mới phải nhỏ hơn 4 tỷ.',

                'so_luong.*.required' => 'Số lượng không được để trống.',
                'so_luong.*.numeric' => 'Số lượng phải là số nguyên.',
                'so_luong.*.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
                'so_luong.*.max' => 'Số lượng phải nhỏ hơn 4 tỷ.',

                // // biến thể sản phẩm mới
                'new_dung_luong_id.*.required' => 'Dung lượng không được để trống.',
                'new_dung_luong_id.*.exists' => 'Dung lượng không tồn tại.',
                'new_mau_sac_id.*.required' => 'Màu sắc không được để trống.',
                'new_mau_sac_id.*.exists' => 'Màu sắc không tồn tại.',

                'new_gia_cu.*.required' => 'Giá cũ không được để trống.',
                'new_gia_cu.*.numeric' => 'Giá cũ phải là số.',
                'new_gia_cu.*.min' => 'Giá cũ phải lớn hơn hoặc bằng 1.',
                'new_gia_cu.*.max' => 'Giá cũ phải nhỏ hơn 4 tỷ.',

                'new_gia_moi.*.required' => 'Giá mới không được để trống.',
                'new_gia_moi.*.numeric' => 'Giá mới phải là số.',
                'new_gia_moi.*.min' => 'Giá mới phải lớn hơn hoặc bằng 1.',
                'new_gia_moi.*.max' => 'Giá mới phải nhỏ hơn 4 tỷ.',

                'new_so_luong.*.required' => 'Số lượng không được để trống.',
                'new_so_luong.*.integer' => 'Số lượng phải là số nguyên.',
                'new_so_luong.*.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
                'new_so_luong.*.max' => 'Số lượng phải nhỏ hơn 4 tỷ.',
            ]
        );

        $datasanpham = $request->only([
            'ma_san_pham',
            'ten_san_pham',
            'danh_muc_id',
            'anh_san_pham',
            'mo_ta',
        ]);
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

        // biến thể sản phẩm cũ
        $dungLuongIds = $request->input('dung_luong_id', []);
        $mauSacIds = $request->input('mau_sac_id', []);
        $giaCu = $request->input('gia_cu', []);
        $giaMoi = $request->input('gia_moi', []);
        $soLuong = $request->input('so_luong', []);
        $variantIds = $request->input('variant_id', []);
        $trangthai = $request->input('trangthai', []);
        // Mảng để theo dõi các biến thể đã tồn tại
        $existingVariants = [];
        foreach ($variantIds as $index => $idbienthe) {
            $bienthe = BienTheSanPham::withTrashed()->find($idbienthe);
            if ($bienthe) {
                // Tạo khóa duy nhất cho dung lượng và màu sắc
                $key = $dungLuongIds[$index] . '-' . $mauSacIds[$index];
                // Kiểm tra sự tồn tại trong mảng
                if (!in_array($key, $existingVariants)) {
                    // Kiểm tra sự tồn tại trong cơ sở dữ liệu
                    $exists = BienTheSanPham::where('san_pham_id', $sanpham['id'])
                        ->where('dung_luong_id', $dungLuongIds[$index])
                        ->where('mau_sac_id', $mauSacIds[$index])
                        ->when($bienthe->id, function ($query) use ($bienthe) {
                            return $query->where('id', '!=', $bienthe->id);
                        })
                        ->exists();

                    if (!$exists) {
                        // Cập nhật biến thể
                        $bienthe->update([
                            'dung_luong_id' => $dungLuongIds[$index],
                            'mau_sac_id' => $mauSacIds[$index],
                            'gia_cu' => $giaCu[$index],
                            'gia_moi' => $giaMoi[$index],
                            'so_luong' => $soLuong[$index],
                        ]);

                        // Thêm khóa vào mảng các biến thể đã tồn tại
                        $existingVariants[] = $key;

                        // Kiểm tra trạng thái
                        if (isset($trangthai[$index]) && $trangthai[$index] == 0) {
                            $bienthe->delete(); // Xóa biến thể sản phẩm
                        } else {
                            $bienthe->restore(); // Khôi phục biến thể
                        }
                    } else {
                        return redirect()->back()->with('error', 'Cập nhật biến thể sản phẩm thất bại. Có biến thể trùng lặp!');
                    }
                } else {
                    return redirect()->back()->with('error', 'Cập nhật biến thể sản phẩm thất bại. Có biến thể trùng lặp!');
                }
            }
        }

        $flag = true;
        if ($request->has('new_dung_luong_id')) {
            // Lấy dữ liệu biến thể mới
            $databienthesanphammois = $request->only([
                'new_dung_luong_id',
                'new_mau_sac_id',
                'new_gia_cu',
                'new_gia_moi',
                'new_so_luong',
            ]);
            foreach ($databienthesanphammois['new_dung_luong_id'] as $index => $new_dung_luong_id) {
                // Kiểm tra xem biến thể đã tồn tại chưa
                $exists = BienTheSanPham::where('san_pham_id', $sanpham['id'])
                    ->where('dung_luong_id', $new_dung_luong_id)
                    ->where('mau_sac_id', $databienthesanphammois['new_mau_sac_id'][$index])
                    ->exists();

                // Nếu biến thể chưa tồn tại, thêm mới
                if (!$exists) {
                    BienTheSanPham::create([
                        'san_pham_id' => $sanpham['id'],
                        'so_luong' => $databienthesanphammois['new_so_luong'][$index],
                        'gia_cu' => $databienthesanphammois['new_gia_cu'][$index],
                        'gia_moi' => $databienthesanphammois['new_gia_moi'][$index],
                        'dung_luong_id' => $new_dung_luong_id,
                        'mau_sac_id' => $databienthesanphammois['new_mau_sac_id'][$index],
                    ]);
                } else {
                    $flag = false;
                }
            }
        }

        // tags
        $newTags = $request->input('tag_id', []);
        if (!is_array($newTags)) {
            $newTags = [];
        }
        DB::transaction(function () use ($sanpham, $newTags) {
            // Sử dụng sync để thêm hoặc xóa tag
            $sanpham->tags()->sync($newTags);
        });
        if (!$flag) {
            return redirect()->back()->with('success', 'Cập nhập sản phẩm thành công. Biến thể trùng sẽ không được thêm!');
        }
        return redirect()->back()->with('success', 'Cập nhập sản phẩm thành công');
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
