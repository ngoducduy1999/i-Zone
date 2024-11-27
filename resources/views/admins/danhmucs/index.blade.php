@extends('layouts.admin')

@section('title')
Danh sách danh mục
@endsection

@section('css')
<link href="{{ asset('assets/admin/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Danh sách danh mục</h4>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif

    <!-- Datatables -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Danh sách danh mục</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Ảnh</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($danhmucs as $danh_muc)
                                <tr>
                                    <td>{{ $danh_muc->id }}</td>
                                    <td>{{ $danh_muc->ten_danh_muc }}</td>
                                    <td>
                                        <img src="{{ asset($danh_muc->anh_danh_muc) }}" alt="{{ $danh_muc->ten_danh_muc }}" width="80px" height="70px">
                                    </td>
                                    <td>
                                        @if($danh_muc->trashed())
                                            <span class="text-danger">Không hoạt động</span>
                                        @else
                                            <span class="text-success">Đang hoạt động</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Thao tác <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <!-- Xem -->
                                                <a class="dropdown-item" href="{{ route('admin.danhmucs.show', $danh_muc->id) }}">Xem</a>

                                                <!-- Sửa -->
                                                <a class="dropdown-item" href="{{ route('admin.danhmucs.edit', $danh_muc->id) }}">Sửa</a>

                                                @if($danh_muc->trashed())
                                                    <!-- Khôi phục -->
                                                    <form action="{{ route('admin.danhmucs.restore', $danh_muc->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item">Khôi phục</button>
                                                    </form>
                                                @else
                                                    <!-- Xóa mềm -->
                                                    <form action="{{ route('admin.danhmucs.softDelete', $danh_muc->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">Xóa</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end container -->
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
