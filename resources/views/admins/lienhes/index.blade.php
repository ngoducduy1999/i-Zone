@extends('layouts.admin')

@section('title')

@endsection

@section('css')

@endsection

@section('content')
<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Danh sách liên hệ</h4>
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
                    <h5 class="card-title mb-0">Danh sách người dùng gửi phản hồi</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên người dùng</th>
                                <th>Email người gửi</th>
                                <th>Tin nhắn người dùng phản hồi</th>
                                <th>Trạng thái phản hồi</th>
                                <th>Trạng thái xử lý</th>
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
                                <a href="{{ route('admin.lienhes.phan_hoi.cap_nhat', ['id' => $lienhe->id, 'trang_thai_phan_hoi' => 'resolved']) }}"  role="button"
                                    >
                                    <i class="fas fa-check-circle"></i>Đánh dấu đã xử lý
                                </a>
                                
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
@endsection

@section('js')
  
@endsection