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
                                    <img src="{{ asset($sanpham->anh_san_pham) }}" alt="" width="100%"
                                        id="img" class="py-1 rounded-4">
                                </div>
                                <div class="mb-3">
                                    <label for="hinh_anh" class="form-label">Album ảnh:</label><br>
                                    @foreach ($anhsanphams as $anhsanpham)
                                        <img src="{{ asset($anhsanpham->hinh_anh) }}" alt="" width="50px"
                                            id="img" class="py-1 rounded-3">
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
                                <div class="mb-3">
                                    <label for="ma_san_pham" class="form-label">Mã sản phẩm:</label>
                                    <span class="text-black">{{ $sanpham->ma_san_pham }}</span><br>
                                    <label for="ten_san_pham" class="form-label">Tên sản phẩm:</label>
                                    <span class="text-black">{{ $sanpham->ten_san_pham }}</span><br>
                                    <label for="danh_muc_id" class="form-label">Danh mục sản phẩm:</label>
                                    <span class="text-black">
                                        {{ $sanpham->danhMuc ? $sanpham->danhMuc->ten_danh_muc : '' }}
                                    </span><br>
                                    <label for="example-multiselect" class="form-label">Tags sản phẩm:</label>
                                    <span class="text-primary">
                                        @foreach ($tagsanphams as $tag)
                                            #{{ $tag->tag->ten_tag }}
                                        @endforeach
                                    </span><br>
                                    <h5 class="card-title mb-0">Biến thể sản phẩm:</h5>
                                    <div id="variants-container">
                                        <div class="variant px-2 py-2" data-index="0">
                                            <div class="row g-3">
                                                <table id="datatable-buttons"
                                                    class="table table-striped table-bordered dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Dung lượng</th>
                                                            <th>Màu sắc</th>
                                                            <th>Giá</th>
                                                            <th>Số lượng sản phẩm</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($bienthesanphams as $bienthesanpham)
                                                            <tr>
                                                                <td>{{ $bienthesanpham->id }}</td>
                                                                <td>{{ $bienthesanpham->dungLuong->ten_dung_luong }}</td>
                                                                <td>{{ $bienthesanpham->mauSac->ten_mau_sac }}</td>
                                                                <td>
                                                                    <span>
                                                                        <del class="text-danger">
                                                                            {{ number_format($bienthesanpham->gia_cu, 0, ',', '.') }}đ
                                                                        </del>
                                                                    </span>
                                                                    <span>-{{ number_format($bienthesanpham->gia_moi, 0, ',', '.') }}đ;</span>
                                                                </td>
                                                                <td>
                                                                    <span class="px-1">
                                                                        {{ number_format($bienthesanpham->so_luong, 0, ',', '.') }}
                                                                    </span>
                                                                </td>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="card-title mb-0">Mô tả sản phẩm:</h5>

                                    <div class="text-black">
                                        <p>
                                            {!! $sanpham->mo_ta !!}
                                        </p>
                                    </div>
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
                                    <img src="{{ asset('storage/' . $danhgia->user->anh_dai_dien) }}" alt=""
                                        height="32" width="32" class="avatar-sm rounded-pill"
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
@endsection
