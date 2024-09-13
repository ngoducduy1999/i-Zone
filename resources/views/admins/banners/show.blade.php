@extends('layouts.admin')
@section('title', 'Chi tiết banner')
@section('content')
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Chi tiết banner</h4>
            </div>

        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Chi tiết banner</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="ten_banner" class="form-label">Tên Banner</label>
                                        <input class="form-control" type="text" id="ten_banner" name="ten_banner"
                                            placeholder="Tên banner" value="{{ $banner->ten_banner }}" disabled>
                                        @error('ten_banner')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <a href="{{ route('admin.banners.index') }}" class="btn btn-dark">Quay lại</a>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="fs-15 mb-3">Banner</h6>
                                <img src="{{ asset($banner->anh_banner) }}" alt="{{ $banner->ten_banner }}" id="img" name="img"
                                    width="100%">
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
