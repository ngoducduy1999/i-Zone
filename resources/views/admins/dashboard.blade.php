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
    
        <!-- Bắt đầu hàng -->
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="row g-3">
    
                    <!-- Tổng Doanh Thu -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="fs-14 mb-1">Tổng Doanh Thu</div>
                                </div>
    
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ number_format($tong_doanh_thu) }} VND</div>
                                    <div class="me-auto">
                                        @if ($phan_tram_doanh_thu > 0)
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
                                        @endif
                                    </div>
                                </div>
                                <div id="website-visitors" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Tổng Sản Phẩm -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="fs-14 mb-1">Tổng Sản Phẩm</div>
                                </div>
    
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ $tong_san_pham }}</div>
                                    <div class="me-auto">
                                        <span class="text-danger d-inline-flex align-items-center">
                                            10%
                                            <i data-feather="trending-down" class="ms-1" style="height: 22px; width: 22px;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div id="conversion-visitors" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Tổng Đơn Hàng -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="fs-14 mb-1">Tổng Đơn Hàng</div>
                                </div>
    
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ $tong_don_hang }}</div>
                                    <div class="me-auto">
                                        @if ($phan_tram_don_hang > 0)
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
                                        @endif
                                    </div>
                                </div>
                                <div id="session-visitors" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Tổng Số Người Dùng -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="fs-14 mb-1">Tổng Số Người Dùng</div>
                                </div>
    
                                <div class="d-flex align-items-baseline mb-2">
                                    <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ $tong_nguoi_dung }}</div>
                                    <div class="me-auto">
                                        @if ($phan_tram_nguoi_dung > 0)
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
                                        @endif
                                    </div>
                                </div>
                                <div id="active-users" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Kết thúc doanh số -->
        </div> <!-- Kết thúc hàng -->
    
        <!-- Bắt đầu Doanh số Hàng tháng -->
        <div class="row">
            <div class="col-md-6 col-xl-8">
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
            </div>
    
            <div class="col-md-6 col-xl-4">
                <div class="card overflow-hidden">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                <i data-feather="tablet" class="widgets-icons"></i>
                            </div>
                            <h5 class="card-title mb-0">Sản Phẩm Bán Chạy Nhất</h5>
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
              
        </div>
        <div class="row">
             <!-- Kết thúc Doanh số Hàng tháng -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thống Kê Sản Phẩm </h5>
                </div>
    
                <div class="card-body">
                    <div id="rotated_column_chart" class="apex-charts"></div>
                </div>
            </div>  
        </div>
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
       
           
    </div>
    <div class="row">

     <!-- Column with Rotated Labels Chart -->
     <!-- Simple Pie Charts -->
     <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Khuyến Mãi Và Mã Giảm Giá</h5>
            </div>

            <div class="card-body">
                <div id="simple_pie_chart" class="apex-charts"></div> 
            </div>
        </div>  
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
      
   <script>
    window.doanhThuData = @json($doanh_thu_data); // Gán dữ liệu doanh thu theo tháng
    window.thangLabels = @json($thang_labels); // Gán nhãn tháng
    window.doanhThuNgayData = @json($doanhThuNgayData); // Gán dữ liệu doanh thu theo ngày
    window.ngayLabels = @json($ngayLabels); // Gán nhãn ngày
    window.nguoiDungNgayData = @json($nguoiDungNgayData); // Gán dữ liệu người dùng theo ngày
    window.nguoiDungNgayLabels = @json($nguoiDungNgayLabels); // Gán nhãn ngày
    window.donNgayData = @json($donNgayData); // Gán dữ liệu đơn hàng theo ngày
    window.donNgayLabels = @json($donNgayLabels); // Gán nhãn ngày
    window.dataDanhMuc = @json($dataDanhMuc); // Gán dữ liệu danh mục
    window.labelsDanhMuc = @json($labelsDanhMuc); // số lượng sản phẩm trên mỗi danh mục
    window.dataKhuyenMai = @json($dataKhuyenMai); // Gán dữ liệu khuyến mãi còn hạn và hết hạn
    window.labelsKhuyenMai = @json($labelsKhuyenMai); // Gán 
    window.dataInStock = @json($dataInStock ); // Sản phẩm còn hàng
    window.dataLowStock = @json($dataLowStock); // Sản phẩm sắp hết hàng
</script>

@endsection
