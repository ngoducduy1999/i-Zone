
@extends('layouts.admin')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
    p {
        color: #000000;
    }
    #editAvatar{
        display: none;
    }
    .avatar-container {
        position: relative;
        display: inline-block;
    }

    .avatar-container .edit-avatar {
        display: block;
    }

    .edit-avatar {
        position: absolute;
        bottom: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 50%;
        padding: 5px;
        display: none;
    }

    .edit-avatar i {
        color: #fff;
        
    }

    .edit-mode input,
    .edit-mode select {
        border: 1px solid #ddd;
        padding: 5px;
        width: 100%;
        border-radius: 4px;
    }

    .info-field input,
    .info-field select {
        border: none; /* Loại bỏ viền */
        background: transparent; /* Loại bỏ nền */
        padding: 5px;
        width: 100%;
        border-radius: 4px;
        box-shadow: none; /* Loại bỏ hiệu ứng đổ bóng */
    }

    .info-field input:disabled {
        cursor: not-allowed; /* Thay đổi con trỏ khi không có quyền chỉnh sửa */
    }
    
</style>


<div class="content">
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Hồ sơ</h4>
            </div>
            @if ($staff->vai_tro=='staff')            
            <button id="editBtn" class="btn btn-primary ms-auto">Sửa</button>
            @endif
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Form để lưu thay đổi -->
                        <form id="userForm" action="{{ route('admin.nhanviens.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="d-flex align-items-center mb-4">
                                <div class="avatar-container">
                                    <img id="avatarPreview" src="{{ $staff->anh_dai_dien ? asset('storage/' . $staff->anh_dai_dien) : asset('assets/admin/images/users/user-11.jpg') }}" class="rounded-circle avatar-lg img-thumbnail float-start" alt="Ảnh đại diện">
                                    <input type="file" id="avatarInput" name="anh_dai_dien" accept="image/*" style="display: none;">
                                    <span class="edit-avatar" id="editAvatar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </span>
                                </div>
                                <div class="ms-3">
                                    <h4 class="m-0 text-dark">{{ $staff->ten }}</h4>
                                    <p class="text-muted mb-0">{{ ucfirst($staff->getRoleNames()->first()) }}</p>
                                </div>
                            </div>

                            <div class="tab-content text-muted bg-white mt-3">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <h5 class="fs-16 text-dark fw-semibold">Giới thiệu</h5>
                                        <p>Họ và tên: <span class="info-field"><input type="text" name="ten" value="{{ $staff->ten }}" disabled></span></p>
                                        <p>Ngày sinh: <span class="info-field"><input type="text" name="ngay_sinh" value="{{ $staff->ngay_sinh }}" disabled></span></p>
                                        <!-- Vai trò không hiển thị dưới dạng input -->
                                        <p>Chức vụ: 
                                            <span class="info-field">
                                                <select name="vai_tro" disabled>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role }}" {{ $role == $staff->getRoleNames()->first() ? 'selected' : '' }}>
                                                            {{ ucfirst($role) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </span>
                                        </p>                                                                                
                                                                            </div>

                                    <div class="col-md-6 mb-4">
                                        <h5 class="fs-16 text-dark fw-semibold">Liên hệ</h5>
                                        <p>Email: <span class="info-field"><input type="email" name="email" value="{{ $staff->email }}" disabled></span></p>
                                        <p>Địa chỉ: <span class="info-field"><input type="text" name="dia_chi" value="{{ $staff->dia_chi }}" disabled></span></p>
                                        <p>Số điện thoại: <span class="info-field"><input type="text" name="so_dien_thoai" value="{{ $staff->so_dien_thoai }}" disabled></span></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- Kết thúc card -->
            </div>
        </div>
    </div>
</div>
<script>
    // Chuyển sang chế độ chỉnh sửa
    document.getElementById('editBtn').addEventListener('click', function () {
        let fields = document.querySelectorAll('.info-field input, .info-field select');
        let form = document.getElementById('userForm');
        
        if (this.innerText === "Sửa") {
            fields.forEach(function (field) {
                field.removeAttribute('disabled');
                field.classList.add('edit-mode'); // Thêm class để chỉnh sửa
                field.style.backgroundColor = '#fff'; 
                field.style.border = '1px solid #ddd'; // Thiết lập border cho các trường input và select
            });
            this.innerText = "Lưu";
            editAvatar.style.display = 'block';
        } else {
            editAvatar.style.display = 'none';

            let formData = new FormData(form);
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest', // Đặt header để báo server là yêu cầu AJAX
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Thêm token CSRF
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message); // Hiển thị thông báo thành công
                    fields.forEach(function (field) {
                        field.setAttribute('disabled', true);
                        field.classList.remove('edit-mode'); // Xóa class khi không chỉnh sửa
                        field.style.border = 'none'; // Thiết lập border cho các trường input và select
                        field.style.backgroundColor = 'transparent'; // Thay đổi nền khi không ở chế độ sửa
                    });
                    document.getElementById('editBtn').innerText = "Sửa";
                } else {
                    alert('Có lỗi xảy ra. Vui lòng thử lại.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra. Vui lòng thử lại.');
            });
        }
    });

    // Mở input file khi nhấn vào avatar
    document.getElementById('editAvatar').addEventListener('click', function () {
        document.getElementById('avatarInput').click();
    });

    // Xử lý hiển thị ảnh mới ngay khi người dùng chọn
    document.getElementById('avatarInput').addEventListener('change', function (e) {
        let reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('avatarPreview').src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>


@endsection
