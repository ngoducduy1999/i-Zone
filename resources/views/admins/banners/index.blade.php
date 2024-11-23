@extends('layouts.admin')
@section('title', 'Danh sách banner')
@section('content')
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Danh sách banner</h4>
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
                        <div class="d-flex justify-content-between">
                            <div class="mt-2">
                                <h5 class="card-title mb-0">Danh sách banner</h5>
                            </div>
                            <div>
                                <a href="{{ route('admin.banners.create') }}" class="btn btn-success">Thêm mới banner</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Vị trí Banner</th>
                                    <th>Số lượng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($bannersHea) > 0)
                                    <tr>
                                        <td style="text-transform: capitalize;">{{ $bannersHea->first()->vi_tri }}</td>
                                        <td>
                                            {{ $bannersHea->count() }}
                                        </td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ route('admin.banners.show', $bannersHea->first()->vi_tri) }}">Xem</a>
                                        </td>
                                    </tr>
                                @endif
                                @if (count($bannersSide) > 0)
                                    <tr>
                                        <td style="text-transform: capitalize;">{{ $bannersSide->first()->vi_tri }}</td>
                                        <td>
                                            {{ $bannersSide->count() }}
                                        </td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ route('admin.banners.show', $bannersSide->first()->vi_tri) }}">Xem</a>
                                        </td>
                                    </tr>
                                @endif
                                @if (count($bannersFoot) > 0)
                                    <tr>
                                        <td style="text-transform: capitalize;">{{ $bannersFoot->first()->vi_tri }}</td>
                                        <td>
                                            {{ $bannersFoot->count() }}
                                        </td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ route('admin.banners.show', $bannersFoot->first()->vi_tri) }}">Xem</a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
