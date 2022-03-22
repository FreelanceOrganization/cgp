@extends('layouts.admin.main')
@section('title','Credits')
@section('main-content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
            <i class="mdi mdi-account-multiple"></i>
            </span> Customer's Credits
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a type="button" class="btn btn-outline-success btn-fw" href="{{ route('admin.customer.newcredits') }}"><i class="mdi mdi-account-plus"></i> New Credit</a>
            </li>
            </ul>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th> Assignee </th>
                        <th> Subject </th>
                        <th> Status </th>
                        <th> Last Update </th>
                        <th> Actions </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                        <img src="{{ asset('admin/assets/images/faces/face1.jpg') }}" class="me-2" alt="image"> David Grey
                        </td>
                        <td> Fund is not recieved </td>
                        <td>
                        <label class="badge badge-gradient-success">DONE</label>
                        </td>
                        <td> Dec 5, 2017 </td>
                        <td>
                            <a href="{{ route('admin.customer.newcredits') }}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit/Update"><i class="mdi mdi-table-edit"></i></a>
                            <a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <img src="{{ asset('admin/assets/images/faces/face2.jpg') }}" class="me-2" alt="image"> Stella Johnson
                        </td>
                        <td> High loading time </td>
                        <td>
                        <label class="badge badge-gradient-warning">PROGRESS</label>
                        </td>
                        <td> Dec 12, 2017 </td>
                        <td>
                            <a href="{{ route('admin.customer.newcredits') }}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit/Update"><i class="mdi mdi-table-edit"></i></a>
                            <a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <img src="{{ asset('admin/assets/images/faces/face3.jpg') }}" class="me-2" alt="image"> Marina Michel
                        </td>
                        <td> Website down for one week </td>
                        <td>
                        <label class="badge badge-gradient-info">ON HOLD</label>
                        </td>
                        <td> Dec 16, 2017 </td>
                        <td>
                            <a href="{{ route('admin.customer.newcredits') }}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit/Update"><i class="mdi mdi-table-edit"></i></a>
                            <a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <img src="{{ asset('admin/assets/images/faces/face5.jpg') }}" class="me-2" alt="image"> John Doe
                        </td>
                        <td> Loosing control on server </td>
                        <td>
                        <label class="badge badge-gradient-danger">REJECTED</label>
                        </td>
                        <td> Dec 3, 2017 </td>
                        <td>
                            <a href="{{ route('admin.customer.newcredits') }}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit/Update"><i class="mdi mdi-table-edit"></i></a>
                            <a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

