@extends('layouts.admin')

@section('css')

@endsection

@section('content')
    <!-- Bắt đầu trang -->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Bảng Điều Khiển</h4>
            </div>
        </div>
       
               
        <style>
.btn-group form {
    display: inline-block; /* Đảm bảo các form hiển thị cạnh nhau */
    margin-right: 10px; /* Khoảng cách giữa các nút */
}

.btn-group form:last-child {
    margin-right: 0; /* Xóa khoảng cách của form cuối cùng */
}

.btn-group .btn {
    border-radius: 50px; /* Rounded buttons */
    font-weight: bold;
    padding: 10px 20px;
}

.btn-group .btn.active {
    background: linear-gradient(135deg, #9ae6ff, #7b2cbf); /* Gradient background */
    color: #fff;
    border: none;
    box-shadow: 0 4px 6px rgba(123, 44, 191, 0.3); /* Hiệu ứng đổ bóng */
}

.btn-outline-primary {
    border-color: #7b2cbf;
    color: #7b2cbf;
    transition: all 0.3s ease-in-out; /* Hiệu ứng mượt */
}

.btn-outline-primary:hover {
    background-color: #7b2cbf;
    color: #fff;
    box-shadow: 0 4px 8px rgba(123, 44, 191, 0.3); /* Hiệu ứng đổ bóng */
    transform: translateY(-2px); /* Hiệu ứng nổi lên */
}


        </style>
                
        <!-- Bắt đầu hàng -->
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="row g-3">
                    <div class="btn-group" role="group" aria-label="Filter Buttons">
                        <form action="{{ route('admin.dashboard') }}" method="GET">
                            <input type="hidden" name="filter" value="today">
                            <button type="submit" 
                                class="btn btn-outline-primary {{ !request()->has('filter') || request('filter') == 'today' ? 'active' : '' }}">
                                HÔM NAY
                            </button>
                        </form>
                        
                    
                        <form action="{{ route('admin.dashboard') }}" method="GET">
                            <input type="hidden" name="filter" value="week">
                            <button type="submit" class="btn btn-outline-primary {{ request('filter') == 'week' ? 'active' : '' }}">TUẦN NÀY</button>
                        </form>
                    
                        <form action="{{ route('admin.dashboard') }}" method="GET">
                            <input type="hidden" name="filter" value="month">
                            <button type="submit" class="btn btn-outline-primary {{ request('filter') == 'month' ? 'active' : '' }}">THÁNG NÀY</button>
                        </form>
                    
                        <form action="{{ route('admin.dashboard') }}" method="GET">
                            <input type="hidden" name="filter" value="year">
                            <button type="submit" class="btn btn-outline-primary {{ request('filter') == 'year' ? 'active' : '' }}">NĂM NAY</button>
                        </form>
                    </div>
                    
               
                <div class="row g-3">
    
                    <!-- Tổng Doanh Thu -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="fs-14 mb-1">Doanh Thu </div>
                                </div>
    
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ number_format($tong_doanh_thu) }} <span class="text-success">VND</span></div>
                                    <div class="me-auto">
                                       {{--  @if ($phan_tram_doanh_thu > 0)
                                        <span class="text-primary d-inline-flex align-items-center">
                                            {{ $phan_tram_doanh_thu }}%
                                            <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                                        </span>
                                        @elseif ($phan_tram_doanh_thu < 0)
                                        <span class="text-danger d-inline-flex align-items-center">
                                            {{ $phan_tram_doanh_thu }}%
                                            <i data-feather="trending-down" class="ms-1" style="height: 22px; width: 22px;"></i>
                                        </span>
                                        @else
                                            <span class="d-inline-flex align-items-center">
                                                <i class="ms-1" style="height: 22px; width: 22px;">=</i>
                                            </span>
                                        @endif --}}
                                    </div>
                                </div>
{{--                                 <div id="website-visitors" class="apex-charts"></div>
 --}}                            </div>
                        </div>
                    </div>

                    <!-- Tổng Sản Phẩm -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="fs-14 mb-1">Tổng Sản Phẩm Bán Ra </div>
                                </div>
    
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-shopping-cart me-2 fs-22 text-primary"></i> <!-- Icon giỏ hàng -->
                                        <div class="fs-22 mb-0 fw-semibold text-black">{{ $tong_san_pham }}</div>
                                    </div>
                                                                        <div class="me-auto">
                                       {{--  <span class="text-danger d-inline-flex align-items-center">
                                            10%
                                            <i data-feather="trending-down" class="ms-1" style="height: 22px; width: 22px;"></i>
                                        </span> --}}
                                    </div>
                                </div>
{{--                                 <div id="conversion-visitors" class="apex-charts"></div>
 --}}                            </div>
                        </div>
                    </div>

                    <!-- Tổng Đơn Hàng -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="fs-14 mb-1 " >Tổng Đơn Hàng  </div>
                                </div>
    
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="d-flex align-items-center">
                                        <!-- Thêm icon vào trước số lượng -->
                                        <i class="fas fa-box fs-22  me-2 text-primary"></i> <!-- Icon đơn hàng -->
                                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ $tong_don_hang }}</div>
                                    </div>
                                    <div class="me-auto">
                                       {{--  @if ($phan_tram_don_hang > 0)
                                        <span class="text-success d-inline-flex align-items-center">
                                            {{ $phan_tram_don_hang }}%
                                            <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                                        </span>
                                        @elseif ($phan_tram_don_hang < 0)
                                        <span class="text-danger d-inline-flex align-items-center">
                                            {{ $phan_tram_don_hang }}%
                                            <i data-feather="trending-down" class="ms-1" style="height: 22px; width: 22px;"></i>
                                        </span>
                                        @else
                                            <span class="d-inline-flex align-items-center">
                                                <i class="ms-1" style="height: 22px; width: 22px;">=</i>
                                            </span>
                                        @endif --}}
                                    </div>
                                </div>
{{--                                 <div id="session-visitors" class="apex-charts"></div>
 --}}                            </div>
                        </div>
                    </div>

                    <!-- Tổng Số Người Dùng -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="fs-14 mb-1">Tổng Số Người Dùng Mới </div>
                                </div>
    
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-users fs-22 me-2 text-primary"></i>
                                        <div class="fs-22 mb-0 fw-semibold text-black">{{ $tong_nguoi_dung }}</div>
                                    </div>
                                    <div class="me-auto">
                                      {{--   @if ($phan_tram_nguoi_dung > 0)
                                        <span class="text-primary d-inline-flex align-items-center">
                                            {{ $phan_tram_nguoi_dung }}%
                                            <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                                        </span>
                                        @elseif ($phan_tram_nguoi_dung < 0)
                                        <span class="text-danger d-inline-flex align-items-center">
                                            {{ $phan_tram_nguoi_dung }}%
                                            <i data-feather="trending-down" class="ms-1" style="height: 22px; width: 22px;"></i>
                                        </span>
                                        @else
                                            <span class="d-inline-flex align-items-center">
                                                <i class="ms-1" style="height: 22px; width: 22px;">=</i>
                                            </span>
                                        @endif --}}
                                    </div>
                                </div>
{{--                                 <div id="active-users" class="apex-charts"></div>
 --}}                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Kết thúc doanh số -->
        </div>
        <div class="row g-3">
    
            <!-- Tổng Doanh Thu -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="fs-14 mb-1">Tổng Đơn Hàng Đang Chờ Xử Lý </div>
                        </div>

                        <div class="d-flex align-items-baseline mb-2">
                            <div class="d-flex align-items-center">
                                <!-- Thêm icon vào trước số lượng -->
                                <i class="fas fa-box fs-22 text-danger me-2"></i> <!-- Icon đơn hàng -->
                                <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ $tong_don_hang_chua_xu_ly }}</div>
                            </div>
                            <div class="me-auto">
                            </div>
                        </div>
{{--                         <div id="website-visitors" class="apex-charts"></div>
 --}}                    </div>
                </div>
            </div>

            <!-- Tổng Sản Phẩm -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="fs-14 mb-1">Tổng Đơn Hàng Đã Hoàn Thành </div>
                        </div>

                        <div class="d-flex align-items-baseline mb-2">
                            <div class="d-flex align-items-center">
                                <!-- Thêm icon vào trước số lượng -->
                                <i class="fas fa-box fs-22 text-success me-2"></i> <!-- Icon đơn hàng -->
                                <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ $tong_don_hang_da_xu_ly }}</div>
                            </div>
                            <div class="me-auto">
                            </div>
                        </div>
{{--                         <div id="website-visitors" class="apex-charts"></div>
 --}}                    </div>
                </div>
            </div>

           
        </div>

         <!-- Kết thúc hàng -->
    
         <!-- Bắt đầu Doanh số Hàng tháng -->
        <div class="row">
            {{-- <div class="col-md-6 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                <i data-feather="bar-chart" class="widgets-icons"></i>
                            </div>
                            <h5 class="card-title mb-0">Thống Kê Doanh Thu Theo Tháng</h5>
                        </div>
                    </div>
    
                    <div class="card-body">
                        <div id="monthly-sales" class="apex-charts"></div>
                    </div>
                </div>
            </div>  --}}
            <div class="col-md-6 col-xl-4">
                <div class="card-header">
                    <div class="card overflow-hidden">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Khuyến Mãi Và Mã Giảm Giá</h5>
                    </div>
        
                    <div class="card-body">
                        <div id="simple_pie_chart" class="apex-charts"></div> 
                    </div>
                </div>

                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                
                <div class="card overflow-hidden">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                <i data-feather="tablet" class="widgets-icons"></i>
                            </div>
                            <h5 class="card-title mb-0">Top 4 Sản Phẩm Bán Chạy Nhất </h5>
                        </div>
                    </div>
    
                    <div class="card-body">
                        <ul class="list-group custom-group">
                            @if($san_pham_ban_chay && $san_pham_ban_chay->count() > 0)
                                @foreach($san_pham_ban_chay as $san_pham)
                                <li class="list-group-item align-items-center d-flex justify-content-between">
                                    <div class="product-list">
                                        <img class="avatar-md p-1 rounded-circle bg-primary-subtle img-fluid me-3" src="{{ asset($san_pham->anh_san_pham) }}" alt="{{ asset($san_pham->anh_san_pham) }}">
                                        <div class="product-body align-self-center">
                                            <h6 class="m-0 fw-semibold">{{ $san_pham->ten_san_pham }}</h6>
                                            <p class="mb-0 mt-1 text-muted">{{ $san_pham->ten_danh_muc }}</p>
                                        </div>
                                    </div>
    
                                    <div class="product-price">
                                        <h6 class="m-0 fw-semibold text-end">{{ number_format($san_pham->tong_doanh_thu) }}₫</h6>
                                        <p class="mb-0 mt-1 text-muted">{{ $san_pham->tong_so_luong_ban}} Đã bán</p>
                                    </div>
                                </li>
                                @endforeach
                            @else
                                <p>Chưa có dữ liệu sản phẩm bán chạy.</p>
                            @endif
                        </ul>
                    </div>
                    
                </div>
                
            </div>
              <!-- Bar Charts -->
              <div class="col-md-6 col-xl-4">                        
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Đánh giá gần đây</h5>
                    </div>
        
                    <div class="card-body">

        <!-- Body -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>XẾP HẠNG</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $index => $review)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $review->sanPham->ten_san_pham }}</td>
                        <td>
                            <span style="color: #f4b400;">
                                @for ($i = 0; $i < $review->diem_so; $i++)
                                    ★
                                @endfor
                                @for ($i = 0; $i < 5 - $review->diem_so; $i++)
                                    ☆
                                @endfor
                            </span>
                        </td>
                        <td>
                            <a href="#detail{{ $index }}" data-bs-toggle="collapse" class="text-primary">
                                <strong>+</strong>
                            </a>
                        </td>
                    </tr>
                    <tr id="detail{{ $index }}" class="collapse">
                        <td colspan="4">
                            <p><strong>Nhận xét</strong> {{ $review->nhan_xet }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
                    </div>
                </div>  
            </div> 
        </div>
        
        <div class="row"> 
             <!-- Kết thúc Doanh số Hàng tháng -->
      {{--  <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thống Kê Sản Phẩm </h5>
                </div>
    
                <div class="card-body">
                    <div id="rotated_column_chart" class="apex-charts"></div>
                </div>
            </div>  
        </div> --}}
            <!-- Basic Bar Chart -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thống Kê Danh Mục</h5>
                    </div>

                    <div class="card-body">
                        <div id="basic_bar_chart" class="apex-charts"></div> 
                    </div>
                </div>  
            </div>
       
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Thống kê liên hệ</h5>
            </div>

            <div class="card-body" style="height: 453px">
                <div id="total_contact_chart" ></div> 
            </div>
            <input type="hidden" name="">
        </div>  
    </div>
    
           
    </div>
    <div class="row">

     <!-- Column with Rotated Labels Chart -->
     <!-- Simple Pie Charts -->
     <div class="col-lg-6">
 
    </div>




    
</div>
</div>

@endsection


@section('js')
    <!-- Widgets Init Js -->
    <script src="{{ asset('assets/admin/js/pages/analytics-dashboard.init.js') }}"></script>
     <!-- Apexcharts Init Js -->
     <script src="{{ asset('assets/admin/js/pages/apexcharts-bar.init.js') }}"></script>
     <!-- Boxplot Charts Init Js -->
     <script src="{{ asset('assets/admin/js/pages/apexcharts-pie.init.js') }}"></script>
     <!-- Apexcharts Init Js -->
     <script src="{{ asset('assets/admin/js/pages/apexcharts-column.init.js') }}"></script>
     <script src="{{ asset('assets/admin/js/pages/thongke-lienhe.init.js') }}"></script>
    
   <script>    


    window.doanhThuData = @json($doanh_thu_data); // Gán dữ liệu doanh thu theo tháng
    window.thangLabels = @json($thang_labels); // Gán nhãn tháng
    window.doanhThuNgayData = @json($doanhThuNgayData); // Gán dữ liệu doanh thu theo ngày
    window.ngayLabels = @json($ngayLabels); // Gán nhãn ngày
    window.nguoiDungNgayData = @json($nguoiDungNgayData); // Gán dữ liệu doanh thu theo ngày
    window.nguoiDungNgayLabels = @json($nguoiDungNgayLabels); // Gán nhãn ngày
    window.donNgayData = @json($donNgayData); // Gán dữ liệu đơn hàng theo ngày
    window.donNgayLabels = @json($donNgayLabels); // Gán nhãn ngày
    window.dataDanhMuc = @json($dataDanhMuc); // Gán dữ liệu danh mục
    window.labelsDanhMuc = @json($labelsDanhMuc); // số lượng sản phẩm trên mỗi danh mục
    window.dataKhuyenMai = @json($dataKhuyenMai); // Gán dữ liệu khuyến mãi còn hạn và hết hạn
    window.labelsKhuyenMai = @json($labelsKhuyenMai); // Gán 
    window.dataInStock = @json($dataInStock ); // Sản phẩm còn hàng
    window.dataLowStock = @json($dataLowStock); // Sản phẩm sắp hết hàng
    window.dataOutOfStock = @json($dataOutOfStock); // Sản phẩm hết hàng
    window.labelsSanPham = @json($labelsSanPham); // Gán
    window.contactData = {
                           totalResolved: {{ $totalResolved }},
                           totalPending: {{ $totalPending }}
                         };

</script>

@endsection
