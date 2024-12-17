@extends('layouts.admin')

@section('title', 'Danh sách đánh giá')

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
                <h4 class="fs-18 fw-semibold m-0">Quản lý liên hệ</h4>
            </div>
        </div>

        <div class="row">
            <!-- Striped Rows -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                    </div><!-- end card header -->

                    <form action="" method="GET"
                    style="max-width: 1000px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; display: flex; align-items: center; gap: 15px;">
                    
                    <div style="flex: 1; min-width: 200px;">
                        <label for="trang_thai_phan_hoi" style="display: block; font-weight: bold; margin-bottom: 5px;">Trạng thái:</label>
                        <select name="trang_thai_phan_hoi" id="trang_thai_phan_hoi"
                            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">Tất cả</option>
                            <option value="pending" {{ request('trang_thai_phan_hoi') == 'pending' ? 'selected' : '' }}>Chưa xử lý</option>
                            <option value="resolved" {{ request('trang_thai_phan_hoi') == 'resolved' ? 'selected' : '' }}>Đã xử lý</option>
                        </select>
                    </div>

                    
                    
                    <div class="mt-3">
                        <button type="submit"
                            style="padding: 10px; border: none; border-radius: 4px; background-color: #4CAF50; color: white; font-weight: bold; cursor: pointer;">Lọc</button>
                    </div>
                </form>
                
                

                    <div class="card-body">
                        <div class="table-responsive">

                            {{-- Display success and error messages --}}
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
                                        <th>Tên người dùng</th>
                                        <th>Email người gửi</th>
                                        <th>Tin nhắn người dùng phản hồi</th>
                                        <th>Trạng thái phản hồi</th>
                                      
                                       <th>Trả lời</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lienhes as $index => $lienhe)
                                     <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$lienhe->ten_nguoi_gui}}</td>
                                    <td>
                                         @if ($lienhe->user)
                                        <p>{{ $lienhe->user->email }}</p> <!-- Hiển thị email của người dùng -->
                                    @else
                                        <p>Người dùng không tồn tại</p> <!-- Nếu không có người dùng, hiển thị thông báo khác -->
                                    @endif
                                
                                </td>
                                    <td>{{$lienhe->tin_nhan}}</td>
        
                                    <td>
                                        @if ($lienhe->trang_thai_phan_hoi == 'pending')
                                          <p class="text-center text-warning">Đang chờ xử lý</p> 
                                        @elseif ($lienhe->trang_thai_phan_hoi == 'resolved')
                                             <p class="text-center text-success">Đã xử lý</p>
                                        @else
                                            
                                        @endif
                                    </td>
                                    
                                    <td>
                                    <a href="{{ route('admin.lienhes.form.reply', ['id' => $lienhe->id]) }}" class="btn btn-success">Gửi phản hồi</a>
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