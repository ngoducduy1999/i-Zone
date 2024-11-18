@extends('layouts.admin')

@section('title')

@endsection

@section('css')

@endsection

@section('content')
<form action="{{ route('admin.reply', $user->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="reply_message">Nội dung phản hồi:</label>
        <textarea name="reply_message" id="reply_message" class="form-control" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
</form>
@endsection

@section('js')
  
@endsection