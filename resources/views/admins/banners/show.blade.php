@extends('layouts.admin')
@section('title', 'Xem banner')
@section('content')
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Chi tiết các banner tại vị trí </h4>
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
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary my-1"
                            style="margin-top: 10px">Danh sách banner</a>
                        <a class="btn btn-success my-1"
                            href="{{ count($banners) > 0 ? route('admin.banners.edit', ['vi_tri' => $banners->first()->vi_tri]) : '#' }}">Sửa</a>
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Banner</th>
                                    <th>Banner</th>
                                    <th>Sản phẩm liên kết</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                    <tr>
                                        <td>{{ $banner->id }}</td>
                                        <td
                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                            {{ $banner->ten_banner }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $banner->anh_banner) }}"
                                                alt="{{ $banner->ten_banner }}" width="100px">
                                        </td>
                                        <td style="max-width: 200px;">
                                            <?php
                                            $segments = explode('/', $banner->url_lien_ket);
                                            $id = end($segments);
                                            ?>
                                            @foreach ($sanphams as $sanpham)
                                                @if ($sanpham->id == $id)
                                                    <a class="dropdown-item" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;"
                                                        href="{{ route('admin.sanphams.show', $sanpham->id) }}">{{ $sanpham->ten_san_pham }}</a>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($banner->trang_thai == 1)
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
                                                        {{-- <a class="dropdown-item" href="{{ route('admin.banners.edit', $banner->id) }}">Sửa</a> --}}
                                                        @if ($banner->trang_thai == 1)
                                                            <form
                                                                action="{{ route('admin.banners.onOffBanner', $banner->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('post')
                                                                <button class="dropdown-item" href="#">Ngừng hoạt
                                                                    động</button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('admin.banners.onOffBanner', $banner->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('post')
                                                                <button class="dropdown-item" href="#">Hoạt
                                                                    động</button>
                                                            </form>
                                                        @endif
                                                        <form action="{{ route('admin.banners.destroy', $banner->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="dropdown-item"
                                                                onclick="return confirm('Xóa banner?')">Xóa</button>
                                                        </form>
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
