@extends('admin.layout.app')
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
                <div class="card custom-card edit-password-section">
                    <div class="card-header">
                        <div class="card-title">Edit Password and Profile Picture</div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <img alt="User Avatar" class="rounded-circle avatar-lg avatar me-2" src="">
                            <div class="ms-auto mt-xl-2 mt-lg-0 me-lg-2">
                                <a href="editprofile.html" class="btn btn-primary btn-sm mt-1 mb-1"><i
                                        class="fe fe-camera me-1 float-start mt-1"></i>Edit profile</a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-1 mb-1"><i
                                        class="fe fe-camera-off me-1 mt-1 float-start"></i>Delete profile</a>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" value="password">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" value="password">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="javascript:void(0);" class="btn btn-primary">Updated</a>
                        <a href="javascript:void(0);" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
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
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="exampleInputname">First Name</label>
                                    <input type="text" class="form-control" id="exampleInputname"
                                        placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="exampleInputname1">Last Name</label>
                                    <input type="text" class="form-control" id="exampleInputname1"
                                        placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email address">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="exampleInputnumber">Conatct Number</label>
                            <input type="number" class="form-control" id="exampleInputnumber" placeholder="ph number">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">About Me</label>
                            <textarea class="form-control" rows="6">My bio.........</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Website</label>
                            <input class="form-control" placeholder="http://splink.com">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Date Of Birth</label>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="choices" data-type="select-one" tabindex="0" role="listbox"
                                        aria-haspopup="true" aria-expanded="false">
                                        <div class="choices__inner"><select class="form-control choices__input"
                                                data-trigger="" name="choices-single-default" id="choices-single-default"
                                                hidden="" tabindex="-1" data-choice="active">
                                                <option value="0">Date</option>
                                            </select>
                                            <div class="choices__list choices__list--single">
                                                <div class="choices__item choices__item--selectable" data-item=""
                                                    data-id="1" data-value="0" data-custom-properties="null"
                                                    aria-selected="true">Date</div>
                                            </div>
                                        </div>
                                        <div class="choices__list choices__list--dropdown" aria-expanded="false">
                                            <div class="choices__list" role="listbox">
                                                <div id="choices--choices-single-default-item-choice-1"
                                                    class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                    role="option" data-choice="" data-id="1" data-value="1"
                                                    data-select-text="Press to select" data-choice-selectable=""
                                                    aria-selected="true">01</div>
                                                <div id="choices--choices-single-default-item-choice-2"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="2" data-value="2"
                                                    data-select-text="Press to select" data-choice-selectable="">02</div>
                                                <div id="choices--choices-single-default-item-choice-3"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="3" data-value="3"
                                                    data-select-text="Press to select" data-choice-selectable="">03</div>
                                                <div id="choices--choices-single-default-item-choice-4"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="4" data-value="4"
                                                    data-select-text="Press to select" data-choice-selectable="">04</div>
                                                <div id="choices--choices-single-default-item-choice-5"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="5" data-value="5"
                                                    data-select-text="Press to select" data-choice-selectable="">05</div>
                                                <div id="choices--choices-single-default-item-choice-6"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="6" data-value="6"
                                                    data-select-text="Press to select" data-choice-selectable="">06</div>
                                                <div id="choices--choices-single-default-item-choice-7"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="7" data-value="7"
                                                    data-select-text="Press to select" data-choice-selectable="">07</div>
                                                <div id="choices--choices-single-default-item-choice-8"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="8" data-value="8"
                                                    data-select-text="Press to select" data-choice-selectable="">08</div>
                                                <div id="choices--choices-single-default-item-choice-9"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="9" data-value="9"
                                                    data-select-text="Press to select" data-choice-selectable="">09</div>
                                                <div id="choices--choices-single-default-item-choice-10"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="10" data-value="10"
                                                    data-select-text="Press to select" data-choice-selectable="">10</div>
                                                <div id="choices--choices-single-default-item-choice-11"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="11" data-value="11"
                                                    data-select-text="Press to select" data-choice-selectable="">11</div>
                                                <div id="choices--choices-single-default-item-choice-12"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="12" data-value="12"
                                                    data-select-text="Press to select" data-choice-selectable="">12</div>
                                                <div id="choices--choices-single-default-item-choice-13"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="13" data-value="13"
                                                    data-select-text="Press to select" data-choice-selectable="">13</div>
                                                <div id="choices--choices-single-default-item-choice-14"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="14" data-value="14"
                                                    data-select-text="Press to select" data-choice-selectable="">14</div>
                                                <div id="choices--choices-single-default-item-choice-15"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="15" data-value="15"
                                                    data-select-text="Press to select" data-choice-selectable="">15</div>
                                                <div id="choices--choices-single-default-item-choice-16"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="16" data-value="16"
                                                    data-select-text="Press to select" data-choice-selectable="">16</div>
                                                <div id="choices--choices-single-default-item-choice-17"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="17" data-value="17"
                                                    data-select-text="Press to select" data-choice-selectable="">17</div>
                                                <div id="choices--choices-single-default-item-choice-18"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="18" data-value="18"
                                                    data-select-text="Press to select" data-choice-selectable="">18</div>
                                                <div id="choices--choices-single-default-item-choice-19"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="19" data-value="19"
                                                    data-select-text="Press to select" data-choice-selectable="">19</div>
                                                <div id="choices--choices-single-default-item-choice-20"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="20" data-value="20"
                                                    data-select-text="Press to select" data-choice-selectable="">20</div>
                                                <div id="choices--choices-single-default-item-choice-21"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="21" data-value="21"
                                                    data-select-text="Press to select" data-choice-selectable="">21</div>
                                                <div id="choices--choices-single-default-item-choice-22"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="22" data-value="22"
                                                    data-select-text="Press to select" data-choice-selectable="">22</div>
                                                <div id="choices--choices-single-default-item-choice-23"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="23" data-value="23"
                                                    data-select-text="Press to select" data-choice-selectable="">23</div>
                                                <div id="choices--choices-single-default-item-choice-24"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="24" data-value="24"
                                                    data-select-text="Press to select" data-choice-selectable="">24</div>
                                                <div id="choices--choices-single-default-item-choice-25"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="25" data-value="25"
                                                    data-select-text="Press to select" data-choice-selectable="">25</div>
                                                <div id="choices--choices-single-default-item-choice-26"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="26" data-value="26"
                                                    data-select-text="Press to select" data-choice-selectable="">26</div>
                                                <div id="choices--choices-single-default-item-choice-27"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="27" data-value="27"
                                                    data-select-text="Press to select" data-choice-selectable="">27</div>
                                                <div id="choices--choices-single-default-item-choice-28"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="28" data-value="28"
                                                    data-select-text="Press to select" data-choice-selectable="">28</div>
                                                <div id="choices--choices-single-default-item-choice-29"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="29" data-value="29"
                                                    data-select-text="Press to select" data-choice-selectable="">29</div>
                                                <div id="choices--choices-single-default-item-choice-30"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="30" data-value="30"
                                                    data-select-text="Press to select" data-choice-selectable="">30</div>
                                                <div id="choices--choices-single-default-item-choice-31"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="31" data-value="31"
                                                    data-select-text="Press to select" data-choice-selectable="">31</div>
                                                <div id="choices--choices-single-default-item-choice-32"
                                                    class="choices__item choices__item--choice is-selected choices__item--selectable"
                                                    role="option" data-choice="" data-id="32" data-value="0"
                                                    data-select-text="Press to select" data-choice-selectable="">Date
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="choices" data-type="select-one" tabindex="0" role="listbox"
                                        aria-haspopup="true" aria-expanded="false">
                                        <div class="choices__inner"><select class="form-control choices__input"
                                                data-trigger="" name="choices-single-default"
                                                id="choices-single-default2" hidden="" tabindex="-1"
                                                data-choice="active">
                                                <option value="0">Mon</option>
                                            </select>
                                            <div class="choices__list choices__list--single">
                                                <div class="choices__item choices__item--selectable" data-item=""
                                                    data-id="1" data-value="0" data-custom-properties="null"
                                                    aria-selected="true">Mon</div>
                                            </div>
                                        </div>
                                        <div class="choices__list choices__list--dropdown" aria-expanded="false">
                                            <div class="choices__list" role="listbox">
                                                <div id="choices--choices-single-default2-item-choice-1"
                                                    class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                    role="option" data-choice="" data-id="1" data-value="4"
                                                    data-select-text="Press to select" data-choice-selectable=""
                                                    aria-selected="true">Apr</div>
                                                <div id="choices--choices-single-default2-item-choice-2"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="2" data-value="8"
                                                    data-select-text="Press to select" data-choice-selectable="">Aug</div>
                                                <div id="choices--choices-single-default2-item-choice-3"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="3" data-value="12"
                                                    data-select-text="Press to select" data-choice-selectable="">Dec</div>
                                                <div id="choices--choices-single-default2-item-choice-4"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="4" data-value="2"
                                                    data-select-text="Press to select" data-choice-selectable="">Feb</div>
                                                <div id="choices--choices-single-default2-item-choice-5"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="5" data-value="1"
                                                    data-select-text="Press to select" data-choice-selectable="">Jan</div>
                                                <div id="choices--choices-single-default2-item-choice-6"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="6" data-value="7"
                                                    data-select-text="Press to select" data-choice-selectable="">July
                                                </div>
                                                <div id="choices--choices-single-default2-item-choice-7"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="7" data-value="6"
                                                    data-select-text="Press to select" data-choice-selectable="">June
                                                </div>
                                                <div id="choices--choices-single-default2-item-choice-8"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="8" data-value="3"
                                                    data-select-text="Press to select" data-choice-selectable="">Mar</div>
                                                <div id="choices--choices-single-default2-item-choice-9"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="9" data-value="5"
                                                    data-select-text="Press to select" data-choice-selectable="">May</div>
                                                <div id="choices--choices-single-default2-item-choice-10"
                                                    class="choices__item choices__item--choice is-selected choices__item--selectable"
                                                    role="option" data-choice="" data-id="10" data-value="0"
                                                    data-select-text="Press to select" data-choice-selectable="">Mon</div>
                                                <div id="choices--choices-single-default2-item-choice-11"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="11" data-value="11"
                                                    data-select-text="Press to select" data-choice-selectable="">Nov</div>
                                                <div id="choices--choices-single-default2-item-choice-12"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="12" data-value="10"
                                                    data-select-text="Press to select" data-choice-selectable="">Oct</div>
                                                <div id="choices--choices-single-default2-item-choice-13"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="13" data-value="9"
                                                    data-select-text="Press to select" data-choice-selectable="">Sep</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="choices" data-type="select-one" tabindex="0" role="listbox"
                                        aria-haspopup="true" aria-expanded="false">
                                        <div class="choices__inner"><select class="form-control choices__input"
                                                data-trigger="" name="choices-single-default"
                                                id="choices-single-default3" hidden="" tabindex="-1"
                                                data-choice="active">
                                                <option value="0">Year</option>
                                            </select>
                                            <div class="choices__list choices__list--single">
                                                <div class="choices__item choices__item--selectable" data-item=""
                                                    data-id="1" data-value="0" data-custom-properties="null"
                                                    aria-selected="true">Year</div>
                                            </div>
                                        </div>
                                        <div class="choices__list choices__list--dropdown" aria-expanded="false">
                                            <div class="choices__list" role="listbox">
                                                <div id="choices--choices-single-default3-item-choice-1"
                                                    class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                    role="option" data-choice="" data-id="1" data-value="31"
                                                    data-select-text="Press to select" data-choice-selectable=""
                                                    aria-selected="true">1988</div>
                                                <div id="choices--choices-single-default3-item-choice-2"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="2" data-value="30"
                                                    data-select-text="Press to select" data-choice-selectable="">1989
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-3"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="3" data-value="29"
                                                    data-select-text="Press to select" data-choice-selectable="">1990
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-4"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="4" data-value="28"
                                                    data-select-text="Press to select" data-choice-selectable="">1991
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-5"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="5" data-value="27"
                                                    data-select-text="Press to select" data-choice-selectable="">1992
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-6"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="6" data-value="26"
                                                    data-select-text="Press to select" data-choice-selectable="">1993
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-7"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="7" data-value="25"
                                                    data-select-text="Press to select" data-choice-selectable="">1994
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-8"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="8" data-value="24"
                                                    data-select-text="Press to select" data-choice-selectable="">1995
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-9"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="9" data-value="23"
                                                    data-select-text="Press to select" data-choice-selectable="">1996
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-10"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="10" data-value="22"
                                                    data-select-text="Press to select" data-choice-selectable="">1997
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-11"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="11" data-value="21"
                                                    data-select-text="Press to select" data-choice-selectable="">1998
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-12"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="12" data-value="20"
                                                    data-select-text="Press to select" data-choice-selectable="">1999
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-13"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="13" data-value="19"
                                                    data-select-text="Press to select" data-choice-selectable="">2001
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-14"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="14" data-value="18"
                                                    data-select-text="Press to select" data-choice-selectable="">2002
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-15"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="15" data-value="17"
                                                    data-select-text="Press to select" data-choice-selectable="">2003
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-16"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="16" data-value="16"
                                                    data-select-text="Press to select" data-choice-selectable="">2004
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-17"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="17" data-value="15"
                                                    data-select-text="Press to select" data-choice-selectable="">2005
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-18"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="18" data-value="14"
                                                    data-select-text="Press to select" data-choice-selectable="">2006
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-19"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="19" data-value="13"
                                                    data-select-text="Press to select" data-choice-selectable="">2007
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-20"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="20" data-value="12"
                                                    data-select-text="Press to select" data-choice-selectable="">2008
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-21"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="21" data-value="11"
                                                    data-select-text="Press to select" data-choice-selectable="">2009
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-22"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="22" data-value="10"
                                                    data-select-text="Press to select" data-choice-selectable="">2010
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-23"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="23" data-value="9"
                                                    data-select-text="Press to select" data-choice-selectable="">2011
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-24"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="24" data-value="8"
                                                    data-select-text="Press to select" data-choice-selectable="">2012
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-25"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="25" data-value="6"
                                                    data-select-text="Press to select" data-choice-selectable="">2013
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-26"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="26" data-value="5"
                                                    data-select-text="Press to select" data-choice-selectable="">2014
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-27"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="27" data-value="4"
                                                    data-select-text="Press to select" data-choice-selectable="">2015
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-28"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="28" data-value="3"
                                                    data-select-text="Press to select" data-choice-selectable="">2016
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-29"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="29" data-value="2"
                                                    data-select-text="Press to select" data-choice-selectable="">2017
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-30"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="30" data-value="1"
                                                    data-select-text="Press to select" data-choice-selectable="">2018
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-31"
                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                    role="option" data-choice="" data-id="31" data-value="7"
                                                    data-select-text="Press to select" data-choice-selectable="">2102
                                                </div>
                                                <div id="choices--choices-single-default3-item-choice-32"
                                                    class="choices__item choices__item--choice is-selected choices__item--selectable"
                                                    role="option" data-choice="" data-id="32" data-value="0"
                                                    data-select-text="Press to select" data-choice-selectable="">Year
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
