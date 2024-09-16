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
                <h4 class="fs-18 fw-semibold m-0">Quản lý danh sách đơn hàng</h4>
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

                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listHoaDon as $item)
                                            <tr>
                                                <th>{{ $item->id }}</th>
                                                <td>{{ \Carbon\Carbon::parse($item->ngay_dat_hang)->format('d-m-Y') }}</td>
                                                <td>{{ number_format($item->tong_tien, 0, '', '.') }}</td>
                                                <td>{{ $item->phuong_thuc_thanh_toan }}</td>
                                                <td>
                                                    <form action="{{ route('admin.hoadons.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="trang_thai" class="form-select w-75" onchange="confirmSubmit(this)" data-default-value="{{ $item->trang_thai }}">
                                                            @foreach ($trangThaiHoaDon as $key => $value)
                                                                <option value="{{ $key }}" 
                                                                {{ $key == $item->trang_thai ? 'selected' : '' }} {{ $key == $type_huy_don_hang ? 'disabled' : '' }}>{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </td>                 
                                                <td>
                                                    <a href="{{ route('admin.hoadons.show', $item->id) }}"><i class="mdi mdi-eye text-muted fs-18 rounded-2 border p-1 me-1"></i></a>

                                                </td>                             
                                            </tr>  
                                        @endforeach   
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{-- {{ $listHoaDon->links('pagination::bootstrap-5') }} --}}
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
    <script>
        function confirmSubmit(selectElement){
            var form = selectElement.form;
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');

            if(confirm('Bạn có chắc chắn thay đổi trạng thái đơn hàng thành "' + selectedOption + '" không?')){
                form.submit();
            }else{
                selectElement.value = defaultValue
            }
        }
    </script>
@endsection