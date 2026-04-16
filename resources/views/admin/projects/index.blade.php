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
                        <table class="table text-nowrap table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Backend</th>
                                    <th scope="col">Deadline</th>
                                    <th scope="col">Team Members</th>
                                    <th scope="col">Edit Project Details </th>
                                    <th scope="col">list info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>At vero eos et accusamus et iusto odio</td>
                                    <td>PHP</td>
                                    <td>15/11/2018</td>
                                    <td>15 Members</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="javascript:void(0);"><i
                                                class="fe fe-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0);"><i
                                                class="fe fe-trash"></i> Delete</a>
                                    </td>
                                    <td><a class="btn btn-sm btn-secondary" href="javascript:void(0);"><i
                                                class="fe fe-info-circle"></i> Details</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>voluptatum deleniti atque corrupti quos</td>
                                    <td>Angular js</td>
                                    <td>25/11/2018</td>
                                    <td>12 Members</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="javascript:void(0);"><i
                                                class="fe fe-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0);"><i
                                                class="fe fe-trash"></i> Delete</a>
                                    </td>
                                    <td><a class="btn btn-sm btn-secondary" href="javascript:void(0);"><i
                                                class="fe fe-info-circle"></i> Details</a> </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>dignissimos ducimus qui blanditiis praesentium </td>
                                    <td>Java</td>
                                    <td>5/12/2018</td>
                                    <td>20 Members</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="javascript:void(0);"><i
                                                class="fe fe-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0);"><i
                                                class="fe fe-trash"></i> Delete</a>
                                    </td>
                                    <td><a class="btn btn-sm btn-secondary" href="javascript:void(0);"><i
                                                class="fe fe-info-circle"></i> Details</a> </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>deleniti atque corrupti quos dolores </td>
                                    <td>Phython</td>
                                    <td>14/12/2018</td>
                                    <td>10 Members</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="javascript:void(0);"><i
                                                class="fe fe-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0);"><i
                                                class="fe fe-trash"></i> Delete</a>
                                    </td>
                                    <td><a class="btn btn-sm btn-secondary" href="javascript:void(0);"><i
                                                class="fe fe-info-circle"></i> Details</a> </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>et quas molestias excepturi sint occaecati</td>
                                    <td>Phython</td>
                                    <td>4/12/2018</td>
                                    <td>17 Members</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="javascript:void(0);"><i
                                                class="fe fe-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0);"><i
                                                class="fe fe-trash"></i> Delete</a>
                                    </td>
                                    <td><a class="btn btn-sm btn-secondary" href="javascript:void(0);"><i
                                                class="fe fe-info-circle"></i> Details</a> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW-1 CLOSED -->
    </div>
@endsection
