@extends('layouts.admin.main')
@section('title','Savings Transactions History')
@php
    $route = \Request::route()->action['as'] == "admin.transactions.savings";
@endphp
@section('main-content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
            <i class="mdi mdi-history"></i>
            </span> {{ $title }} Transaction's History
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
                        @if($transactions->isEmpty())
                        <tr>
                            <td colspan=10 class="text-center">No Data</td>
                        </tr>
                    @else
                        @foreach ($transactions as $transaction)
                            <tr data-toggle="tooltip" class="data" data-placement="top"
                            title="View Transactions History"
                            style="cursor: pointer"
                            data-url={{ $route ? route('admin.transactions.user.savings',['user'=>$transaction->purpose->user_id])
                            : route('admin.transactions.user.credits',['user'=>$transaction->purpose->user_id]) }}>
                                <td class="capitalize">
                                <img src="{{ asset('admin/assets/images/faces/face1.jpg') }}" class="me-2" alt="image"> {{ $transaction->purpose->user->firstname }} {{ $transaction->purpose->user->lastname }}
                                </td>
                                <td>
                                    {{ $transaction->transaction_type }}
                                </td>
                                <td>
                                    ₱ {{ number_format($transaction->amount, 2, '.', ',')  }}
                                </td>
                                <td>
                                    ₱ {{ number_format($transaction->available_balance, 2, '.', ',')  }}
                                </td>
                                <td> {{ $transaction->created_at->format('l jS \of F Y') }} </td>
                                <td>
                                    {{ $transaction->created_at->format('h:i:s A') }}
                                </td>
                            </tr>
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
@endsection

