@extends('layouts.admin')

@section('content')
<style>
    /* Các style khác của bạn */
    p {
        color: #000000;
    }

    .avatar-container {
        position: relative;
        display: inline-block;
    }

    .avatar-container:hover .edit-avatar {
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
        cursor: pointer;
    }

    .edit-avatar i {
        color: #fff;
    }

    /* Style cho các ô input khi chỉnh sửa */
    .edit-mode input {
        border: 1px solid #ddd;
        padding: 5px;
        width: 100%;
        border-radius: 4px;
    }

    /* Spinner loading */
    .loading-spinner {
        display: inline-block;
        width: 1rem;
        height: 1rem;
        border: 2px solid rgba(0, 0, 0, 0.1);
        border-radius: 50%;
        border-top-color: #000;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .hidden {
        display: none;
    }

    .alert {
        margin-top: 10px;
        padding: 10px;
        border-radius: 4px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }
</style>

<div class="content">
    <!-- Bắt đầu nội dung -->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Hồ sơ</h4>
            </div>
            <button id="editBtn" class="btn btn-primary ms-auto">Sửa</button>
            <div id="loadingSpinner" class="loading-spinner hidden ms-2"></div>
        </div>

        <!-- Thông báo -->
        <div id="statusMessage" class="alert hidden"></div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Avatar và thông tin -->
                        <div class="d-flex align-items-center mb-4">
                            <div class="avatar-container" tabindex="0" aria-label="Chọn để thay đổi ảnh đại diện">
                                @if ($user->anh_dai_dien != '')
                                    <img id="avatarPreview" src="{{ asset('storage/' .$user->anh_dai_dien) }}" class="rounded-circle avatar-lg img-thumbnail float-start" alt="Ảnh đại diện">
                                @else
                                    <img id="avatarPreview" src="{{ asset('assets/admin/images/users/user-11.jpg') }}" class="rounded-circle avatar-lg img-thumbnail float-start" alt="Ảnh đại diện">
                                @endif
                                <span class="edit-avatar">
                                    <i class="bi bi-pencil-fill"></i>
                                </span>
                                <input type="file" id="avatarInput" style="display: none;" aria-label="Chọn ảnh đại diện mới"/>
                            </div>
                            <div class="ms-3">
                                <h4 class="m-0 text-dark" id="nameDisplay">{{ $user->ten }}</h4>
                                <p class="text-muted mb-0">{{ ucfirst($user->vai_tro) }}</p>
                            </div>
                        </div>

                        <!-- Tabs -->
                        <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active p-2" id="profile_about_tab" data-bs-toggle="tab" href="#profile_about" role="tab">
                                    <span class="d-none d-sm-block">Thông tin</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab nội dung -->
                        <div class="tab-content text-muted bg-white mt-3">
                            <!-- Thông tin cá nhân -->
                            <div class="tab-pane active show" id="profile_about" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <h5 class="fs-16 text-dark fw-semibold">Giới thiệu</h5>
                                        <p>Họ và tên: <span class="info-field" id="tenDisplay">{{ $user->ten }}</span></p>
                                        <p>Ngày sinh: <span class="info-field" id="ngaySinhDisplay">{{ $user->ngay_sinh }}</span></p>
                                        <p>Chức vụ: <span class="info-field" id="vaiTroDisplay">{{ ucfirst($user->vai_tro) }}</span></p>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <h5 class="fs-16 text-dark fw-semibold">Liên hệ</h5>
                                        <p>Email: <a href="mailto:{{ $user->email }}" class="info-field text-primary" id="emailDisplay">{{ $user->email }}</a></p>
                                        <p>Địa chỉ: <span class="info-field" id="diaChiDisplay">{{ $user->dia_chi }}</span></p>
                                        <p>Số điện thoại: <span class="info-field" id="soDienThoaiDisplay">{{ $user->so_dien_thoai }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Kết thúc card-body -->
                </div> <!-- Kết thúc card -->
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.querySelector('.edit-avatar').addEventListener('click', function() {
        document.getElementById('avatarInput').click();
    });

    document.getElementById('avatarInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('editBtn').addEventListener('click', function () {
        let isEditing = this.innerText === "Lưu";

        if (isEditing) {
            document.getElementById('loadingSpinner').classList.remove('hidden');
            this.setAttribute('disabled', 'true');

            let formData = new FormData();
            formData.append('ten', document.getElementById('tenInput').value);
            formData.append('ngay_sinh', document.getElementById('ngaySinhInput').value);
            formData.append('email', document.getElementById('emailInput').value);
            formData.append('dia_chi', document.getElementById('diaChiInput').value);
            formData.append('so_dien_thoai', document.getElementById('soDienThoaiInput').value);

            let avatarInput = document.getElementById('avatarInput').files[0];
            if (avatarInput) {
                formData.append('anh_dai_dien', avatarInput);
            }

            
            $.ajax({
    url: '{{ route('admin.updateProfile', $user->id) }}',
    type: 'PUT',
    data: formData,
    processData: false,
    contentType: false,
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    success: function(response) {
        document.getElementById('loadingSpinner').classList.add('hidden');
        document.getElementById('editBtn').removeAttribute('disabled');

        if (response.success) {
            document.getElementById('statusMessage').innerText = "Cập nhật thành công!";
            document.getElementById('statusMessage').classList.add('alert-success');
        } else {
            document.getElementById('statusMessage').innerText = "Có lỗi xảy ra!";
            document.getElementById('statusMessage').classList.add('alert-danger');
        }

        document.getElementById('statusMessage').classList.remove('hidden');
        setTimeout(() => {
            document.getElementById('statusMessage').classList.add('hidden');
        }, 3000);

        toggleEdit(false);
    },
    error: function(xhr) {
        document.getElementById('loadingSpinner').classList.add('hidden');
        document.getElementById('editBtn').removeAttribute('disabled');

        if (xhr.status === 422) {
            // Hiển thị thông báo lỗi validation từ server
            const errors = xhr.responseJSON.errors;
            let errorMessage = '';

            for (const key in errors) {
                if (errors.hasOwnProperty(key)) {
                    errorMessage += errors[key][0] + '\n';
                }
            }

            document.getElementById('statusMessage').innerText = errorMessage;
            document.getElementById('statusMessage').classList.add('alert-danger');
            document.getElementById('statusMessage').classList.remove('hidden');
        } else {
            document.getElementById('statusMessage').innerText = "Có lỗi xảy ra khi cập nhật!";
            document.getElementById('statusMessage').classList.add('alert-danger');
            document.getElementById('statusMessage').classList.remove('hidden');
        }

        setTimeout(() => {
            document.getElementById('statusMessage').classList.add('hidden');
        }, 3000);
    }
});

        } else {
            toggleEdit(true);
            this.innerText = "Lưu";
        }
    });

    function toggleEdit(isEdit) {
        const fields = ['ten', 'ngaySinh', 'email', 'diaChi', 'soDienThoai'];
        fields.forEach(field => {
            const displayElement = document.getElementById(`${field}Display`);
            const inputElement = document.createElement('input');
            inputElement.type = 'text';
            inputElement.id = `${field}Input`;
            inputElement.value = displayElement.innerText;
            inputElement.classList.add('form-control', 'mt-2');

            displayElement.replaceWith(inputElement);
        });

        document.getElementById('editBtn').innerText = isEdit ? "Lưu" : "Sửa";
    }
</script>
@endsection
