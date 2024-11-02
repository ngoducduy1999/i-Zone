@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link href="{{ asset('assets/admin/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Quản lý thông tin bài viết</h4>
                </div>
            </div>

            <div class="row">
                <!-- Striped Rows -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title align-content-center mb-0">{{ $title }}</h5>
                        </div><!-- end card header -->

                        <form action="{{ route('admin.baiviets.index') }}" method="GET"
                            style="max-width: 1000px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; display: flex; align-items: center; gap: 15px;">
                            <div style="flex: 1; min-width: 200px;">
                                <label for="user_id" style="display: block; font-weight: bold; margin-bottom: 5px;">Người
                                    đăng:</label>
                                <select name="user_id" id="user_id"
                                    style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">Tất cả</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->ten }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div style="flex: 1; min-width: 200px;">
                                <label for="ngay_dang" style="display: block; font-weight: bold; margin-bottom: 5px;">Ngày
                                    đăng:</label>
                                <input type="date" name="ngay_dang" id="ngay_dang" value="{{ request('ngay_dang') }}"
                                    style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>

                            <div style="flex: 1; min-width: 200px;">
                                <label for="trang_thai" style="display: block; font-weight: bold; margin-bottom: 5px;">Trạng
                                    thái:</label>
                                <select name="trang_thai" id="trang_thai"
                                    style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">Tất cả</option>
                                    <option value="1" {{ request('trang_thai') == '1' ? 'selected' : '' }}>Đã duyệt
                                    </option>
                                    <option value="0" {{ request('trang_thai') == '0' ? 'selected' : '' }}>Chưa duyệt
                                    </option>
                                </select>
                            </div>

                            <div class="mt-3">
                                <button type="submit"
                                    style="padding: 10px; border: none; border-radius: 4px; background-color: #4CAF50; color: white; font-weight: bold; cursor: pointer;">Lọc</button>
                            </div>
                        </form>

                        <div class="card-body">
                            <div class="table-responsive">

                                {{-- Hiển thị thông báo thành công --}}
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tiêu đề</th>
                                            <th>Ảnh bài viết</th>
                                            <th>Người đăng</th>
                                            <th>Ngày đăng bài</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listBaiViet as $item)
                                            <tr>
                                                <th>{{ $item->id }}</th>
                                                <td>{{ $item->tieu_de }}</td>
                                                <td>
                                                    @if ($item->anh_bai_viet)
                                                        <img src="{{ Storage::url($item->anh_bai_viet) }}"
                                                            alt="Ảnh bài viết" width="100px">
                                                    @else
                                                        <span>Không có ảnh</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->user->ten }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                <td>
                                                    @if ($item->trang_thai == 0)
                                                        <span class="badge badge-danger bg-danger">Chưa duyệt</span>
                                                    @else
                                                        <span class="badge badge-success bg-success">Đã duyệt</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Thao tác <i class="mdi mdi-chevron-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.baiviets.edit', $item->id) }}">Sửa</a>
                                                            <form
                                                                action="{{ route('admin.baiviets.onOffBaiViet', $item->id) }}"
                                                                method="post" class="m-0">
                                                                @csrf
                                                                @method('post')
                                                                @if ($item->trang_thai == 0)
                                                                    <button class="dropdown-item" type="submit">Duyệt bài
                                                                        viết</button>
                                                                @else
                                                                    <button class="dropdown-item" type="submit">Bỏ duyệt
                                                                        bài viết</button>
                                                                @endif
                                                            </form>
                                                            <form action="{{ route('admin.baiviets.destroy', $item->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');"
                                                                class="m-0">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item">Xóa</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection

@section('js')
    <!-- DataTables JS -->
    <script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js') }}"></script>

    <!-- DataTable Demo App JS -->
    <script src="{{ asset('assets/admin/js/pages/datatable.init.js') }}"></script>
@endsection
