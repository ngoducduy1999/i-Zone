@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Management</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create New User</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
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
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
