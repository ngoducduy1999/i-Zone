@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Details</h1>
    <a href="{{ route('users.index') }}" class="btn btn-primary mb-3">Back to List</a>

    <div class="card">
        <div class="card-header">
            {{ $user->ten }}
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Phone:</strong> {{ $user->so_dien_thoai }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->vai_tro) }}</p>
            <p><strong>Address:</strong> {{ $user->dia_chi }}</p>
            @if($user->anh_dai_dien)
                <p><strong>Avatar:</strong></p>
                <img src="{{ asset('storage/' . $user->anh_dai_dien) }}" alt="Avatar" width="150">
            @endif
        </div>
    </div>
</div>
@endsection
