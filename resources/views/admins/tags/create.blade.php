@extends('layouts.admin')
@section('title', 'Thêm Thẻ Tag')
@section('content')
<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">

        <div class="flex-grow-1">

            <h4 class="fs-18 fw-semibold m-0">Thẻ Tag</h4>

        </div>

    </div>
    <div class="row">

        <div class="col-12">

            <div class="card">
                <div class="card-header">

                    <h5 class="card-title mb-0">Thẻ Tag</h5>

                </div><!-- end card header -->
                <div class="card-body">

                    <div class="row">

                        <div class="col-lg-6">

                            <form action="{{ route('admin.tag.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                
                                <div class="mb-3">
                                    <label for="ten_tag" class="form-label">Tên Thẻ Tag</label>
                                    <input  class="form-control" type="text" id="ten_tag" name="ten_tag"
                                        placeholder="Tên Thẻ Tag" value="{{ old('ten_tag') }}">
                                    @error('ten_tag')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                            
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection