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
                                    <input type="text" id="danh_muc_id" name="danh_muc_id" class="form-control"
                                        placeholder="Tên sản phẩm"
                                        value="{{ $sanpham->danhMuc ? $sanpham->danhMuc->ten_danh_muc : '' }}" disabled>
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
                                    <textarea name="mo_ta" id="mo_ta" cols="30" rows="10" disabled>{{ $sanpham->mo_ta }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card px-5">
                    <div class="card-header">
                        <h5 class="card-title mb-0 fs-2">Đánh giá sản phẩm</h5>
                    </div>
                    <div class="card-body">
                        {{-- <div id="stacked_area_chart" class="apex-charts d-flex align-items-center">
                            <h1 class="m-0">4.5</h1>
                            <h5 class="m-0 ml-2">trên 5 sao</h5>
                        </div> --}}
                        <div class="bg-light">
                            @if ($soluotdanhgia > 0)
                                <div id="area_chart-years"
                                    class="apex-charts px-5 py-3 d-flex justify-content-between align-items-center">
                                    <div class="">
                                        <div class="text-danger">
                                            <span class="m-0 fs-1">{{ number_format($diemtrungbinh, 1) }}</span>

                                            <span class="m-0">trên 5</span>
                                        </div>
                                        <div class="">
                                            <p class="m-0 fs-1">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= floor($diemtrungbinh) && $diemtrungbinh < 5)
                                                        <span class="star text-warning">★</span> <!-- Sao vàng -->
                                                    @elseif ($i == ceil($diemtrungbinh))
                                                        @if ($diemtrungbinh - floor($diemtrungbinh) >= 0.3 && $diemtrungbinh - floor($diemtrungbinh) < 0.8)
                                                            <span class="star text-warning">☆</span> <!-- Sao rưỡi -->
                                                        @else
                                                            <span class="star text-muted">★</span> <!-- Sao xám -->
                                                        @endif
                                                    @else
                                                        <span class="star text-muted">★</span> <!-- Sao xám -->
                                                    @endif
                                                @endfor
                                            </p>
                                        </div>
                                    </div>
                                    <p class="text-black">{{ $soluotdanhgia }} lượt đánh giá</p>
                                </div>
                            @else
                                <div id="area_chart-years"
                                    class="apex-charts px-5 py-3 d-flex justify-content-between align-items-center">
                                    <div class="">
                                        <div class="text-danger">
                                            <span class="m-0 fs-1">Chưa có đánh giá</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        @foreach ($danhgias as $danhgia)
                            <div class="github-style d-flex my-2">
                                <div class="flex-shrink-0 me-2">
                                    <img src="{{ asset('storage/'. $danhgia->user->anh_dai_dien) }}" alt="" height="32"
                                        width="32" class="avatar-sm rounded-pill"
                                        style="object-fit: cover; object-position: center;">
                                </div>
                                <div class="flex-grow-1">
                                    <a class="font-size-14 text-body fw-medium">{{ $danhgia->user->ten }}</a>
                                    <div class="cmeta text-muted font-size-11">
                                        <div class="stars">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $danhgia->diem_so)
                                                    <span class="star text-warning">★</span>
                                                @else
                                                    <span class="star text-muted">★</span>
                                                @endif
                                            @endfor
                                        </div>
                                        <p class="m-0">{{ $danhgia->created_at }}</p>
                                        <span
                                            class="commits text-body fw-medium text-black">{{ $danhgia->nhan_xet }}</span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ $danhgias->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $danhgias->previousPageUrl() }}">Previous</a>
                                </li>

                                @foreach ($danhgias->getUrlRange(1, $danhgias->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $danhgias->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                <li class="page-item {{ $danhgias->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $danhgias->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>
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
