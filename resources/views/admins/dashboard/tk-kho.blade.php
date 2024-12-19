@extends('layouts.admin')

@section('title', 'Thống Kê Tồn Kho Sản Phẩm')

@section('content')
<div class="container-xxl">
    <h1>Thống Kê Tồn Kho Sản Phẩm</h1>

    <!-- Bộ lọc -->
    <form method="GET" action="{{ route('admin.thongke.sanpham.kho') }}">
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="search" class="form-label">Tìm kiếm sản phẩm:</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Nhập tên sản phẩm..." value="{{ $search }}">
            </div>
            <div class="col-md-3">
                <label for="status" class="form-label">Trạng thái:</label>
                <select name="status" id="status" class="form-select">
                    <option value="">Tất cả</option>
                    <option value="in_stock" {{ $filterStatus == 'in_stock' ? 'selected' : '' }}>Còn hàng</option>
                    <option value="low_stock" {{ $filterStatus == 'low_stock' ? 'selected' : '' }}>Sắp hết</option>
                    <option value="out_of_stock" {{ $filterStatus == 'out_of_stock' ? 'selected' : '' }}>Hết hàng</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Lọc</button>
            </div>
        </div>
    </form>

    <!-- Biểu đồ -->
    <div class="card shadow p-4">
        <h3 class="card-title">Biểu đồ Trạng Thái Tồn Kho</h3>
        <canvas id="stockChart" class="mt-3"></canvas>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="card shadow p-4 mt-5">
        <h3 class="card-title">Chi Tiết Tồn Kho Theo Biến Thể</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Màu Sắc</th>
                    <th>Dung Lượng</th>
                    <th>Số Lượng Tồn Kho</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($variants as $key => $variant)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $variant->ten_san_pham }}</td>
                        <td>{{ $variant->ten_mau_sac }}</td>
                        <td>{{ $variant->ten_dung_luong }}</td>
                        <td>{{ $variant->so_luong }}</td>
                        <td>
                            @if($variant->so_luong == 0)
                                <span class="badge bg-danger">Hết hàng</span>
                            @elseif($variant->so_luong < 10)
                                <span class="badge bg-warning">Sắp hết</span>
                            @else
                                <span class="badge bg-success">Còn hàng</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Không tìm thấy biến thể nào</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('stockChart').getContext('2d');
        const data = {
            labels: ['Còn hàng', 'Sắp hết', 'Hết hàng'],
            datasets: [{
                label: 'Số lượng biến thể',
                data: [
                    {{ $inStockVariants->count() }},
                    {{ $lowStockVariants->count() }},
                    {{ $outOfStockVariants->count() }}
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(255, 99, 132, 0.6)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        };
        const options = {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Biểu đồ Trạng Thái Tồn Kho' }
            },
            scales: { y: { beginAtZero: true } }
        };
        new Chart(ctx, { type: 'bar', data, options });
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
