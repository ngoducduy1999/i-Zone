@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New User</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="ten">Name:</label>
            <input type="text" name="ten" id="ten" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mat_khau">Password:</label>
            <input type="password" name="mat_khau" id="mat_khau" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="so_dien_thoai">Phone:</label>
            <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control">
        </div>
        <div class="form-group">
            <label for="anh_dai_dien">Avatar:</label>
            <input type="file" name="anh_dai_dien" id="anh_dai_dien" class="form-control">
        </div>
        <div class="form-group">
            <label for="vai_tro">Role:</label>
            <select name="vai_tro" id="vai_tro" class="form-control" required>
                <option value="quan_ly">Admin</option>
                <option value="khach_hang">User</option>
                <option value="nhan_vien">Guest</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dia_chi">Address:</label>
            <textarea name="dia_chi" id="dia_chi" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
