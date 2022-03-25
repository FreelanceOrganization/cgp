@extends('layouts.admin.main')
@section('title','Savings Transactions History')
@section('main-content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
            <i class="mdi mdi-history"></i>
            </span> Savings Transaction's History
        </h3>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
            <div class="card-body">
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                      <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                          <i class="input-group-text border-0 mdi mdi-account-search-outline"></i>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0" placeholder="Search customers">
                      </div>
                    </form>
                </div>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th> Customer </th>
                        <th> Transaction Type </th>
                        <th> Amount </th>
                        <th> Balance </th>
                        <th> Date </th>
                        <th> Time </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr data-toggle="tooltip" data-placement="top" title="View Transactions History" style="cursor: pointer">
                        <td>
                        <img src="{{ asset('admin/assets/images/faces/face1.jpg') }}" class="me-2" alt="image"> David Grey
                        </td>
                        <td>
                            <label class="badge badge-gradient-success">₱ 500.00</label>
                        </td>
                        <td>
                            February 5, 2016
                        </td>
                        <td> December 5, 2017 </td>
                        <td>
                            <a class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="Deposit"><i class="mdi mdi-database-plus"></i></a>
                            <a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Withdraw"><i class="mdi mdi-database-minus"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.customer.newsavings') }}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit/Update"><i class="mdi mdi-table-edit"></i></a>
                            <a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                    <tr data-toggle="tooltip" data-placement="top" title="View Transactions History" style="cursor: pointer">
                        <td>
                        <img src="{{ asset('admin/assets/images/faces/face2.jpg') }}" class="me-2" alt="image"> Stella Johnson
                        </td>
                        <td>
                            <label class="badge badge-gradient-success">₱ 500.00</label>
                        </td>
                        <td>
                            February 5, 2016
                        </td>
                        <td> Dec 12, 2017 </td>
                        <td>
                            <a class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="Deposit"><i class="mdi mdi-database-plus"></i></a>
                            <a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Withdraw"><i class="mdi mdi-database-minus"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.customer.newsavings') }}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit/Update"><i class="mdi mdi-table-edit"></i></a>
                            <a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                    <tr data-toggle="tooltip" data-placement="top" title="View Transactions History" style="cursor: pointer">
                        <td>
                        <img src="{{ asset('admin/assets/images/faces/face3.jpg') }}" class="me-2" alt="image"> Marina Michel
                        </td>
                        <td>
                            <label class="badge badge-gradient-success">₱ 500.00</label>
                        </td>
                        <td>
                            February 5, 2016
                        </td>
                        <td> Dec 16, 2017 </td>
                        <td>
                            <a class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="Deposit"><i class="mdi mdi-database-plus"></i></a>
                            <a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Withdraw"><i class="mdi mdi-database-minus"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.customer.newsavings') }}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit/Update"><i class="mdi mdi-table-edit"></i></a>
                            <a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                    <tr data-toggle="tooltip" data-placement="top" title="View Transactions History" style="cursor: pointer">
                        <td>
                        <img src="{{ asset('admin/assets/images/faces/face5.jpg') }}" class="me-2" alt="image"> John Doe
                        </td>
                        <td>
                            <label class="badge badge-gradient-success">₱ 500.00</label>
                        </td>
                        <td>
                            February 5, 2016
                        </td>
                        <td> Dec 3, 2017 </td>
                        <td>
                            <a class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="Deposit"><i class="mdi mdi-database-plus"></i></a>
                            <a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Withdraw"><i class="mdi mdi-database-minus"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.customer.newsavings') }}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit/Update"><i class="mdi mdi-table-edit"></i></a>
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
