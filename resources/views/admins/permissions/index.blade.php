@extends('layouts.admin')

@section('css')
    <!-- Include custom CSS if needed -->
    <link href="{{ asset('assets/admin/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Datatables -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                
    
                <div class="card-header">
                    <h2 class="card-title mb-0">Danh sách Quyền</h2>
                </div><!-- end card header -->
                <div class="card-header">
                    <!-- Form tạo quyền mới -->
                    <form action="{{ route('admin.permissions.store') }}" method="POST" class="row gy-2 gx-3 align-items-center">
                        @csrf
                        <div class="col-sm-5">
                            <label for="name" class="visually-hidden">Tên quyền mới:</label>
                            <input type="text" class="form-control" id="autoSizingInput" name="name" required placeholder="Tên quyền mới..">
                        </div><!-- end card header -->
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Tạo quyền</button>
                        </div><!-- end card header -->
                    </form>
                </div><!-- end card header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Tên quyền</th>
                                <th>Sửa</th>
                                <th>Cập nhật</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            @if($permission->name !== 'QL phan quyen')
                                                <input type="text" name="name" value="{{ $permission->name }}" required>
                                            @else
                                                <span>{{ $permission->name }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($permission->name !== 'QL phan quyen')
                                                <button type="submit" class="btn btn-info btn-sm">Cập nhật</button>
                                            @else
                                                <button type="button" class="btn btn-info btn-sm" disabled>Không thể cập nhật</button>
                                            @endif
                                        </td>
                                    </form>
                                    <td>
                                        @if($permission->name !== 'QL phan quyen')
                                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa quyền này?')">Xóa</button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-danger btn-sm" disabled>Không thể xóa</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
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
