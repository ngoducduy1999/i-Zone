@extends('layouts.admin')
@section('title', 'Chi tiết sản phẩm')
@section('content')

    <style>
        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .preview-item {
            position: relative;
            border: 1px solid #ccc;
            padding: 10px;
            width: auto;
            max-width: 200px;
            /* Adjust width as needed */
        }

        .delete-button {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            background-color: #fff;
            border: none;
            color: red;
            font-weight: bold;
            padding: 0;
        }

        .delete-button:hover {
            color: darkred;
        }
    </style>
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Chi tiết sản phẩm</h4>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Chi tiết sản phẩm</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="ma_san_pham" class="form-label">Mã sản phẩm</label>
                                    <input type="text" id="ma_san_pham" id="ma_san_pham" name="ma_san_pham"
                                        class="form-control" placeholder="Mã sản phẩm" value="{{ $sanpham->ma_san_pham }}"
                                        disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                                    <input type="text" id="ten_san_pham" id="ten_san_pham" name="ten_san_pham"
                                        class="form-control" placeholder="Tên sản phẩm"
                                        value=" {{ $sanpham->ten_san_pham }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="danh_muc_id" class="form-label">Danh mục sản phẩm</label>
                                    <input type="text" id="danh_muc_id" id="danh_muc_id" name="danh_muc_id"
                                        class="form-control" placeholder="Tên sản phẩm"
                                        value=" {{ $sanpham->danhMuc->ten_danh_muc }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="example-multiselect" class="form-label">Tags sản phẩm</label>
                                    <select id="example-multiselect" multiple class="form-control" id="tag_id"
                                        name="tag_id[]">
                                        @foreach ($tagsanphams as $tag)
                                            <option value="{{ $tag->id }}">
                                                {{ $tag->tag->ten_tag }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="anh_san_pham" class="form-label">Ảnh sản phẩm</label><br>
                                    <img src="{{ asset($sanpham->anh_san_pham) }}" alt="" width="50px"
                                        id="img" class="py-1">
                                </div>
                                <div class="mb-3">
                                    <label for="hinh_anh" class="form-label">Album ảnh:</label><br>
                                    @foreach ($anhsanphams as $anhsanpham)
                                        <img src="{{ asset($anhsanpham->hinh_anh) }}" alt="" width="50px"
                                            id="img" class="py-1">
                                    @endforeach

                                </div>
                                <div class="mb-3">
                                    <div class="preview-container" id="preview"></div>
                                </div>
                                <a href="{{ route('admin.sanphams.index') }}" class="btn btn-primary"
                                    style="margin-top: 10px">Danh sách sản
                                    phẩm</a>
                            </div>
                            <div class="col-lg-8">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Biến thể sản phẩm</h5>
                                </div>
                                <div class="mb-3">
                                    <div id="variants-container">
                                        <div class="variant" data-index="0">
                                            @foreach ($bienthesanphams as $bienthesanpham)
                                                <div class="row g-3">
                                                    <div class="col-md-2">
                                                        <label for="dung_luong_id-0" class="form-label">Dung
                                                            lượng:</label>
                                                        <input type="text" id="dung_luong_id" id="dung_luong_id"
                                                            name="dung_luong_id" class="form-control"
                                                            value="{{ $bienthesanpham->dungLuong->ten_dung_luong }}"
                                                            disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="mau_sac_id-0" class="form-label">Màu sắc:</label>
                                                        <input type="text" id="mau_sac_id" id="mau_sac_id"
                                                            name="mau_sac_id" class="form-control"
                                                            value="{{ $bienthesanpham->mauSac->ten_mau_sac }}" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="gia_cu-0" class="form-label">Giá cũ:</label>
                                                        <input type="number" class="form-control" id="gia_cu-0"
                                                            name="gia_cu[]" min="0" required
                                                            value="{{ $bienthesanpham->gia_cu }}" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="gia_moi-0" class="form-label">Giá mới:</label>
                                                        <input type="number" class="form-control" id="gia_moi-0"
                                                            name="gia_moi[]" min="0" required
                                                            value="{{ $bienthesanpham->gia_moi }}" disabled>

                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="so_luong-0" class="form-label">Số lượng:</label>
                                                        <input type="number" class="form-control" id="so_luong-0"
                                                            name="so_luong[]" min="0" required
                                                            value="{{ $bienthesanpham->so_luong }}" disabled>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea name="mo_ta" id="mo_ta" cols="30" rows="10">{{ $sanpham->mo_ta }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>
    <script>
        // mô tả
        CKEDITOR.replace('mo_ta');
    </script>
@endsection
