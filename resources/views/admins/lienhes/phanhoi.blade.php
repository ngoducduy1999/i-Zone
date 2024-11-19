@extends('layouts.admin')

@section('title')

@endsection

@section('css')

@endsection

@section('content')


    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 text-center">Phản hồi khách hàng</h1>
                    </div>
                    <div class="card-body">
                        <p><strong>Email khách hàng:</strong> {{ $lienhes->user->email }}</p>
                        <p><strong>Nội dung phản hồi:</strong> {{ $lienhes->tin_nhan }}</p>
    
                        <form action="{{ route('admin.lienhes.phanhoi.reply.send',$lienhes->id) }}" method="POST">
                            @csrf
    
                            <div class="mb-3">
                                <label for="reply" class="form-label">Phản hồi của bạn:</label>
                                <textarea name="reply" class="form-control" rows="4" required></textarea>
                            </div>
    
                            <button type="submit" class="btn btn-primary w-100">Gửi phản hồi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Link Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
 
@endsection

@section('js')
  
@endsection