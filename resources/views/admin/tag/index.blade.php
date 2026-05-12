@extends('admin.layout.app')
@push('vite')
    @vite('resources/js/tag.js')
@endpush
@section('content')
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div class="">
                <h1 class="page-title fw-semibold fs-20 mb-0">Tags</h1>
                <div class="">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tags</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="ms-auto pageheader-btn">
                <button type="button" class="btn btn-primary btn-wave waves-effect waves-light me-2" data-bs-toggle="modal"
                    data-bs-target="#add-tag">

                    <i class="fe fe-plus mx-1 align-middle"></i>
                    Tambah Data
                </button>

            </div>
            @include('admin.tag.add-modal')
            @include('admin.tag.edit-modal')
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Tags</div>
                    </div>
                    <div class="card-body">
                        <table id="tags" class="table table-bordered text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
