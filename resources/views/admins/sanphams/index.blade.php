@extends('layouts.admin')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Danh sách banner</h4>
            </div>

        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        <!-- Datatables  -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Danh sách banner</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 20%">Sản phẩm</th>
                                    <th>Biến thể</th>
                                    <th>Tags</th>
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sanphams as $sanpham)
                                    <tr>
                                        <td>{{ $sanpham->id }}</td>
                                        <td>
                                            <ul>
                                                <li>Mã sản phẩm: {{ $sanpham->ma_san_pham }}</li>
                                                <li>Tên sản phẩm: {{ $sanpham->ten_san_pham }}</li>
                                                <li>Danh mục: {{ $sanpham->danhMuc->ten_danh_muc }}</li>
                                                <li>Ảnh : <br> <img src="{{ asset($sanpham->anh_san_pham) }}"
                                                        alt="{{ $sanpham->ten_san_pham }}" width="50px"></li>
                                                <li>Ngày tạo: {{ $sanpham->created_at->format('d-m-Y') }}</li>
                                            </ul>
                                        </td>
                                        <td>
                                            @foreach ($bienthesanphams as $bienthe)
                                                @if ($sanpham->id == $bienthe->san_pham_id)
                                                    <ul>
                                                        <li>{{ $bienthe->dungLuong->ten_dung_luong }}-{{ $bienthe->mauSac->ten_mau_sac }}
                                                        </li>
                                                        <li>Số lượng: {{ $bienthe->so_luong }}</li>
                                                        <li>
                                                            <del class="text-danger">
                                                                {{ number_format($bienthe->gia_cu, 0, ',', '.') }}đ 
                                                            </del>
                                                            - {{ number_format($bienthe->gia_moi, 0, ',', '.') }}đ
                                                        </li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($tagsanphams as $tagsanpham)
                                                @if ($sanpham->id == $tagsanpham->san_pham_id)
                                                    <ul>
                                                        <li>{{ $tagsanpham->tag->ten_tag }}</li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>

                                            @foreach ($anhsanphams as $anhsanpham)
                                                @if ($sanpham->id == $anhsanpham->san_pham_id)
                                                    <img src="{{ asset($anhsanpham->hinh_anh) }}"
                                                        alt="{{ $anhsanpham->san_pham_id }}" width="50px">
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($sanpham->deleted_at == null)
                                                <span class="badge badge-success bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge badge-danger bg-danger">Ngừng hoạt động</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="card-body">
                                                <div class="btn-group">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Thao tác<i
                                                            class="mdi mdi-chevron-down"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.sanphams.show', $sanpham->id) }}">Xem</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.sanphams.edit', $sanpham->id) }}">Sửa</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.bienthesanphams.index', $sanpham->id) }}">Danh
                                                            sách biến thể</a>
                                                        @if ($sanpham->deleted_at == null)
                                                            <form
                                                                action="{{ route('admin.sanphams.destroy', $sanpham->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="dropdown-item" href="#">Xóa</button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('admin.sanphams.restore', $sanpham->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('post')
                                                                <button class="dropdown-item" href="#">Khôi phục</button>

                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
