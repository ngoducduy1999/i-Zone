@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ten">Name:</label>
            <input type="text" name="ten" id="ten" class="form-control" value="{{ $user->ten }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="mat_khau">Password: <small>(Leave blank if not changing)</small></label>
            <input type="password" name="mat_khau" id="mat_khau" class="form-control">
        </div>
        <div class="form-group">
            <label for="so_dien_thoai">Phone:</label>
            <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control" value="{{ $user->so_dien_thoai }}">
        </div>
        <div class="form-group">
            <label for="anh_dai_dien">Avatar:</label>
            <input type="file" name="anh_dai_dien" id="anh_dai_dien" class="form-control">
            @if($user->anh_dai_dien)
                <img src="{{ asset('storage/' . $user->anh_dai_dien) }}" alt="Avatar" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="vai_tro">Role:</label>
            <select name="vai_tro" id="vai_tro" class="form-control" required>
                <option value="admin" {{ $user->vai_tro == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->vai_tro == 'user' ? 'selected' : '' }}>User</option>
                <option value="guest" {{ $user->vai_tro == 'guest' ? 'selected' : '' }}>Guest</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dia_chi">Address:</label>
            <textarea name="dia_chi" id="dia_chi" class="form-control">{{ $user->dia_chi }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
