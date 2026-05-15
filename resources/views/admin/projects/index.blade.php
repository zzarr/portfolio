@extends('admin.layout.app')
@push('vite')
    @vite('resources/js/project.js')
@endpush
@section('content')
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div class="">
                <h1 class="page-title fw-semibold fs-20 mb-0">Projects</h1>
                <div class="">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Projects</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="ms-auto pageheader-btn">
                <button type="button" class="btn btn-primary btn-wave waves-effect waves-light me-2" data-bs-toggle="modal"
                    data-bs-target="#add-project">

                    <i class="fe fe-plus mx-1 align-middle"></i>
                    Tambah Data
                </button>

            </div>
            @include('admin.projects.add-modal')
            @include('admin.projects.edit-modal')
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Projects</div>
                    </div>
                    <div class="card-body">
                        <table id="projects" class="table table-bordered text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Description</th>
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
