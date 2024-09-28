@extends('layouts.admin')
@section('title', 'Thêm banner')
@section('content')
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Khuyến mãi</h4>
            </div>

        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Khuyến mãi</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.khuyen_mais.update', $KhuyenMai->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                    <label for="ma_khuyen_mai" class="form-label">Mã khuyến mãi</label>
                                    <input class="form-control" type="text" id="ma_khuyen_mai" name="ma_khuyen_mai"
                                        placeholder="Mã khuyến mãi" value="{{ $KhuyenMai-> ma_khuyen_mai }}">
                                    @error('ma_khuyen_mai')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phan_tram_khuyen_mai" class="form-label">Phần trăm khuyến mãi</label>
                                    <input class="form-control" type="number" id="phan_tram_khuyen_mai" name="phan_tram_khuyen_mai"
                                        placeholder="Phần trăm khuyến mãi" value="{{ $KhuyenMai-> phan_tram_khuyen_mai }}" min="1" max="99">
                                    @error('phan_tram_khuyen_mai')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                                    <input class="form-control" type="date" id="ngay_bat_dau" name="ngay_bat_dau"
                                        placeholder="Ngày bắt đầu" value="{{ $KhuyenMai-> ngay_bat_dau }}">
                                    @error('ngay_bat_dau')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
                                    <input class="form-control" type="date" id="ngay_ket_thuc" name="ngay_ket_thuc"
                                        placeholder="Ngày kết thúc" value="{{ $KhuyenMai-> ngay_ket_thuc }}">
                                    @error('ngay_ket_thuc')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                                    <a href="{{ route('admin.khuyen_mais.index') }}" class="btn btn-dark">Quay lại</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        var anh_banner = document.querySelector('#anh_banner');
        var img = document.querySelector('#img');
        anh_banner.addEventListener('change', function(e) {
            e.preventDefault();
            img.src = URL.createObjectURL(this.files[0]);
        })
    </script>
@endsection
