@extends('layouts.admin')
@section('title', 'Sửa banner')
@section('content')
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Banner</h4>
            </div>

        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Banner</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('admin.banners.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    @foreach ($banners as $banner)
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="ten_banner_{{ $banner->id }}" class="form-label">Tên
                                                        Banner</label>
                                                    <input class="form-control" type="text"
                                                        id="ten_banner_{{ $banner->id }}"
                                                        name="ten_banner[{{ $banner->id }}]" placeholder="Tên banner"
                                                        value="{{ $banner->ten_banner }}">
                                                    @error('ten_banner.*' . $banner->id)
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    @error('ten_banner' . $banner->id)
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="url_lien_ket{{ $banner->id }}" class="form-label">Sản phẩm liên
                                                        kết:</label>
                                                    <select class="form-select" id="url_lien_ket_{{ $banner->id }}"
                                                        name="url_lien_ket[{{ $banner->id }}]" required>
                                                        <option value="" disabled selected>Chọn sản phẩm</option>
                                                        @foreach ($sanphams as $sanpham)
                                                            <?php $url = route('chitietsanpham', $sanpham->id); ?>
                                                            <option value="{{ $url }}"
                                                                {{ $banner->url_lien_ket == $url ? 'selected' : '' }}>
                                                                {{ $sanpham->ten_san_pham }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('url_lien_ket.*' . $banner->id)
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="anh_banner_{{ $banner->id }}"
                                                        class="form-label">Banner</label>
                                                    <input class="form-control anh_banner" type="file"
                                                        id="anh_banner_{{ $banner->id }}"
                                                        name="anh_banner[{{ $banner->id }}]"
                                                        onchange="previewImage(event, {{ $banner->id }})">
                                                    <img id="img_{{ $banner->id }}"
                                                        src="{{ asset('storage/' . $banner->anh_banner) }}" alt=""
                                                        width="100px" class="my-1">
                                                    @error('anh_banner.' . $banner->id)
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                                    <a href="{{ route('admin.banners.show', $banners->first()->vi_tri) }}"
                                        class="btn btn-dark">Quay lại</a>
                                        <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Danh sách banner</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        var anh_banners = document.querySelectorAll('.anh_banner');
        anh_banners.forEach(function(element) {
            element.addEventListener('change', function(e) {
                // Lấy ID của banner từ phần tử input
                var bannerId = element.id.split('_')[2]; // Lấy phần id sau dấu "_"

                // Lấy phần tử img tương ứng
                var img = document.querySelector('#img_' + bannerId);

                // Chỉnh sửa src của img với ảnh mới
                e.preventDefault();
                img.src = URL.createObjectURL(this.files[0]);
            });
        });
    </script>
@endsection
