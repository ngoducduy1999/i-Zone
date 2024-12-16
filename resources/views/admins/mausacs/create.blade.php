@extends('layouts.admin')

@section('title', 'Thêm Mới Màu Sắc')


@section('css')
@endsection

@section('content')

<div class="container">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Thêm Mới Màu Sắc</h4>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thêm Mới Màu Sắc</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{route('admin.mausacs.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- Tên Màu Sắc -->
                                <div class="mb-3">
                                    <label for="ten_mau_sac" class="form-label">Tên Màu Sắc</label>
                                    <input class="form-control" type="text" id="ten_mau_sac" name="ten_mau_sac"
                                        placeholder="Tên Màu" value="{{ old('ten_mau_sac') }}">
                                    @error('ten_mau_sac')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Mã Màu -->
                                <div class="mb-3">
                                    <label for="ma_mau" class="form-label">Mã Màu</label>
                                    <input class="form-control" type="text" id="ma_mau" name="ma_mau"
                                        placeholder="Mã Màu (VD: #FFFFFF)" value="{{ old('ma_mau') }}">
                                    @error('ma_mau')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Trạng thái - nếu cần --}}
                                {{-- 
                                <div class="mb-3">
                                    <label for="trang_thai" class="form-label">Trạng Thái</label>
                                    <select name="trang_thai" id="trang_thai" class="form-select">
                                        <option value="1">Hoạt động</option>
                                        <option value="0">Ngừng hoạt động</option>
                                    </select>
                                </div> 
                                --}}
                                
                                <!-- Nút Thêm Mới -->
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
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
