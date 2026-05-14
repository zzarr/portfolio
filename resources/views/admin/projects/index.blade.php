@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">

        <!-- ROW-1 OPEN -->
        <div class="row">
            <div class="col-12">
                <div class="card custom-card">
                    <div class="card-header ">
                        <h3 class="card-title ">Projects</h3>
                        <div class="card-options ms-auto">
                            <button id="add__new__list" type="button" class="btn btn-md btn-primary " data-bs-toggle=""
                                data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Add a new Project</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap table-striped" id="projectsTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Github URL</th>
                                    <th scope="col">Is Featured</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW-1 CLOSED -->
    </div>
@endsection
