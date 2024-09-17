@extends('layouts.admin')
@section('title', 'Thêm mới sản phẩm')
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
            /* Adjust width as needed */
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
                <h4 class="fs-18 fw-semibold m-0">Sản phẩm</h4>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Sản phẩm</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('admin.sanphams.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="ma_san_pham" class="form-label">Mã sản phẩm</label>
                                        <input type="text" id="ma_san_pham" id="ma_san_pham" name="ma_san_pham"
                                            class="form-control" placeholder="Mã sản phẩm" value="{{ old('ma_san_pham') }}">
                                        @error('ma_san_pham')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                                        <input type="text" id="ten_san_pham" id="ten_san_pham" name="ten_san_pham"
                                            class="form-control" placeholder="Tên sản phẩm"
                                            value=" {{ old('ten_san_pham') }}">
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
                                                    {{ old('danh_muc_id') == $danhmuc->id ? 'selected' : '' }}>
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
                                        <select id="example-multiselect" multiple class="form-control" id="tag_id" name="tag_id[]">
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    {{ old('tag_id') == $tag->id ? 'selected' : '' }}>
                                                    {{ $tag->ten_tag }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="anh_san_pham" class="form-label">Ảnh sản phẩm</label>
                                        <input type="file" id="anh_san_pham" class="form-control" id="anh_san_pham"
                                            name="anh_san_pham">
                                        @error('anh_san_pham')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <img src="" alt="" width="50px" id="img" class="py-1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Album ảnh:</label>
                                        <input class="form-control" type="file" id="hinh_anh" name="hinh_anh[]"
                                            multiple>
                                        @error('hinh_anh')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @error('hinh_anh.*')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="preview-container" id="preview"></div>
                                    </div>
                                    <button class="btn btn-success" type="submit" style="margin-top: 10px">Thêm sản
                                        phẩm</button>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Biến thể sản phẩm</h5>
                                    </div>
                                    <div class="mb-3">
                                        <div id="variants-container">
                                            <div class="variant" data-index="0">
                                                <div class="row g-3">
                                                    <div class="col-md-2">
                                                        <label for="dung_luong_id-0" class="form-label">Dung lượng:</label>
                                                        <select class="form-select" id="dung_luong_id-0"
                                                            name="dung_luong_id[]" required>
                                                            <option disabled>Ram</option>
                                                            @foreach ($dungluongs as $dungluong)
                                                                <option value="{{ $dungluong->id }}"
                                                                    {{ old('dung_luong_id.0') == $dungluong->id ? 'selected' : '' }}>
                                                                    {{ $dungluong->ten_dung_luong }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="mau_sac_id-0" class="form-label">Màu sắc:</label>
                                                        <select class="form-select" id="mau_sac_id-0" name="mau_sac_id[]"
                                                            required>
                                                            <option disabled>Color</option>
                                                            @foreach ($mausacs as $mausac)
                                                                <option value="{{ $mausac->id }}"
                                                                    {{ old('mau_sac_id.0') == $mausac->id ? 'selected' : '' }}>
                                                                    {{ $mausac->ten_mau_sac }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="gia_cu-0" class="form-label">Giá cũ:</label>
                                                        <input type="number" class="form-control" id="gia_cu-0"
                                                            name="gia_cu[]" min="0" required
                                                            value="{{ old('gia_cu.0') }}">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="gia_moi-0" class="form-label">Giá mới:</label>
                                                        <input type="number" class="form-control" id="gia_moi-0"
                                                            name="gia_moi[]" min="0" required
                                                            value="{{ old('gia_moi.0') }}">

                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="so_luong-0" class="form-label">Số lượng:</label>
                                                        <input type="number" class="form-control" id="so_luong-0"
                                                            name="so_luong[]" min="0" required
                                                            value="{{ old('so_luong.0') }}">
                                                    </div>
                                                </div>
                                                @error('dung_luong_id.0')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                @error('mau_sac_id.0')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                @error('gia_cu.0')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                @error('gia_moi.0')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                @error('so_luong.0')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <hr>
                                            </div>
                                            <button class="btn btn-primary" style="margin-top: 10px"
                                                id="addnewvariant">Thêm biến thể</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
                                        <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                        <textarea name="mo_ta" id="mo_ta" cols="30" rows="10">{{ old('mo_ta') }}</textarea>
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
                var inputs = document.querySelectorAll('input');
                inputs.forEach(function(input) {
                    input.addEventListener('change', function(e) {
                        if (e.target.value < 1) {
                            e.target.value = 1;
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
                                            <label for="dung_luong_id-${variantCount}" class="form-label">Dung lượng:</label>
                                            <select class="form-select" id="dung_luong_id-${variantCount}" name="dung_luong_id[]">
                                                @foreach ($dungluongs as $dungluong)
                                                    <option value="{{ $dungluong->id }}"
                                                        {{ old('dung_luong_id.0') == $dungluong->id ? 'selected' : '' }}>
                                                        {{ $dungluong->ten_dung_luong }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="mau_sac_id-${variantCount}" class="form-label">Màu sắc:</label>
                                            <select class="form-select" id="mau_sac_id-${variantCount}" name="mau_sac_id[]">
                                                @foreach ($mausacs as $mausac)
                                                    <option value="{{ $mausac->id }}"
                                                        {{ old('mau_sac_id.0') == $mausac->id ? 'selected' : '' }}>
                                                        {{ $mausac->ten_mau_sac }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="gia_cu-${variantCount}" class="form-label">Giá cũ:</label>
                                            <input type="number" class="form-control" id="gia_cu-${variantCount}" name="gia_cu[]" min="0" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="gia_moi-${variantCount}" class="form-label">Giá mới:</label>
                                            <input type="number" class="form-control" id="gia_moi-${variantCount}" name="gia_moi[]" min="0" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="so_luong-${variantCount}" class="form-label">Số lượng:</label>
                                            <input type="number" class="form-control" id="so_luong-${variantCount}" name="so_luong[]" min="0" required>
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
                                    @error('dung_luong_id.0')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('mau_sac_id.0')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('gia_cu.0')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('gia_moi.0')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('so_luong.0')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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
        const input = document.getElementById('hinh_anh');
        const previewContainer = document.getElementById('preview');
        const submitButton = document.getElementById('submitButton');
        let selectedFiles = []; // Mảng để lưu trữ các file đã chọn

        function renderPreviews() {
            previewContainer.innerHTML = ''; // Clear previous previews
            for (let i = 0; i < selectedFiles.length; i++) {
                const file = selectedFiles[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'preview-item';

                    const fileType = file.type.split('/')[0]; // Get file type (image, video, etc.)

                    if (fileType === 'image') {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-fluid'; // Bootstrap class to make the image responsive
                        img.style.maxHeight = '100px'; // Adjust height as needed
                        previewItem.appendChild(img);
                    } else {
                        const text = document.createElement('p');
                        text.textContent = file.name;
                        previewItem.appendChild(text);
                    }
                    const deleteButton = document.createElement('button');
                    deleteButton.className = 'btn btn-danger btn-sm delete-button';
                    deleteButton.textContent = 'X';
                    deleteButton.addEventListener('click', function() {
                        selectedFiles.splice(i, 1); // Remove file from selectedFiles array
                        renderPreviews(); // Re-render the previews
                    });
                    previewItem.appendChild(deleteButton);

                    previewContainer.appendChild(previewItem);
                };

                reader.readAsDataURL(file);
            }
        }

        function showFileNames() {
            const fileNames = selectedFiles.map(file => file.name).join(', ');
            alert(`Tên các tệp ảnh: ${fileNames}`);
        }

        input.addEventListener('change', function() {
            const newFiles = Array.from(input.files); // Get new files
            selectedFiles = selectedFiles.concat(newFiles); // Add new files to the selectedFiles array
            renderPreviews(); // Render previews for all selected files
        });

        submitButton.addEventListener('click', showFileNames); // Add click event for submit button
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
    <script>
        // mô tả
        CKEDITOR.replace('mo_ta');
    </script>
@endsection
