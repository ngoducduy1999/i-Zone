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
                                <select name="searchTrangThai" class="form-select">
                                    <option value="" selected>Chọn trạng thái</option>
                                    <option value="1">Phê duyệt</option>
                                    <option value="0">Chưa phê duyệt</option>
                                </select>
                                <input type="text" class="form-control" name="search" placeholder="Tìm hiếm....">
                                <button type="submit" class="btn btn-dark">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tài khoản</th>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Điểm số</th>
                                        <th scope="col">Nhận xét</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listDanhGia as $index => $item)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $item->user->ten }}</td>
                                            <td>{{ $item->sanPham->ten_san_pham }}</td>
                                            <td>{{ $item->diem_so }}</td>
                                            <td>{{ $item->nhan_xet }}</td>
                                            <td>                                              
                                                <span class="badge badge-success bg-success">Phê duyệt</span>                                   
                                            </td>
                                            <td>
                                                <div class="card-body">
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Thao tác<i
                                                                class="mdi mdi-chevron-down"></i></button>
                                                        <div class="dropdown-menu">       
                                                            <form action="{{ route('admin.danhgias.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa thẻ tag này?');">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="dropdown-item">Xóa</button>
                                                            </form>
            
                                                        </div>
                                                    </div>
            
            
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{-- {{ $listDanhGia->links('pagination::bootstrap-5') }} --}}
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