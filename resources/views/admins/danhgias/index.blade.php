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
                                                <form action="{{ route('admin.danhgias.destroy', $item->id) }}" method="POST" class="d-inline" 
                                                    onsubmit="return confirm('Bạn có đồng ý xóa không?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-white">
                                                        <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                              
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