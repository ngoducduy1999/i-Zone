@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('css')

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

                    <div class="card-body">
                        <div class="table-responsive">

                            {{-- Hiển thị thông báo thành công --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ (session('success')) }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ (session('error')) }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <table class="table table-bordered dt-responsive table-responsive nowrap">
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
                                                <td><img src="{{ Storage::url($item->anh_bai_viet) }}" alt="" width="100px"></td>
                                                <td>{{ $item->user->ten }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                <td>
                                                    @if ($item->trang_thai == 1)
                                                    <span class="badge badge-danger bg-danger">Chưa duyệt</span>
                                                    @else
                                                    <span class="badge badge-success bg-success">Đã duyệt</span>
                                                    @endif
                                                </td>             
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Thao tác <i class="mdi mdi-chevron-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="{{ route('admin.baiviets.edit', $item->id) }}">Sửa</a>
                                                            @if ($item->trang_thai == 1)
                                                                <form action="{{ route('admin.baiviets.onOffBaiViet', $item->id) }}" method="post" class="m-0">
                                                                    @csrf
                                                                    @method('post')
                                                                    <button class="dropdown-item" type="submit">Duyệt bài viết</button>
                                                                </form>
                                                            @else
                                                                <form action="{{ route('admin.baiviets.onOffBaiViet', $item->id) }}" method="post" class="m-0">
                                                                    @csrf
                                                                    @method('post')
                                                                    <button class="dropdown-item" type="submit">Bỏ duyệt bài viết</button>
                                                                </form>
                                                            @endif
                                                
                                                            <form action="{{ route('admin.baiviets.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');" class="m-0">
                                                                @method('DELETE')
                                                                @csrf
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

@endsection