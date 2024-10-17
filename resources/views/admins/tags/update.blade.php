@extends('layouts.admin')
@section('title', 'Sửa thẻ tag')
@section('content')
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Thẻ tag</h4>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thẻ tag</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                    <label for="ten_tag" class="form-label">Tên tag</label>
                                    <input  class="form-control" type="text" id="ten_tag" name="ten_tag"
                                        placeholder="Tên thẻ tag" value="{{ $tag-> ten_tag }}">
                                    @error('ten_tag')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>                                   
                                    <a href="{{ route('admin.tag.index') }}" class="btn btn-dark">Quay lại</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection
