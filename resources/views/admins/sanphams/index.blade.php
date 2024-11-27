@extends('layouts.admin')
@section('title', 'Danh sách sản phẩm')
@section('css')
    <!-- Include custom CSS if needed -->
    <link href="{{ asset('assets/admin/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Danh sách sản phẩm</h4>
            </div>

        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="mt-2">
                                <h5 class="card-title mb-0">Danh sách sản phẩm</h5>
                            </div>
                            <div>
                                <a href="{{ route('admin.sanphams.create') }}" class="btn btn-success">Thêm mới</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sanphams as $sanpham)
                                    <tr>
                                        <td style="max-width: 250px;">
                                            <ul style="list-style-type: none; margin: 0px; padding: 0px">
                                                <li
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                                                    ID: {{ $sanpham->id }}</li>
                                                <li
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                                                    Mã: {{ $sanpham->ma_san_pham }}</li>
                                                <li
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                                                    Tên: {{ $sanpham->ten_san_pham }}</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul style="list-style-type: none; margin: 0px; padding: 0px">

                                                <li
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                                                    {{ $sanpham->danhMuc ? $sanpham->danhMuc->ten_danh_muc : '' }}</li>
                                            </ul>
                                        </td>
                                        <td style="max-width: 200px; overflow: hidden; white-space: normal;">
                                            <ul style="list-style-type: none; margin: 0px; padding: 0px">
                                                <li
                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                                                    {{ $sanpham->created_at ? $sanpham->created_at->format('d-m-Y') : '' }}
                                                </li>
                                            </ul>
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
                                                                <button class="dropdown-item" href="#">Khôi
                                                                    phục</button>

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
@section('js')
    <!-- DataTables JS -->
    <script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js') }}"></script>

    <!-- DataTable Demo App JS -->
    <script src="{{ asset('assets/admin/js/pages/datatable.init.js') }}"></script>
@endsection
