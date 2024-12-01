
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
                        <h5 class="card-title mb-0">Danh sách nhân viên</h5>
                        <!-- Nút thêm mới -->
                        <a href="{{ route('admin.nhanviens.create') }}" class="btn btn-success">Thêm mới</a>
                    </div><!-- end card header -->
    
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Ngày tạo</th>
                                <th>Tuổi</th>
                                <th>Chức vụ</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($staffs as $staff)
                                <tr>
                                    <td>{{ $staff->ten }}</td>
                                    <td>{{ $staff->email }}</td>
                                    <td>{{ $staff->so_dien_thoai }}</td>
                                    <td>{{ $staff->created_at->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($staff->ngay_sinh)->age }}</td>
                                    <td>{{ $staff->getRoleNames()->first() }}</td>

                                    <td>
                                        <!-- Nút sửa -->
    
                                        <!-- Nút xem chi tiết -->
                                        <a href="{{ route('admin.nhanviens.show', $staff->id) }}" class="btn btn-info btn-sm">Xem chi tiết</a>

                                        <!-- Nút xóa -->
                                        <form action="{{route('admin.nhanviens.destroy', $staff->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                                        </form>
    
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
    