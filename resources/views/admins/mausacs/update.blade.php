@extends('layouts.admin')

@section('title', 'Cập nhập màu sắc')


@section('css')

@endsection

@section('content')

<div class="container">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Cập Nhật Màu Sắc</h4>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Cập Nhật Màu Sắc</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{ route('admin.mausacs.update', $mausac->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Tên Màu Sắc -->
                                <div class="mb-3">
                                    <label for="ten_mau_sac" class="form-label">Tên Màu sắc</label>
                                    <input class="form-control" type="text" id="ten_mau_sac" name="ten_mau_sac"
                                        placeholder="Tên Màu" value="{{ $mausac->ten_mau_sac }}">
                                    @error('ten_mau_sac')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Mã Màu -->
                                <div class="mb-3">
                                    <label for="ma_mau" class="form-label">Mã Màu</label>
                                    <input class="form-control" type="color" id="ma_mau" name="ma_mau"
                                        placeholder="Mã Màu" value="{{ $mausac->ma_mau }}">
                                    @error('ma_mau')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Trạng Thái --}}
                                <div class="mb-3">
                                    <label for="trang_thai" class="form-label">Trạng Thái</label>
                                    <select class="form-control" name="trang_thai" id="trang_thai">
                                        <option value="1" {{ $mausac->trang_thai == '1' ? 'selected' : '' }}>Đang hoạt động</option>
                                        <option value="0" {{ $mausac->trang_thai == '0' ? 'selected' : '' }}>Ngừng hoạt động</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('js')

@endsection
