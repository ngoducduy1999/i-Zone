@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <!-- Quill css -->
    <link href="{{ asset('assets/admin/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Quản lý tin tức</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $title }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.baiviets.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="tieu_de" class="form-label">Tiêu đề</label>
                                        <input type="text" id="tieu_de" name="tieu_de"
                                            class="form-control @error('tieu_de') is-invalid @enderror"
                                            value="{{ old('tieu_de') }}" placeholder="Nhập tiêu đề bài viết">
                                        @error('tieu_de')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-lg-4">                                 
                                        <div class="mb-3">
                                            <label for="anh_bai_viet" class="form-label">Ảnh tin tức</label>
                                            <input type="file" id="anh_bai_viet" name="anh_bai_viet" class="form-control"
                                                onchange="showImage(event)">
                                            <img id="img_bai_viet" src="" alt="Hình ảnh bài viết"
                                                style="width: 100px; display: none;">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tên người đăng</label>
                                            <input class="form-control" type="text" name="user_id" value="{{ auth()->user()->ten }}" disabled>
                                        </div>

                                        <div class="mb-3">
                                            <label for="danh_muc_id" class="form-label">Danh mục</label>
                                            <select name="danh_muc_id" id="danh_muc_id"
                                                class="form-select @error('danh_muc_id') is-invalid @enderror">
                                                <option value="">-- Chọn danh mục --</option>
                                                @foreach ($listDanhMuc as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('danh_muc_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->ten_danh_muc }}</option>
                                                @endforeach
                                            </select>
                                            @error('danh_muc_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="created_at" class="form-label">Ngày đăng</label>
                                            <input type="date" id="created_at" name="created_at"
                                                class="form-control @error('created_at') is-invalid @enderror"
                                                value="{{ old('created_at') ?: now()->format('Y-m-d') }}">
                                            @error('created_at')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div> 
                                    
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="noi_dung" class="form-label">Nội dung tin tức</label>
                                            <div id="quill-editor" style="height: 400px;"></div>
                                            <textarea name="noi_dung" id="noi_dung_content" class="d-none"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-start">
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Quill Editor Js -->
    <script src="{{ asset('assets/admin/libs/quill/quill.core.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/quill/quill.min.js') }}"></script>

    <script>
        function showImage(event) {
            const img_bai_viet = document.getElementById('img_bai_viet');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                img_bai_viet.src = reader.result;
                img_bai_viet.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill("#quill-editor", {
                theme: "snow",
            });

            var old_content = `{!! old('noi_dung') !!}`;
            quill.root.innerHTML = old_content;

            quill.on('text-change', function() {
                var html = quill.root.innerHTML;
                document.getElementById('noi_dung_content').value = html;
            });
        });
    </script>
@endsection
