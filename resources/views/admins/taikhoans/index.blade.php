@extends('layouts.admin')

@section('title')

@endsection

@section('css')

@endsection

@section('content')

<div class="container card mt-3">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="text-center mt-3">
        <h4 class="text-shadow">Quản lý tài khoản người dùng</h4>
    </div>
    <div class="text-end mb-3 ">
        <form action="">
            <input type="search" name="search" id="" class="  " value="{{request('search')}}">
         <button class="btn btn-secondary" type="submit">tìm kiếm</button>
        </form>
    </div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Avatar</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->ten }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->vai_tro) }}</td>
                <td>
                    @if($user->anh_dai_dien)
                        <img src="{{ asset('storage/' . $user->anh_dai_dien) }}" alt="Avatar" width="50">
                    @else
                        No Avatar
                    @endif
                </td>
                <td><div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="thaotac_tk" data-bs-toggle="dropdown" aria-expanded="false">
                      Thao tác
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="thaotac_tk">
                      <li><a class="dropdown-item btn btn-warning" href="{{route('admin.users.show',$user->id)}}">xem chi tiết</a></li>
                      <li>
                        <form action="{{route('admin.users.destroy',$user->id)}}" method="post" onsubmit="return confirm('ban chắc chắn xóa khong?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger " type="submit">Xóa tài khoản</button>
                        </form>
                      </li>

                    </ul>
                  </div>

                    {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    <div>
        {{$users->links('pagination::bootstrap-5')}}
    </div>
</div>
@endsection

@section('js')

@endsection
