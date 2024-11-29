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
                                            class="form-control" placeholder="Mã sản phẩm" style="text-transform: capitalize;"
                                            value="{{ $sanpham->ten_san_pham }}">
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
                                        @error('hinh_anh')
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
                                    <a href="{{ route('admin.sanphams.index') }}" class="btn btn-secondary"
                                        style="margin-top: 10px">Danh sách sản phẩm</a>
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
                                                        <div class="col-md-2">
                                                            <div class="form-check form-switch mb-2">
                                                                <input type="hidden"
                                                                    name="trangthai[{{ $index }}]" value="0">
                                                                <!-- Input hidden -->
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="trangthai[{{ $index }}]" value="1"
                                                                    @if ($bienthesanpham->deleted_at === null) checked @endif
                                                                    role="switch" id="trangthai-{{ $index }}">
                                                                <label class="form-check-label"
                                                                    for="trangthai-{{ $index }}">
                                                                    Trạng thái
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="variant_id[]"
                                                            value="{{ $bienthesanpham->id }}">

                                                    </div>
                                                    <hr>
                                                </div>
                                            @endforeach
                                            <div class="variant" data-index="0">
                                            </div>
                                            <button class="btn btn-primary py-2" style="margin-top: 10px"
                                                id="addnewvariant">Thêm biến thể</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
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
        // biến thể
        document.addEventListener('DOMContentLoaded', function() {
            var variantsContainer = document.getElementById("variants-container");
            var addnewvariant = document.getElementById("addnewvariant");
            var variantCount = 1;

            function attachInputChangeListener() {
                var inputs = document.querySelectorAll('input[type="number"]');
                inputs.forEach(function(input) {
                    input.addEventListener('change', function(e) {
                        if (e.target.value < 1) {
                            e.target.value = 0;
                        }
                    });
                });
            }

            function addVariant() {
                var newVariant = document.createElement('div');
                newVariant.className = 'variant';
                newVariant.setAttribute('data-index', variantCount);
                newVariant.innerHTML = `
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <label for="new_dung_luong_id-${variantCount}" class="form-label">Dung lượng:</label>
                                            <select class="form-select" id="new_dung_luong_id-${variantCount}" name="new_dung_luong_id[]">
                                                @foreach ($dungluongs as $dungluong)
                                                    <option value="{{ $dungluong->id }}"
                                                        {{ old('new_dung_luong_id.0') == $dungluong->id ? 'selected' : '' }}>
                                                        {{ $dungluong->ten_dung_luong }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('new_dung_luong_id.0')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <label for="new_mau_sac_id-${variantCount}" class="form-label">Màu sắc:</label>
                                            <select class="form-select" id="new_mau_sac_id-${variantCount}" name="new_mau_sac_id[]">
                                                @foreach ($mausacs as $mausac)
                                                    <option value="{{ $mausac->id }}"
                                                        {{ old('new_mau_sac_id.0') == $mausac->id ? 'selected' : '' }}>
                                                        {{ $mausac->ten_mau_sac }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('new_mau_sac_id.0')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <label for="new_gia_cu-${variantCount}" class="form-label">Giá cũ:</label>
                                            <input type="number" class="form-control" id="new_gia_cu-${variantCount}" name="new_gia_cu[]" min="0">
                                            @error('new_gia_cu.0')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <label for="new_gia_moi-${variantCount}" class="form-label">Giá mới:</label>
                                            <input type="number" class="form-control" id="new_gia_moi-${variantCount}" name="new_gia_moi[]" min="0">
                                             @error('new_gia_moi.0')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <label for="new_so_luong-${variantCount}" class="form-label">Số lượng:</label>
                                            <input type="number" class="form-control" id="new_so_luong-${variantCount}" name="new_so_luong[]" min="0">
                                            @error('new_so_luong.0')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <button class="remove-btn btn btn-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                `;

                variantCount++;
                variantsContainer.insertBefore(newVariant, addnewvariant);
                attachInputChangeListener();

                // Thêm sự kiện cho nút xóa trong biến thể mới
                newVariant.querySelector('.remove-btn').addEventListener('click', function(e) {
                    e.preventDefault();
                    newVariant.remove();
                });
            }

            addnewvariant.addEventListener('click', function(e) {
                e.preventDefault();
                addVariant();
            });


            // Gán sự kiện ban đầu cho các input
            attachInputChangeListener();
        });
    </script>
    

    <script>

        // album ảnh
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
    
                    const img = document.createElement('img');
                    img.src = (file instanceof File) ? URL.createObjectURL(file) : file.src;
                    img.className = 'img-fluid';
                    img.style.maxHeight = '100px';
                    previewItem.appendChild(img);
    
                    const deleteButton = document.createElement('button');
                    deleteButton.className = 'btn btn-danger btn-sm delete-button';
                    deleteButton.textContent = 'X';
                    deleteButton.addEventListener('click', function() {
                        previewItem.remove();
                        selectedFiles = selectedFiles.filter(f => f !== file);
                        if (file.id) {
                            deletedImageIds.push(file.id);
                        }
                        updateFileInput();
                        updateDeletedImagesInput();
                    });
                    previewItem.appendChild(deleteButton);
    
                    previewContainer.appendChild(previewItem);
                });
    
                oldImagesInput.value = selectedFiles.filter(f => typeof f === 'object' && f.src).map(f => f.src)
                    .join(',');
            }
    
            input.addEventListener('change', function() {
                const newFiles = Array.from(input.files);
    
                newFiles.forEach(file => {
                    if (!selectedFiles.some(existingFile => existingFile instanceof File && existingFile.name === file.name)) {
                        selectedFiles.push(file);
                    }
                });
    
                renderPreview();
                updateFileInput();
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
    <script>
        document.querySelector('form').addEventListener('submit', function() {
            console.log(document.getElementById('ten_san_pham').value);
        });
        </script>
@endsection
