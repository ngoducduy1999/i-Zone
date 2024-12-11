@extends('layouts.admin') <!-- Kế thừa layout chính -->

@section('title', 'Thống Kê Doanh Thu')

@section('content')

<div class="container-xxl">
    <h1>Thống Kê Doanh Thu</h1>
    <form method="GET" action="{{ route('admin.doanhthu') }}">
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <label for="start_date" class="form-label">Từ ngày:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-3">
                <label for="end_date" class="form-label">Đến ngày:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
            <div class="col-md-3">
                <label for="group_by" class="form-label">Thống kê theo:</label>
                <select id="group_by" name="group_by" class="form-select">
                    <option value="day" {{ request('group_by') == 'day' ? 'selected' : '' }}>Ngày</option>
                    <option value="month" {{ request('group_by') == 'month' ? 'selected' : '' }}>Tháng</option>
                    <option value="year" {{ request('group_by') == 'year' ? 'selected' : '' }}>Năm</option>
                </select>
            </div>
            <!-- <div class="col-md-3">
                <label for="payment_status" class="form-label">Trạng thái thanh toán:</label>
                <select id="payment_status" name="payment_status" class="form-select">
                    <option value="">Tất cả</option>
                    <option value="success" {{ request('payment_status') == 'success' ? 'selected' : '' }}>Thành công</option>
                    <option value="pending" {{ request('payment_status') == 'pending' ? 'selected' : '' }}>Đang xử lý</option>
                    <option value="failed" {{ request('payment_status') == 'failed' ? 'selected' : '' }}>Thất bại</option>
                </select>
            </div> -->
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Lọc</button>
            </div>
        </div>
    </form>

    <div class="card shadow p-4">
        <h3 class="card-title">Doanh thu:
            <span class="text-success">{{ number_format($doanhThu ?? 0, 0, ',', '.') }} VND</span>
        </h3>
    </div>


    {{-- <!-- Nút xuất dữ liệu -->
    <!-- <div class="text-end mt-4">
        <a href="{{ route('admin.export_revenue', request()->all()) }}" class="btn btn-success">Xuất File Excel</a>
    </div> --> --}}

<div class="card shadow p-4 mt-5">
        <h3 class="card-title">Biểu đồ Doanh Thu</h3>
        <canvas id="revenueChart" class="mt-3"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dữ liệu doanh thu và ngày từ backend
    const labels = @json($labels ?? []);
    const data = @json($revenues ?? []);

    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh thu (VND)',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let value = context.raw || 0;
                            return `Doanh thu: ${value.toLocaleString()} VND`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString();
                        }
                    }
                }
            }
        }
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
