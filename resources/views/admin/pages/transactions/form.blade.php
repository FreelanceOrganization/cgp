@extends('layouts.admin.main')
@section('title','Transaction Form')
@php
    $route = \Request::route()->action['as'] == "admin.customer.transaction.deposit" || \Request::route()->action['as'] == "admin.customer.transaction.withdraw";
@endphp
@section('main-content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
            <i class="mdi mdi-account-multiple"></i>
            </span> Customer's Transaction Form
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Customers/<a href="{{ $route ? route('admin.customer.savings') : route('admin.customer.credits') }}">{{ $title }}</a>/{{ $label }} <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
            </ul>
        </nav>
    </div>

    @include('common.admin.pop-ups.returnMessage')

    <div class="container d-flex justify-content-center">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Available Balance</h4>
              <h2 class="card-description text-center"> ₱ {{ $user->purpose->first()->available_balance }} </h2>
              <form class="forms-sample" action="{{ $route ? route('admin.customer.transaction.deposit.store',['user'=>$user->id]) : route('admin.customer.transaction.credits.store',['user'=>$user->id]) }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Amount to {{ $label }}</label>
                  <input type="number" name="amount" class="form-control @error('amount') invalid  @enderror" id="amount" step=".01"  placeholder="1000.00">
                  @error('amount')
                    <span style="color:red; font-size:12px">*{{ $message }}</span>
                  @enderror
                  <input type="hidden" name="label" value="{{ $label }}">
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <a class="btn btn-light" href="{{ $route ? route('admin.customer.savings') : route('admin.customer.credits') }}">Cancel</a>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection
