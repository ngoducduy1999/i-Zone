<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BienTheSanPham;
use App\Models\DanhMuc;
use App\Models\DungLuong;
use App\Models\HinhAnhSanPham;
use App\Models\MauSac;
use App\Models\SanPham;
use App\Models\Tag;
use App\Models\TagSanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.sanphams.index');
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
