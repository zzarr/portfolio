@extends('admin.layout.app')
@push('vite')
    @vite(['resources/js/appsetting.js'])
@endpush
@section('content')
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div class="">
                <h1 class="page-title fw-semibold fs-20 mb-0"> Edit Profile</h1>
                <div class="">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Edit Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
        <!-- Page Header Close -->


        <!-- ROW-1 OPEN -->
        <div class="row">
            <div class="col-xl-4 col-md-12 col-sm-12">
                <form id="profileUpdateForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card custom-card edit-password-section">
                        <div class="card-header">
                            <div class="card-title">Edit Profile Picture</div>
                        </div>

                        <div class="card-body">
                            <div class="d-flex mb-3 align-items-center">
                                <img id="profilePreview" alt="User Avatar" class="rounded-circle avatar-lg avatar me-2"
                                    src="{{ optional($profile)->photo ? Storage::url($profile->photo) : asset('default-avatar.png') }}"
                                    style="width: 80px; height: 80px; object-fit: cover;">
                                <div class="ms-auto mt-xl-2 mt-lg-0 me-lg-2">
                                    <button id="btnEditProfile" class="btn btn-primary btn-sm mt-1 mb-1">
                                        <i class="fe fe-camera me-1 float-start mt-1"></i>
                                        Edit profile
                                    </button>
                                </div>
                            </div>

                            <!-- hidden input file -->
                            <input type="file" id="profileInput" name="photo" accept="image/*" style="display: none;">

                            <div class="form-group mb-3">
                                <label class="form-label">New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="newPassword"
                                        placeholder="Masukkan password baru" name="password">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                        data-target="#newPassword">
                                        <i class="fe fe-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirmPassword"
                                        placeholder="Konfirmasi password" name="password_confirmation">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                        data-target="#confirmPassword">
                                        <i class="fe fe-eye"></i>
                                    </button>
                                </div>
                                <small id="passwordWarning" class="text-danger d-none">
                                    Password tidak sama
                                </small>
                            </div>
                        </div>


                        <div class="card-footer text-end">
                            <button type="submit" id="btnUpdateProfile" class="btn btn-primary">
                                Updated
                            </button>
                            <button class="btn btn-danger">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
                <div class="card custom-card panel-theme">
                    <div class="card-header">
                        <div class="float-start">
                            <h3 class="card-title">Contact</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body no-padding">
                        <ul class="list-group no-margin">
                            <li class="list-group-item">
                                <a href="javascript:void(0);" class="d-flex">
                                    <i class="bi bi-envelope-fill list-contact-icons border text-center br-100"></i>
                                    <span class="contact-icons  ms-2 my-auto">support@demo.com</span>
                                </a>
                            </li>
                            <li class="list-group-item"><a href="javascript:void(0);" class="d-flex"><i
                                        class="fe fe-globe list-contact-icons border text-center br-100"></i><span
                                        class="contact-icons  ms-2 my-auto"> www.abcd.com</span></a></li>
                            <li class="list-group-item"><a href="javascript:void(0);" class="d-flex"><i
                                        class="fe fe-phone list-contact-icons border text-center br-100"></i> <span
                                        class="contact-icons  ms-2 my-auto">+125 5826 3658 </span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-12 col-sm-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label class="form-label" for="exampleInputname">Full name</label>
                            <input type="text" class="form-control" id="exampleInputname" placeholder="Full Name"
                                value="{{ $profile->full_name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Profession</label>
                            <input type="text" class="form-control" id="profession" placeholder="Profession"
                                value="{{ $profile->profession }}">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                placeholder="email address" value="{{ $profile->email }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="exampleInputnumber">Contact Number</label>
                            <input type="number" class="form-control" id="exampleInputnumber" placeholder="ph number"
                                value="{{ $profile->phone }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">About Me</label>
                            <textarea class="form-control" rows="6">{{ $profile->bio }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Github Profile</label>
                            <input class="form-control" placeholder="http://github.com/username" type="text"
                                value="{{ optional($profile)->github_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Backround image</label>
                            <input type="file" id="input-file-now-custom-1" class="dropify"
                                data-default-file="{{ asset('assets/cover.jpg') }}" name="cover_image" />
                        </div>

                    </div>
                    <div class="card-footer text-end">
                        <a href="javascript:void(0);" class="btn btn-success mt-1">Save</a>
                        <a href="javascript:void(0);" class="btn btn-danger mt-1">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW-1 CLOSED -->

    </div>
@endsection
