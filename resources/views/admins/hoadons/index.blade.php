@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link href="{{ asset('assets/admin/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Quản lý danh sách đơn hàng</h4>
                </div>
            </div>

            <div class="row">
                <!-- Striped Rows -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title align-content-center mb-0">{{ $title }}</h5>
                        </div><!-- end card header -->

                        <form action="{{ route('admin.hoadons.index') }}" method="GET" style="max-width: 1000px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; display: flex; align-items: center; gap: 10px; flex-wrap: nowrap;">
                            <div style="flex: 1; min-width: 170px;">
                                <label for="ngay_bat_dau" style="display: block; font-weight: bold; margin-bottom: 5px;">Ngày bắt đầu:</label>
                                <input type="date" name="ngay_bat_dau" id="ngay_bat_dau" value="{{ request('ngay_bat_dau') }}" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        
                            <div style="flex: 1; min-width: 170px;">
                                <label for="ngay_ket_thuc" style="display: block; font-weight: bold; margin-bottom: 5px;">Ngày kết thúc:</label>
                                <input type="date" name="ngay_ket_thuc" id="ngay_ket_thuc" value="{{ request('ngay_ket_thuc') }}" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        
                            <div style="flex: 1; min-width: 180px;">
                                <label for="phuong_thuc_thanh_toan" style="display: block; font-weight: bold; margin-bottom: 5px;">Phương thức thanh toán:</label>
                                <select name="phuong_thuc_thanh_toan" id="phuong_thuc_thanh_toan" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">Tất cả</option>
                                    <option value="Thanh toán qua chuyển khoản ngân hàng" {{ request('phuong_thuc_thanh_toan') == 'Thanh toán qua chuyển khoản ngân hàng' ? 'selected' : '' }}>Thanh toán qua chuyển khoản ngân hàng</option>
                                    <option value="Thanh toán khi nhận hàng" {{ request('phuong_thuc_thanh_toan') == 'Thanh toán khi nhận hàng' ? 'selected' : '' }}>Thanh toán khi nhận hàng</option>
                                </select>
                            </div>
                        
                            <div style="flex: 1; min-width: 170px;">
                                <label for="trang_thai" style="display: block; font-weight: bold; margin-bottom: 5px;">Trạng thái đơn hàng:</label>
                                <select name="trang_thai" id="trang_thai" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">Tất cả</option>
                                    @foreach($trangThaiHoaDon as $key => $value)
                                        <option value="{{ $key }}" {{ request('trang_thai') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div style="flex: 1; min-width: 170px;">
                                <label for="trang_thai_thanh_toan" style="display: block; font-weight: bold; margin-bottom: 5px;">Trang thái thanh toán:</label>
                                <select name="trang_thai_thanh_toan" id="trang_thai_thanh_toan" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">Tất cả</option>
                                    <option value="Đã thanh toán" {{ request('trang_thai_thanh_toan') == 'Đã thanh toán' ? 'selected' : '' }}>Đã thanh toán</option>
                                    <option value="Thanh toán thất bại" {{ request('trang_thai_thanh_toan') == 'Thanh toán thất bại' ? 'selected' : '' }}>Thanh toán thất bại</option>
                                    <option value="Chưa thanh toán" {{ request('trang_thai_thanh_toan') == 'Chưa thanh toán' ? 'selected' : '' }}>Chưa thanh toán</option>
                                </select>
                            </div>
                        
                            <div class="mt-3">
                                <button type="submit"
                                    style="padding: 10px; border: none; border-radius: 4px; background-color: #4CAF50; color: white; font-weight: bold; cursor: pointer;">Lọc</button>
                            </div>
                            
                        </form>
                        
                                    
                    <div class="card-body">
                        <div class="table-responsive">

                                {{-- Hiển thị thông báo thành công --}}
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
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Trạng thái thanh toán</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listHoaDon as $item)
                                            <tr>
                                                <td>{{ $item->ma_hoa_don }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->ngay_dat_hang)->format('d-m-Y') }}</td>
                                                <td class="text-danger">{{ number_format($item->tong_tien, 0, '', '.') }}</td>
                                                <td>{{ $item->phuong_thuc_thanh_toan }}</td>
                                                <td>
                                                    <form action="{{ route('admin.hoadons.update', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="trang_thai" class="form-select w-75"
                                                            onchange="confirmSubmit(this)"
                                                            data-default-value="{{ $item->trang_thai }}">
                                                            @foreach ($trangThaiHoaDon as $key => $value)
                                                                <option value="{{ $key }}"
                                                                    {{ $key == $item->trang_thai ? 'selected' : '' }}
                                                                    {{ $key == $type_huy_don_hang ? 'disabled' : '' }}
                                                                    {{ $key == $type_da_nhan_hang ? 'disabled' : '' }}>
                                                                    {{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>{{ $item->trang_thai_thanh_toan }}</td>
                                                <td>
                                                    <div class="card-body">
                                                        <div class="btn-group">
                                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Thao tác<i
                                                                    class="mdi mdi-chevron-down"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.hoadons.show', $item->id) }}">Xem
                                                                    chi tiết
                                                                </a>
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
    <script>
        function confirmSubmit(selectElement) {
            var form = selectElement.form;
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');

            if (confirm('Bạn có chắc chắn thay đổi trạng thái đơn hàng thành "' + selectedOption + '" không?')) {
                form.submit();
            } else {
                selectElement.value = defaultValue
            }
        }
    </script>
@endsection
