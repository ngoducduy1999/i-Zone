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
                <h4 class="fs-18 fw-semibold m-0">Quản lý đánh giá sản phẩm</h4>
            </div>
        </div>

        <div class="row">
            <!-- Striped Rows -->
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-start">   
                        <form action="{{ route('admin.danhgias.index') }}" method="GET">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Tìm hiếm....">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </form>
                        <!-- Form tìm kiếm sản phẩm -->
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Ảnh sản phâm</th>                                 
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listSanPham as $item)
                                        <tr>
                                            <th>{{ $item->id }}</th>
                                            <td>{{ $item->ten_san_pham }}</td>
                                            <td><img src="{{ asset($item->anh_san_pham) }}" alt="{{ $item->ten_san_pham }}"
                                                width="200px">
                                            </td>                                           
                                            <td>
                                                @if ($item->deleted_at == null)
                                                    <span class="badge badge-success bg-success">Hoạt động</span>
                                                @else
                                                    <span class="badge badge-danger bg-danger">Ngừng hoạt động</span>
                                                @endif
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
                                                                href="{{ route('admin.danhgias.show', $item->id) }}">Xem đánh giá
                                                            </a>                                                              
                                                        </div>
                                                    </div>
                                                </div>
                                            </td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $listSanPham->links('pagination::bootstrap-5') }}
                            </div>
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