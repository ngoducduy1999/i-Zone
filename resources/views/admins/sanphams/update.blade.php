@extends('layouts.admin')
@section('title', 'Cập nhập sản phẩm')
@section('content')
    <style>
        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .preview-item {
            position: relative;
            border: 1px solid #ccc;
            padding: 10px;
            width: auto;
            max-width: 200px;
        }

        .delete-button {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            background-color: #fff;
            border: none;
            color: red;
            font-weight: bold;
            padding: 0;
        }

        .delete-button:hover {
            color: darkred;
        }
    </style>
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Cập nhập sản phẩm</h4>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Cập nhập sản phẩm</h5>
                    </div><!-- end card header -->
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('admin.sanphams.update', $sanpham->id) }}" method="POST"
                            enctype="multipart/form-data" id="myForm">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="ma_san_pham" class="form-label">Mã sản phẩm</label>
                                        <input type="text" id="ma_san_pham" id="ma_san_pham" name="ma_san_pham"
                                            class="form-control" placeholder="Mã sản phẩm"
                                            value="{{ $sanpham->ma_san_pham }}" disabled>
                                        @error('ma_san_pham')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                                        <input type="text" id="ten_san_pham" id="ten_san_pham" name="ten_san_pham"
                                            class="form-control" placeholder="Tên sản phẩm"
                                            value=" {{ $sanpham->ten_san_pham }}">
                                        @error('ten_san_pham')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="danh_muc_id" class="form-label">Danh mục sản phẩm</label>
                                        <select class="form-select" id="danh_muc_id" name="danh_muc_id">
                                            <option disabled selected>-- Danh mục --</option>
                                            @foreach ($danhmucs as $danhmuc)
                                                <option value="{{ $danhmuc->id }}"
                                                    {{ $sanpham->danh_muc_id == $danhmuc->id ? 'selected' : '' }}>
                                                    {{ $danhmuc->ten_danh_muc }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('danh_muc_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-multiselect" class="form-label">Tags sản phẩm</label>
                                        <select id="example-multiselect" multiple class="form-control" id="tag_id"
                                            name="tag_id[]">
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    {{ $tagsanphams->contains('tag_id', $tag->id) ? 'selected' : '' }}>
                                                    {{ $tag->ten_tag }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="hidden" id="old_images" name="old_images">
                                        <input type="hidden" id="deleted_images" name="deleted_images">
                                        <label for="anh_san_pham" class="form-label">Ảnh sản phẩm</label>
                                        <input type="file" id="anh_san_pham" class="form-control" id="anh_san_pham"
                                            name="anh_san_pham">
                                        <img src="{{ asset($sanpham->anh_san_pham) }}" alt="" width="50px"
                                            id="img" class="py-1">
                                        @error('anh_san_pham')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Albums ảnh:</label>
                                        <input class="form-control" type="file" id="hinh_anh" name="hinh_anh[]"
                                            multiple>
                                        @error('hinh_anh.*')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="preview-container" id="preview">
                                            @foreach ($hinh_anhs as $hinh_anh)
                                                <div class="preview-item" data-id="{{ $hinh_anh->id }}"
                                                    data-src="{{ asset($hinh_anh->hinh_anh) }}">
                                                    <img src="{{ asset($hinh_anh->hinh_anh) }}" class="img-fluid"
                                                        style="max-height: 100px;" />
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm delete-button">X</button>
                                                </div>
                                            @endforeach
                                            @error('hinh_anh')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @error('hinh_anh.*')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit" style="margin-top: 10px">Sửa sản
                                        phẩm</button>
                                        <a href="{{ route('admin.sanphams.index') }}" class="btn btn-secondary" style="margin-top: 10px">Danh sách sản phẩm</a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Biến thể sản phẩm</h5>
                                    </div>
                                    <div class="mb-3">
                                        <div id="variants-container">
                                            @foreach ($bienthesanphams as $index => $bienthesanpham)
                                                <div class="variant" data-index="{{ $index }}">
                                                    <div class="row g-3">
                                                        <div class="col-md-2">
                                                            <label for="dung_luong_id-{{ $index }}"
                                                                class="form-label">Dung lượng:</label>
                                                            <select class="form-select"
                                                                id="dung_luong_id-{{ $index }}"name="dung_luong_id[]"
                                                                required>
                                                                <option disabled>Ram</option>
                                                                @foreach ($dungluongs as $dungluong)
                                                                    <option value="{{ $dungluong->id }}"
                                                                        {{ $bienthesanpham->dung_luong_id == $dungluong->id ? 'selected' : '' }}>
                                                                        {{ $dungluong->ten_dung_luong }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('dung_luong_id.' . $index)
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="mau_sac_id-{{ $index }}"
                                                                class="form-label">Màu sắc:</label>
                                                            <select class="form-select"
                                                                id="mau_sac_id-{{ $index }}" name="mau_sac_id[]"
                                                                required>
                                                                <option disabled>Color</option>
                                                                @foreach ($mausacs as $mausac)
                                                                    <option value="{{ $mausac->id }}"
                                                                        {{ $bienthesanpham->mau_sac_id == $mausac->id ? 'selected' : '' }}>
                                                                        {{ $mausac->ten_mau_sac }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('mau_sac_id.' . $index)
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="gia_cu-{{ $index }}"
                                                                class="form-label">Giá cũ:</label>
                                                            <input type="number" class="form-control"
                                                                id="gia_cu-{{ $index }}" name="gia_cu[]"
                                                                min="0" required
                                                                value="{{ $bienthesanpham->gia_cu }}">
                                                            @error('gia_cu.' . $index)
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="gia_moi-{{ $index }}"
                                                                class="form-label">Giá mới:</label>
                                                            <input type="number" class="form-control"
                                                                id="gia_moi-{{ $index }}" name="gia_moi[]"
                                                                min="0" required
                                                                value="{{ $bienthesanpham->gia_moi }}">
                                                            @error('gia_moi.' . $index)
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="so_luong-{{ $index }}"
                                                                class="form-label">Số lượng:</label>
                                                            <input type="number" class="form-control"
                                                                id="so_luong-{{ $index }}" name="so_luong[]"
                                                                min="0" required
                                                                value="{{ $bienthesanpham->so_luong }}">
                                                            @error('so_luong.' . $index)
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <input type="hidden" name="variant_id[]"
                                                            value="{{ $bienthesanpham->id }}">
                                                    </div>
                                                    <hr>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
                                        <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                        <textarea name="mo_ta" id="mo_ta" cols="30" rows="10">{{ $sanpham->mo_ta }}</textarea>
                                        @error('mo_ta')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('hinh_anh');
            const previewContainer = document.getElementById('preview');
            const oldImagesInput = document.getElementById('old_images');
            const deletedImagesInput = document.getElementById('deleted_images');
            let selectedFiles = [];
            let deletedImageIds = [];

            // Load existing images into selectedFiles
            const existingImages = Array.from(previewContainer.querySelectorAll('.preview-item'));
            existingImages.forEach(previewItem => {
                const img = previewItem.querySelector('img');
                const id = previewItem.dataset.id;
                selectedFiles.push({
                    src: img.src,
                    id: id
                });
            });

            function renderPreview() {
                previewContainer.innerHTML = '';

                selectedFiles.forEach(file => {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'preview-item';

                    if (file instanceof File) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'img-fluid';
                            img.style.maxHeight = '100px';
                            previewItem.appendChild(img);

                            const deleteButton = document.createElement('button');
                            deleteButton.className = 'btn btn-danger btn-sm delete-button';
                            deleteButton.textContent = 'X';
                            deleteButton.addEventListener('click', function() {
                                previewItem.remove();
                                selectedFiles = selectedFiles.filter(f => f !== file);
                                updateFileInput();
                            });
                            previewItem.appendChild(deleteButton);

                            previewContainer.appendChild(previewItem);
                        };

                        reader.readAsDataURL(file);
                    } else {
                        const img = document.createElement('img');
                        img.src = file.src;
                        img.className = 'img-fluid';
                        img.style.maxHeight = '100px';
                        previewItem.appendChild(img);

                        const deleteButton = document.createElement('button');
                        deleteButton.className = 'btn btn-danger btn-sm delete-button';
                        deleteButton.textContent = 'X';
                        deleteButton.addEventListener('click', function() {
                            previewItem.remove();
                            selectedFiles = selectedFiles.filter(f => f.src !== file.src);
                            deletedImageIds.push(file.id);
                            updateFileInput();
                            updateDeletedImagesInput();
                        });
                        previewItem.appendChild(deleteButton);

                        previewContainer.appendChild(previewItem);
                    }
                });

                oldImagesInput.value = selectedFiles.filter(f => typeof f === 'object' && f.src).map(f => f.src)
                    .join(',');
            }

            input.addEventListener('change', function() {
                const newFiles = Array.from(input.files);

                newFiles.forEach(file => {
                    if (!selectedFiles.some(existingFile => existingFile.src === URL
                            .createObjectURL(file))) {
                        selectedFiles.push(file);
                    }
                });

                renderPreview();
            });

            function updateFileInput() {
                const dataTransfer = new DataTransfer();
                selectedFiles.forEach(file => {
                    if (file instanceof File) {
                        dataTransfer.items.add(file);
                    }
                });
                input.files = dataTransfer.files;
            }

            function updateDeletedImagesInput() {
                deletedImagesInput.value = deletedImageIds.join(',');
            }

            renderPreview();
        });
    </script>
    <script>
        // 1 ảnh
        var anh_san_pham = document.querySelector('#anh_san_pham');
        var img = document.querySelector('#img');
        anh_san_pham.addEventListener('change', function(e) {
            e.preventDefault();
            img.src = URL.createObjectURL(this.files[0]);
        })
    </script>
    <script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>
    </script>
    <script>
        // mô tả
        CKEDITOR.replace('mo_ta');
    </script>
@endsection
