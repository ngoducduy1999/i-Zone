@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Thống Kê Sản Phẩm Bán Chạy</h1>

    <!-- Bộ lọc -->
    <form method="GET" action="{{ route('admin.thongke.sanpham.banchay') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="thoi_gian">Thời gian:</label>
                <select name="thoi_gian" id="thoi_gian" class="form-control">
                    <option value="day" {{ $thoiGian === 'day' ? 'selected' : '' }}>Hôm nay</option>
                    <option value="week" {{ $thoiGian === 'week' ? 'selected' : '' }}>Tuần này</option>
                    <option value="month" {{ $thoiGian === 'month' ? 'selected' : '' }}>Tháng này</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="danh_muc_id">Danh mục sản phẩm:</label>
                <select name="danh_muc_id" id="danh_muc_id" class="form-control">
                    <option value="">Tất cả</option>
                    @foreach ($danhmucs as $danhMuc)
                        <option value="{{ $danhMuc->id }}" {{ isset($danhMucId) && $danhMucId == $danhMuc->id ? 'selected' : '' }}>
                            {{ $danhMuc->ten_danh_muc }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Lọc</button>
            </div>
        </div>
    </form>

    <!-- Biểu đồ -->
    <div class="my-4">
        <canvas id="sanPhamBanChayChart" width="400" height="200"></canvas>
    </div>

    <!-- Bảng dữ liệu -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên Sản Phẩm</th>
                <th>Danh Mục</th>
                <th>Số Lượng Bán</th>
                <th>Tổng Tiền</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sanPhamBanChay as $key => $sanPham)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $sanPham->ten_san_pham }}</td>
                    <td>{{ $sanPham->danh_muc }}</td>
                    <td>{{ $sanPham->so_luong_ban }}</td>
                    <td>{{ number_format($sanPham->tong_tien, 0, ',', '.') }} VND</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Không có dữ liệu</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Lấy dữ liệu từ Blade
        const labels = {!! json_encode($sanPhamBanChay->pluck('ten_san_pham')) !!};
        const data = {!! json_encode($sanPhamBanChay->pluck('so_luong_ban')) !!};

        // Kiểm tra nếu không có dữ liệu
        if (!labels.length || !data.length) {
            console.warn('Không có dữ liệu để hiển thị biểu đồ.');
            return;
        }

        // Khởi tạo biểu đồ
        const ctx = document.getElementById('sanPhamBanChayChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels, // Tên sản phẩm
                datasets: [{
                    label: 'Số lượng bán',
                    data: data, // Số lượng bán
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Biểu đồ Sản Phẩm Bán Chạy'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection

@section('scripts')



@endsection
