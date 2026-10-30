@extends('admin.layout.app')
@push('vite')
    @vite('resources/js/skills.js')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h1 class="page-title fw-semibold fs-20 mb-0">Skills</h1>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Skills</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto pageheader-btn">
                <button type="button" id="addSkillButton" class="btn btn-primary btn-wave me-2"
                    data-bs-toggle="modal" data-bs-target="#add-skill" @disabled($categories->isEmpty())>
                    <i class="fe fe-plus mx-1 align-middle"></i>
                    Tambah Skill
                </button>
                <button type="button" class="btn btn-primary btn-wave waves-effect waves-light me-2"
                    data-bs-toggle="modal" data-bs-target="#add-skill-category">
                    <i class="fe fe-plus mx-1 align-middle"></i>
                    Tambah Kategori
                </button>
            </div>
            @include('admin.skills.add-modal')
            @include('admin.skills.edit-modal')
            @include('admin.skills.add-category-modal')
            @include('admin.skills.edit-category-modal')
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Skills</div>
                    </div>
                    <div class="card-body">
                        <table id="skills" class="table table-bordered text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Skill</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header"><div class="card-title">Kategori</div></div>
                    <div class="card-body">
                        <table id="skill-categories" class="table table-bordered text-nowrap" style="width:100%">
                            <thead><tr><th>NO</th><th>Nama</th><th>Jumlah Skill</th><th>Action</th></tr></thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
