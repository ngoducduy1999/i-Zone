@extends('layouts.admin')

@section('title')

@endsection

@section('css')
   
@endsection

@section('content')
<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Danh mục</h4>
        </div>

    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Danh mục</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{ route('admin.danhmucs.update', $danhmucs->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="ten_danh_muc" class="form-label">Tên Danh Mục</label>
                                    <input class="form-control" type="text" id="ten_danh_muc" name="ten_danh_muc"
                                        placeholder="Tên banner" value="{{ $danhmucs->ten_danh_muc }}">
                                    @error('ten_danh_muc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="anh_danh_muc" class="form-label">Ảnh Danh Mục</label>
                                    <input class="form-control" type="file" id="anh_danh_muc" name="anh_danh_muc">
                                    @error('anh_danh_muc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                                <a href="{{ route('admin.banners.index') }}" class="btn btn-dark">Quay lại</a>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="fs-15 mb-3">Ảnh</h6>
                            <img src="{{ asset($danhmucs->anh_danh_muc) }}" alt="{{ $danhmucs->ten_danh_muc }}" id="img" name="img"
                                width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    var anh_danh_muc = document.querySelector('#anh_danh_muc');
    var img = document.querySelector('#img');
    anh_danh_muc.addEventListener('change', function(e) {
        e.preventDefault();
        img.src = URL.createObjectURL(this.files[0]);
    })
</script>
@endsection

@section('js')
   
@endsection