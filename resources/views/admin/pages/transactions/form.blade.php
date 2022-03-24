@extends('layouts.admin.main')
@section('title','Transaction Form')
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
                <span></span>Customers/<a href="{{ route('admin.customer.savings') }}">Savings</a>/Deposit <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
            </ul>
        </nav>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Available Balance</h4>
              <h2 class="card-description text-center"> ₱ 500.00 </h2>
              <form class="forms-sample">
                <div class="form-group">
                  <label for="exampleInputEmail1">Amount to Deposit</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" placeholder="1000000">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Total Balance</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" placeholder="100000" disabled>
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <a class="btn btn-light" href="{{ url()->previous() }}">Cancel</a>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection
