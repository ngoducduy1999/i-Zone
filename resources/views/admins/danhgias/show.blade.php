@extends('layouts.admin')

@section('title', 'Xem sách đánh giá')


@section('css')
    <style>
        /* Make the review comment text larger */
        .review-comment {
            font-size: 1.2rem;
            font-weight: bold;
        }

        /* Style the product variant information */
        .variant-info {
            font-size: 1rem;
            color: #6c757d;
        }

        /* Style the edit button */
        .edit-button {
            cursor: pointer;
            color: #007bff;
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')
    <div class="content" style=" margin-top: 50px; ">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-body">
                            <div class="clearfix">
                                <h5 class="card-title mb-0">{{ $title }}</h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Thông tin người đánh giá (bên trái) -->
                                    <h5><b>Thông tin người đánh giá:</b></h5>
                                    <ul>
                                        <li>Tên người đánh giá: <b>{{ $danhGia->user->ten ?? 'Không xác định' }}</b></li>
                                        <li>Email: <b>{{ $danhGia->user->email ?? 'Không có email' }}</b></li>
                                        <li>Số điện thoại: <b>{{ $danhGia->user->so_dien_thoai ?? 'Không có số điện thoại' }}</b></li>
                                    </ul>

                                    <h5><b>Đánh giá:</b></h5>
                                    <p>Số sao: <b>{{ $danhGia->diem_so }} sao</b></p>
                                    
                                    <!-- Make the review comment larger -->
                                    <p class="review-comment">Nhận xét: <i>{{ $danhGia->nhan_xet }}</i></p>
                                </div>

                                <div class="col-md-6">
                                    <!-- Câu trả lời của Admin (bên phải) -->
                                    <h5><b>Câu trả lời của Admin:</b></h5>
                                    @foreach ($danhGia->traLois as $traLoi)
                                        <div class="mb-2" id="response-{{ $traLoi->id }}">
                                            <p>
                                                <strong>{{ $traLoi->user ? $traLoi->user->ten : 'Admin' }} (Admin):</strong>
                                                <span class="response-text">{{ $traLoi->noi_dung }}</span>

                                                @if(auth()->user()->vai_tro == 'admin')
                                                    <!-- Edit button -->
                                                    <span class="edit-button" onclick="editResponse({{ $traLoi->id }})">[Sửa]</span>
                                                @endif
                                            </p>

                                            <!-- Edit form (hidden initially) -->
                                            <div id="edit-form-{{ $traLoi->id }}" style="display:none;">
                                                <form action="{{ route('admin.Danhgias.traLoi.update', $traLoi->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <textarea name="noi_dung" class="form-control" required>{{ $traLoi->noi_dung }}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                    <button type="button" class="btn btn-secondary" onclick="cancelEdit({{ $traLoi->id }})">Hủy</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if(auth()->user()->vai_tro == 'admin') <!-- Only show to admin -->
                                    <form action="{{ route('admin.Danhgias.traLoi', $danhGia->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="noi_dung">Trả lời:</label>
                                            <textarea name="noi_dung" id="noi_dung" class="form-control" required></textarea>
                                        </div>
                                        <a href="{{ route('admin.Danhgias.index') }}" class="btn btn-dark mt-2">Quay lại</a>

                                        <button type="submit" class="btn btn-primary mt-2">Trả lời</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->

@endsection

@section('js')
    <script>
        function editResponse(id) {
            // Hide the current response text and show the edit form
            document.querySelector(`#response-${id} .response-text`).style.display = 'none';
            document.querySelector(`#response-${id} .edit-button`).style.display = 'none';
            document.querySelector(`#edit-form-${id}`).style.display = 'block';
        }

        function cancelEdit(id) {
            // Hide the edit form and show the response text
            document.querySelector(`#response-${id} .response-text`).style.display = 'inline';
            document.querySelector(`#response-${id} .edit-button`).style.display = 'inline';
            document.querySelector(`#edit-form-${id}`).style.display = 'none';
        }
    </script>
@endsection
