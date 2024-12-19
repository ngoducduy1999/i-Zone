@extends('layouts.admin')

@section('title', 'Thống Kê Sản Phẩm Bán Chạy')

@section('content')
<div class="container-xxl">
    <h1>Thống Kê Sản Phẩm Bán Chạy</h1>

    <!-- Bộ lọc -->
    <form method="GET" action="{{ route('admin.thongke.sanpham.banchay') }}">
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <label for="thoi_gian" class="form-label">Thời gian:</label>
                <select name="thoi_gian" id="thoi_gian" class="form-select">
                    <option value="day" {{ $thoiGian === 'day' ? 'selected' : '' }}>Hôm nay</option>
                    <option value="week" {{ $thoiGian === 'week' ? 'selected' : '' }}>Tuần này</option>
                    <option value="month" {{ $thoiGian === 'month' ? 'selected' : '' }}>Tháng này</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="danh_muc_id" class="form-label">Danh mục sản phẩm:</label>
                <select name="danh_muc_id" id="danh_muc_id" class="form-select">
                    <option value="">Tất cả</option>
                    @foreach ($danhmucs as $danhMuc)
                        <option value="{{ $danhMuc->id }}" {{ isset($danhMucId) && $danhMucId == $danhMuc->id ? 'selected' : '' }}>
                            {{ $danhMuc->ten_danh_muc }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Lọc</button>
            </div>
        </div>
    </form>

    <!-- Biểu đồ -->
    <div class="card shadow p-4">
        <h3 class="card-title">Biểu đồ Sản Phẩm Bán Chạy</h3>
        <canvas id="sanPhamBanChayChart" class="mt-3"></canvas>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="card shadow p-4 mt-5">
        <h3 class="card-title">Danh sách Sản Phẩm</h3>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const labels = {!! json_encode($sanPhamBanChay->pluck('ten_san_pham')) !!};
        const data = {!! json_encode($sanPhamBanChay->pluck('so_luong_ban')) !!};

        if (!labels.length || !data.length) {
            console.warn('Không có dữ liệu để hiển thị biểu đồ.');
            return;
        }

        const ctx = document.getElementById('sanPhamBanChayChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Số lượng bán',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    title: { display: true, text: 'Biểu đồ Sản Phẩm Bán Chạy' }
                },
                scales: { y: { beginAtZero: true } }
            }
        });
    });
</script>
<style>
    .container-xxl h1 {
        color: #007BFF;
        font-weight: bold;
    }
    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
    }
</style>
@endsection
