@extends('layouts.admin')
@section('title', 'Danh sách khuyến mãi')
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
            <h4 class="fs-18 fw-semibold m-0">Danh sách khuyến mãi</h4>
        </div>
        <div>
            <a href="{{ route('admin.khuyen_mais.create') }}" class="btn btn-success">Thêm mới</a>
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
                    <h5 class="card-title mb-0">Danh sách khuyến mãi</h5>
                </div><!-- end card header -->
                <form action="{{ route('admin.khuyen_mais.index') }}" method="GET" style="max-width: 1000px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; display: flex; align-items: center; gap: 10px; flex-wrap: nowrap;">

                    <!-- Ngày bắt đầu -->
                    <div style="flex: 1; min-width: 170px;">
                        <label for="ngay_bat_dau" style="display: block; font-weight: bold; margin-bottom: 5px;">Ngày bắt đầu:</label>
                        <input type="date" name="ngay_bat_dau" id="ngay_bat_dau" value="{{ request('ngay_bat_dau') }}" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <!-- Ngày kết thúc -->
                    <div style="flex: 1; min-width: 170px;">
                        <label for="ngay_ket_thuc" style="display: block; font-weight: bold; margin-bottom: 5px;">Ngày kết thúc:</label>
                        <input type="date" name="ngay_ket_thuc" id="ngay_ket_thuc" value="{{ request('ngay_ket_thuc') }}" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <!-- Nút tìm kiếm -->
                    <div class="mt-3">
                        <button type="submit" style="padding: 10px; border: none; border-radius: 4px; background-color: #4CAF50; color: white; font-weight: bold; cursor: pointer; width: 100%;">Lọc</button>
                    </div>
                </form>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã khuyến mãi</th>
                                <th>Phần trăm</th>
                                <th>Giảm tối đa</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($KhuyenMais as $khuyenmai)
                            <tr>
                                <td>{{ $khuyenmai->id }}</td>
                                <td>{{ $khuyenmai->ma_khuyen_mai }}</td>
                                <td>{{ $khuyenmai->phan_tram_khuyen_mai }}%</td>
                                <td>{{ number_format($khuyenmai->giam_toi_da, 0, '', '') }} VND</td>
                                <td>{{ $khuyenmai->ngay_bat_dau }}</td>
                                <td>{{ $khuyenmai->ngay_ket_thuc }}</td>
                                <td>
                                    @if ($khuyenmai->trang_thai == 1)
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
                                                <a class="dropdown-item" href="#">Xem</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.khuyen_mais.edit', $khuyenmai->id) }}">Sửa</a>
                                                @if ($khuyenmai->trang_thai == 1)
                                                <form action="{{ route('admin.khuyen_mais.onOffKhuyenMai', $khuyenmai->id) }}" method="post">
                                                    @csrf
                                                    @method('post')
                                                    <button class="dropdown-item" href="#">Ngừng hoạt động</button>
                                                </form>
                                                @else
                                                <form action="{{ route('admin.khuyen_mais.onOffKhuyenMai', $khuyenmai->id) }}" method="post">
                                                    @csrf
                                                    @method('post')
                                                    <button class="dropdown-item" href="#">Hoạt động</button>
                                                </form>
                                                @endif

                                                <form action="{{ route('admin.khuyen_mais.destroy', $khuyenmai->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này?');">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Xóa</button>
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