@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <style>
        .equal-td {
        width: 50%; /* Đặt chiều rộng cố định cho các ô */
        text-align: center; /* Căn giữa nội dung */
        vertical-align: middle; /* Canh giữa theo chiều dọc */
    }

    .equal-td .form-select {
        width: 75%; /* Đảm bảo select không vượt quá kích thước của TD */
        margin: 0 auto; /* Căn giữa select trong TD */
    }

    .equal-td .badge {
        display: inline-block; /* Đảm bảo kích thước badge không bị ảnh hưởng */
        margin: 0 auto;
    }

    .table th, .table td {
        white-space: nowrap; /* Ngăn việc xuống dòng trong các cột */
    }

    .table td, .table th {
        padding: 8px; /* Đảm bảo padding hợp lý */
    }
    </style>
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

                        <form action="{{ route('admin.hoadons.index') }}" method="GET" class="search-form" style="display: flex; justify-content: flex-end; align-items: center; gap: 10px;">
                            <!-- Mã đơn hàng -->
                            <div class="form-group" style="position: relative; width: 100%; max-width: 250px; padding-right: 20px">
                                <input 
                                    type="text" 
                                    name="ma_don_hang" 
                                    id="ma_don_hang" 
                                    class="form-input" 
                                    value="{{ request('ma_don_hang') }}" 
                                    placeholder="Tìm kiếm..." 
                                    style="padding: 6px 35px 6px 8px; width: 100%; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);"
                                >
                                <!-- Icon tìm kiếm bên trong input -->
                                <button 
                                    type="submit" 
                                    style="position: absolute; right: 25px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #555;"
                                >
                                    <i class="fas fa-search" style="font-size: 16px;"></i>
                                </button>
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


                            <table class="table table-bordered dt-responsive table-responsive nowrap">
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
                                                <td class="equal-td">
                                                    <form action="{{ route('admin.hoadons.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                
                                                        <select name="trang_thai" class="form-select w-100" onchange="this.form.submit()" required>
                                                            @foreach ($trangThaiHoaDon as $key => $value)
                                                                <!-- Nếu trạng thái là "6" hoặc "7", sẽ vô hiệu hóa tùy chọn này -->
                                                                <option value="{{ $key }}" 
                                                                    {{ $key == $item->trang_thai ? 'selected' : '' }} 
                                                                    @if($key == 6 || $key == 7) disabled @endif>
                                                                    {{ $value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </td>
                                                <td class="equal-td">
                                                    <form action="{{ route('admin.hoadons.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                
                                                        @if ($item->phuong_thuc_thanh_toan === 'Thanh toán khi nhận hàng')
                                                            <!-- Hiển thị select nếu phương thức thanh toán là "Thanh toán khi nhận hàng" -->
                                                                <select 
                                                                    name="trang_thai_thanh_toan" 
                                                                    class="form-select badge w-75 text-white p-2 bg-{{ $item->trang_thai_thanh_toan === 'Chưa thanh toán' ? 'danger' : ($item->trang_thai_thanh_toan === 'Đã thanh toán' ? 'success' : 'secondary') }} text-white"
                                                                    onchange="updateSelectBackground(this)"
                                                                    id="trang_thai_thanh_toan_{{ $item->id }}"
                                                                >
                                                                    <option value="Chưa thanh toán" {{ $item->trang_thai_thanh_toan === 'Chưa thanh toán' ? 'selected' : '' }}>
                                                                        Chưa thanh toán
                                                                    </option>
                                                                    <option value="Đã thanh toán" {{ $item->trang_thai_thanh_toan === 'Đã thanh toán' ? 'selected' : '' }}>
                                                                        Đã thanh toán
                                                                    </option>
                                                                    <option value="Thanh toán thất bại" {{ $item->trang_thai_thanh_toan === 'Thanh toán thất bại' ? 'selected' : '' }}>
                                                                        Thanh toán thất bại
                                                                    </option>
                                                                </select>
                                                            
                                                        @else
                                                            <!-- Nếu phương thức thanh toán không phải "Thanh toán khi nhận hàng", chỉ hiển thị trạng thái thanh toán bình thường -->
                                                            <span class=" w-75 
                                                                badge
                                                                @if ($item->trang_thai_thanh_toan === 'Chưa thanh toán') bg-danger
                                                                @elseif ($item->trang_thai_thanh_toan === 'Đã thanh toán') bg-success
                                                                @elseif ($item->trang_thai_thanh_toan === 'Thanh toán thất bại') bg-secondary
                                                                @endif
                                                                text-white p-2
                                                            ">
                                                                {{ $item->trang_thai_thanh_toan }}
                                                            </span>

                                                        @endif
                                                    </form>
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
                                                                    href="{{ route('admin.hoadons.show', $item->id) }}">Xem chi tiết
                                                                </a>
                                                                @if ($item->trang_thai != 6) {{-- Kiểm tra nếu trạng thái khác "Đơn hàng đã hủy" --}}
                                                                    <form action="{{ route('admin.hoadons.destroy', $item->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');"
                                                                        class="m-0">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item">Hủy đơn hàng</button>
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
                            <div class="mt-3">
                                {{ $listHoaDon->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection

@section('js')
    <script>
        function confirmSubmit(selectElement) {
            var form = selectElement.form;  
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;  
            var defaultValue = selectElement.getAttribute('data-default-value'); 
    
            // Hiển thị hộp thoại xác nhận khi thay đổi giá trị
            if (confirm('Bạn có chắc chắn thay đổi trạng thái thành "' + selectedOption + '" không?')) {
                form.submit();  
            } else {
                selectElement.value = defaultValue; 
            }
        }
    
        document.addEventListener('DOMContentLoaded', function () {
            const selects = document.querySelectorAll('.form-select');
            selects.forEach(function(selectElement) {
                selectElement.addEventListener('change', function() {
                    confirmSubmit(selectElement);  
                });
            });
        });

        function updateSelectBackground(selectElement) {
    const selectedValue = selectElement.value;
    const selectClassList = selectElement.classList;

    // Xóa các lớp màu hiện tại
    selectClassList.remove('bg-danger', 'bg-success', 'bg-secondary');

    // Thêm màu mới dựa trên giá trị được chọn
    if (selectedValue === 'Chưa thanh toán') {
        selectClassList.add('bg-danger');
    } else if (selectedValue === 'Đã thanh toán') {
        selectClassList.add('bg-success');
    } else if (selectedValue === 'Thanh toán thất bại') {
        selectClassList.add('bg-secondary');
    }
}
    </script>
    
@endsection
