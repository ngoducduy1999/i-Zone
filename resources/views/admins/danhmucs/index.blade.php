@extends('layouts.admin')

@section('title')

@endsection

@section('css')

@endsection

@section('content')
<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Danh sách danh mục</h4>
        </div>

    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif
    <!-- Datatables  -->
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Danh sách danh mục</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Ảnh</th>
                               
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($danhmucs as $danh_muc)
                                <tr>
                                    <td>{{ $danh_muc->id }}</td>
                                    <td>{{ $danh_muc->ten_danh_muc }}</td>
                                    <td>
                                        <img src="{{ asset($danh_muc->anh_danh_muc) }}" alt="{{ $danh_muc->ten_danh_muc }}"
                                            width="200px">
                                    </td>
                                
                                    <td>
                                        <div class="card-body">
                                            <div class="btn-group">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Thao tác<i
                                                        class="mdi mdi-chevron-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                    href="{{ route('admin.danhmucs.show', $danh_muc->id) }}">Xem</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.danhmucs.edit', $danh_muc->id) }}">Sửa</a>
                                                    @if ($danh_muc->deleted_at == NULL)
                                                    <form action="{{ route('admin.danhmucs.destroy', $danh_muc->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="dropdown-item" type="submit">Xóa</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.danhmucs.restore', $danh_muc->id) }}" method="post">
                                                        @csrf
                                                        @method('post')
                                                        <button class="dropdown-item" type="submit">Khôi phục</button>
                                                    </form>
                                                @endif

                                                </div>
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
@endsection

@section('js')
  
@endsection