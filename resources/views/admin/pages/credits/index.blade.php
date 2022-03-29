@extends('layouts.admin.main')
@section('title','Credits')
@push('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/common.css') }}">
@endpush
@section('main-content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
            <i class="mdi mdi-account-multiple"></i>
            </span> Credits Savings
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a type="button" class="btn btn-outline-success btn-fw" href="{{ route('admin.customer.newcredits') }}"><i class="mdi mdi-account-plus"></i> New Customer</a>
            </li>
            </ul>
        </nav>
    </div>

    @include('common.admin.pop-ups.returnMessage')

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
                        <input type="text" class="form-control bg-transparent border-0" id="search" placeholder="Search customers">
                      </div>
                    </form>
                </div>
                <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th> Customer </th>
                        <th> Balance </th>
                        <th> Registered Date </th>
                        <th> Last Update </th>
                        <th> Add/Pay </th>
                        <th> Actions </th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($users->isEmpty())
                            <tr>
                                <td colspan=10 class="text-center">No Data</td>
                            </tr>
                        @else
                            @foreach ($users as $user)
                            @if(!$user->purpose->isEmpty())
                                <tr data-url={{ route('admin.transactions.user.credits',['user'=>$user->id])}}
                                data-toggle="tooltip" class="data" data-placement="top" title="View Transactions History" style="cursor: pointer">
                                    <td class="capitalize">
                                    <img src="{{ asset('admin/assets/images/faces/face1.jpg') }}" class="me-2" alt="image"> {{ $user->firstname }} {{ $user->lastname }}
                                    </td>
                                    <td>
                                        ₱ {{ number_format($user->purpose->first()->available_balance, 2, '.', ',')  }}
                                    </td>
                                    <td>
                                        {{ $user->created_at->toDayDateTimeString() }}
                                    </td>
                                    <td> {{ $user->purpose->first()->updated_at->toDayDateTimeString() }} </td>
                                    <td>
                                        <a href="{{ route('admin.customer.transaction.credits.add',['user' => $user->id]) }}" class="btn btn-outline-success " data-toggle="tooltip" data-placement="top" title="Deposit"><i class="mdi mdi-database-plus"></i></a>
                                        <a href="{{ route('admin.customer.transaction.credits.pay',['user' => $user->id]) }}" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Withdraw"><i class="mdi mdi-database-minus"></i></a>
                                    </td>
                                    <td>
                                        @if(!$user->purpose()->where('type',config('const.purpose.savings'))->first())
                                            <a href="{{ route('admin.customer.savings.apply',['user' => $user->id]) }}" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Apply Credits"><i class="mdi mdi-application"></i></a>
                                        @else
                                            <a href="{{ route('admin.customer.savings.credits.pay',['user' => $user->id]) }}" class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="Pay Credits From Savings"><i class="mdi mdi-transfer-right"></i></a>
                                        @endif
                                        <a href="{{ route('admin.customer.credits.edit',['customer' => $user->id]) }}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit/Update"><i class="mdi mdi-table-edit"></i></a>
                                        <a class="btn btn-outline-danger btn-sm myBtn" data="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@include('common.admin.pop-ups.modal')
@endsection
