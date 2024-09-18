@extends('layouts.admin')
@section('title', 'Thêm mới sản phẩm')
@section('content')

    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Biến thể sản phẩm</h4>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Danh sách biến thể sản phẩm</h5>
                    </div><!-- end card header -->
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif
                    <div class="card-body">
                        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Dung lượng</th>
                                    <th>Màu sắc</th>
                                    <th>Giã cũ</th>
                                    <th>Giá mới</th>
                                    <th>Số lượng</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bienthes as $bienthe)
                                    <tr>
                                        <td>{{ $bienthe->id }}</td>
                                        <td>{{ $bienthe->dungLuong->ten_dung_luong }}</td>
                                        <td>{{ $bienthe->mauSac->ten_mau_sac }}</td>
                                        <td>{{ number_format($bienthe->gia_cu, 0, ',', '.') }}đ</td>
                                        <td>{{ number_format($bienthe->gia_moi, 0, ',', '.') }}đ</td>
                                        <td>{{ $bienthe->so_luong }}</td>
                                        <td>
                                            @if ($bienthe->deleted_at == null)
                                                <span class="badge badge-success bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge badge-danger bg-danger">Ngừng hoạt động</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bienthe->deleted_at == null)
                                                <form action="{{ route('admin.bienthesanphams.destroy', $bienthe->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.bienthesanphams.restore', $bienthe->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('post')
                                                    <button type="submit" class="btn btn-success">Khôi phục</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('admin.sanphams.edit', $bienthe->san_pham_id) }}" class="btn btn-warning">Sửa sản
                            phẩm</a>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">Thêm mới biến thể</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('admin.bienthesanphams.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="san_pham_id" id="san_pham_id"
                                    value="{{ $bienthe->san_pham_id }}">
                                <div class="mb-3">
                                    <div id="variants-container">
                                        <div class="variant" data-index="0">
                                            <div class="row g-3">
                                                <div class="col-md-2">
                                                    <label for="dung_luong_id-0" class="form-label">Dung lượng:</label>
                                                    <select class="form-select" id="dung_luong_id-0" name="dung_luong_id[]"
                                                        required>
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
                                        <button class="btn btn-primary" style="margin-top: 10px" id="addnewvariant">Thêm
                                            biến thể</button>
                                    </div>
                                    <button type="submit" class="btn btn-success" style="margin-top: 10px">Tạo
                                        mới</button>
                                </div>
                            </form>
                        </div>
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
                                                    <select class="form-select" id="dung_luong_id-${variantCount}" name="dung_luong_id[]"
                                                        required>
                                                        <option disabled>Ram</option>
                                                        @foreach ($dungluongs as $dungluong)
                                                            <option value="{{ $dungluong->id }}"
                                                                {{ old('dung_luong_id.${variantCount}') == $dungluong->id ? 'selected' : '' }}>
                                                                {{ $dungluong->ten_dung_luong }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="mau_sac_id-${variantCount}" class="form-label">Màu sắc:</label>
                                                    <select class="form-select" id="mau_sac_id-${variantCount}" name="mau_sac_id[]"
                                                        required>
                                                        <option disabled>Color</option>
                                                        @foreach ($mausacs as $mausac)
                                                            <option value="{{ $mausac->id }}"
                                                                {{ old('mau_sac_id.${variantCount}') == $mausac->id ? 'selected' : '' }}>
                                                                {{ $mausac->ten_mau_sac }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="gia_cu-${variantCount}" class="form-label">Giá cũ:</label>
                                                    <input type="number" class="form-control" id="gia_cu-${variantCount}"
                                                        name="gia_cu[]" min="0" required
                                                        value="{{ old('gia_cu.${variantCount}') }}">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="gia_moi-${variantCount}" class="form-label">Giá mới:</label>
                                                    <input type="number" class="form-control" id="gia_moi-${variantCount}"
                                                        name="gia_moi[]" min="0" required
                                                        value="{{ old('gia_moi.${variantCount}') }}">

                                                </div>
                                                <div class="col-md-2">
                                                    <label for="so_luong-${variantCount}" class="form-label">Số lượng:</label>
                                                    <input type="number" class="form-control" id="so_luong-${variantCount}"
                                                        name="so_luong[]" min="0" required
                                                        value="{{ old('so_luong.${variantCount}') }}">
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

                                    @error('dung_luong_id.${variantCount}')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('mau_sac_id.${variantCount}')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('gia_cu.${variantCount}')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('gia_moi.${variantCount}')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('so_luong.${variantCount}')
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
@endsection
