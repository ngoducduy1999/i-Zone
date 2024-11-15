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
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">

<h2>Quản lý Vai trò và Quyền</h2>
</div><!-- end card header -->
<div class="card-header">
@if(session('error'))
    <div style="color: red;">{{ session('error') }}</div>
@endif
<!-- Form thêm vai trò -->
<form action="{{ route('admin.roles.store') }}" method="POST" class="row gy-2 gx-3 align-items-center">
    @csrf
    <div class="col-sm-5" >
    <label for="name" class="visually-hidden">Tên vai trò:</label>
    <input type="text" class="form-control" id="autoSizingInput" id="name" name="name" required placeholder="Tên vai trò mới..">
    </div>
    <div class="col-auto">
    <button type="submit" class="btn btn-primary">Thêm vai trò</button>
    </div><!-- end card header -->
</form>
</div><!-- end card header -->
<div class="card-body">
<table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
    <thead>
        <tr>
            <th>Tên vai trò</th>
            <th>Quyền</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
            <tr>
                <!-- Cột tên vai trò -->
                <td>
                    @if(strtolower($role->name) === 'admin')
                        {{ $role->name }} (Không thể sửa)
                    @else
                        {{ $role->name }}
                        <!-- SVG bút -->
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1" id="edit-role-{{ $role->id }}" style="cursor: pointer;">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                        </svg>
                
                        <!-- Form cập nhật vai trò (ẩn mặc định) -->
                        <form id="form-update-role-{{ $role->id }}" action="{{ route('admin.roles.update', $role->id) }}" method="POST" style="display: none; margin-top: 10px;">
                            @csrf
                            @method('PUT')
                            <div class="input-group input-group-sm mb-3">
                                <input type="text" name="name" value="{{ $role->name }}" class="form-control" aria-label="Sizing example input" required>
                                <button type="submit" class="btn btn-info btn-sm">Cập nhật</button>
                            </div>
                        </form>
                    @endif
                </td>                

                <!-- Cột danh sách quyền -->
                <td>
                    <form action="{{ route('admin.roles.assignPermissions', $role->id) }}" method="POST">
                        @csrf
                        <div style="display: flex; flex-wrap: wrap; gap: 5px;">
                            @foreach($permissions as $permission)
                                @if($permission->name === 'QL phan quyen' && strtolower($role->name) !== 'admin')
                                    @continue {{-- Bỏ qua quyền QL phan quyen nếu vai trò không phải admin --}}
                                @endif
                                <label style="display: flex; align-items: center;">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                        @if($role->hasPermissionTo($permission->name)) checked @endif
                                        onchange="this.form.submit();">
                                    {{ $permission->name }}
                                </label>
                            @endforeach
                        </div>
                    </form>
                </td>
                

                <!-- Cột hành động -->
                <td>
                    @if(strtolower($role->name) !== 'admin')
                        <!-- Nút xóa vai trò -->
                        <form action="{{ route('admin.roles.destroy', $role->id) }} " method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"onclick="return confirm('Bạn có chắc chắn muốn xóa vai trò này?')">Xóa</button>
                        </form>
                    @else
                        Không thể xóa vai trò admin.
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
<script>
    // Lắng nghe sự kiện click vào biểu tượng bút
    document.querySelectorAll('[id^="edit-role-"]').forEach(svg => {
        svg.addEventListener('click', function() {
            const roleId = this.id.replace('edit-role-', ''); // Lấy id của role
            const form = document.getElementById('form-update-role-' + roleId);

            // Hiển thị form
            form.style.display = form.style.display === 'none' ? 'inline-block' : 'none';
        });
    });

    // Lắng nghe sự kiện click bên ngoài để ẩn form (nếu muốn)
    document.addEventListener('click', function(event) {
        const forms = document.querySelectorAll('[id^="form-update-role-"]');
        const svgs = document.querySelectorAll('[id^="edit-role-"]');

        // Kiểm tra nếu click ngoài form và svg thì ẩn form
        forms.forEach(form => {
            if (!form.contains(event.target) && !event.target.matches('[id^="edit-role-"]')) {
                form.style.display = 'none';
            }
        });
    });
</script>

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
