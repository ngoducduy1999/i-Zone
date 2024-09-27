@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <div class="container">


        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Danh sách dung lượng</h4>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="mt-2">
                                <h5 class="card-title mb-0">Danh sách dung lượng</h5>
                            </div>
                            <div>
                                <a href="{{ route('admin.dungluongs.create') }}" class="btn btn-success">Thêm mới dung
                                    lượng</a>
                            </div>
                        </div>



                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Dung lượng</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dungluongs as $gb)
                                    <tr>
                                        <td>{{ $gb->id }}</td>
                                        <td>{{ $gb->ten_dung_luong }}</td>
                                        <td>{!! $gb->trang_thai == 1
                                            ? '<span class="badge bg-success">Còn</span>'
                                            : '<span class="badge bg-danger">Hết</span>' !!}</td>
                                        <td>
                                            <div class="">
                                                <div class="btn-group">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Thao tác<i
                                                            class="mdi mdi-chevron-down"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.dungluongs.edit', $gb->id) }}">Sửa</a>
                                                        <form action="{{ route('admin.dungluongs.destroy' , $gb->id) }}" method="POST"
                                                            onsubmit="return confirm('Bạn có chắc xóa kích cỡ dung lượng này không?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">xóa</button>
                                                        </form>

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
