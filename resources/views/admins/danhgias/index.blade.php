@extends('layouts.admin')



@section('css')
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
<div class="content">
    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý đánh giá</h4>
            </div>
        </div>

        <div class="row">
            <!-- Striped Rows -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                    </div><!-- end card header -->

                    <form action="" method="GET"
                        style="max-width: 1000px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; display: flex; align-items: center; gap: 15px;">

                        <!-- Filter by product name -->
                        <div style="flex: 1; min-width: 200px;">
                            <label for="san_pham" style="display: block; font-weight: bold; margin-bottom: 5px;">Tên sản phẩm:</label>
                            <select name="san_pham" id="san_pham"
                                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Tất cả</option>
                                @foreach ($sanPhams as $sanPham)
                                <option value="{{ $sanPham->id }}" {{ request('san_pham') == $sanPham->id ? 'selected' : '' }}>
                                    {{ $sanPham->ten_san_pham }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filter by rating -->
                        <div style="flex: 1; min-width: 200px;">
                            <label for="diem_so" style="display: block; font-weight: bold; margin-bottom: 5px;">Điểm đánh giá:</label>
                            <select name="diem_so" id="diem_so"
                                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Tất cả</option>
                                <option value="1" {{ request('diem_so') == '1' ? 'selected' : '' }}>1 sao</option>
                                <option value="2" {{ request('diem_so') == '2' ? 'selected' : '' }}>2 sao</option>
                                <option value="3" {{ request('diem_so') == '3' ? 'selected' : '' }}>3 sao</option>
                                <option value="4" {{ request('diem_so') == '4' ? 'selected' : '' }}>4 sao</option>
                                <option value="5" {{ request('diem_so') == '5' ? 'selected' : '' }}>5 sao</option>
                            </select>
                        </div>

                        <!-- Filter by status -->
                        <div style="flex: 1; min-width: 200px;">
                            <label for="trang_thai" style="display: block; font-weight: bold; margin-bottom: 5px;">Trạng thái:</label>
                            <select name="trang_thai" id="trang_thai"
                                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Tất cả</option>
                                <option value="0" {{ request('trang_thai') == '0' ? 'selected' : '' }}>Chưa trả lời</option>
                                <option value="1" {{ request('trang_thai') == '1' ? 'selected' : '' }}>Đã trả lời</option>
                            </select>
                        </div>

                        <div class="mt-3">
                            <button type="submit"
                                style="padding: 10px; border: none; border-radius: 4px; background-color: #4CAF50; color: white; font-weight: bold; cursor: pointer;">Lọc</button>
                        </div>
                    </form>

                    <div class="card-body">
                        <div class="table-responsive">

                            {{-- Display success and error messages --}}
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif

                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif

                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên người đánh giá</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Điểm đánh giá</th>
                                        <th>Nhận xét</th>
                                        <th>Ngày đánh giá</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($danhGias as $index => $danhGia)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $danhGia->user->ten ?? 'N/A' }}</td>
                                        <td>{{ $danhGia->sanPham->ten_san_pham ?? 'N/A' }}</td>
                                        <td>{{ $danhGia->diem_so }}</td>
                                        <td>{{ $danhGia->nhan_xet }}</td>
                                        <td>{{ $danhGia->created_at->format('d-m-Y H:i') }}</td>
                                        <td>
                                            @if ($danhGia->replies->isEmpty())
                                            <span class="badge bg-warning">Chưa trả lời</span>
                                            @else
                                            <span class="badge bg-success">Đã trả lời</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Thao tác <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.Danhgias.show', $danhGia->id) }}">Xem
                                                        chi tiết
                                                    </a>
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

    </div> <!-- container-fluid -->
</div> <!-- content -->
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