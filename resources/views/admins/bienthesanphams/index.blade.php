@extends('layouts.admin')
@section('title', 'Thêm mới sản phẩm')
@section('content')

    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Biến thể sản phẩm</h4>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Danh sách biến thể sản phẩm</h5>
                    </div><!-- end card header -->
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif
                    <div class="card-body">
                        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Dung lượng</th>
                                    <th>Màu sắc</th>
                                    <th>Giã cũ</th>
                                    <th>Giá mới</th>
                                    <th>Số lượng</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bienthes as $bienthe)
                                    <tr>
                                        <td>{{ $bienthe->id }}</td>
                                        <td>{{ $bienthe->dungLuong->ten_dung_luong }}</td>
                                        <td>{{ $bienthe->mauSac->ten_mau_sac }}</td>
                                        <td>{{ number_format($bienthe->gia_cu, 0, ',', '.') }}đ</td>
                                        <td>{{ number_format($bienthe->gia_moi, 0, ',', '.') }}đ</td>
                                        <td>{{ $bienthe->so_luong }}</td>
                                        <td>
                                            @if ($bienthe->deleted_at == null)
                                                <span class="badge badge-success bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge badge-danger bg-danger">Ngừng hoạt động</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bienthe->deleted_at == null)
                                                <form action="{{ route('admin.bienthesanphams.destroy', $bienthe->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.bienthesanphams.restore', $bienthe->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('post')
                                                    <button type="submit" class="btn btn-success">Khôi phục</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('admin.sanphams.edit', $bienthe->san_pham_id) }}" class="btn btn-warning">Sửa sản phẩm</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
