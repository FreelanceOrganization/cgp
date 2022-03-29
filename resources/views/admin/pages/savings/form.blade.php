@extends('layouts.admin.main')
@section('title','New Savings')
@php
    $route = \Request::route()->action['as'] == "admin.customer.edit";
    if($route){
        $address = $customer->address()->first();
    }
@endphp
@section('main-content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
            <i class="mdi mdi-account-plus"></i>
            </span>
            @if($route)
                Edit Customer's Information
            @else
                New Customer's Savings
            @endif
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Customers/<a href="{{ route('admin.customer.savings') }}">Savings</a>
                @if($route)
                /Edit
                @else
                /Add
                @endif
                <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
            </ul>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-body">
                <form class="form-sample" method="post"  action="{{ $route ? route('admin.customer.edit.store',['customer'=>$customer->id]) : route('admin.customer.savings.store') }}">
                    @csrf
                    @include('admin.pages.register-form.form')
                    <div class="row">
                        <div class="col-md-6">
                        <button type="submit" class="btn btn-gradient-success me-2">Submit</button>
                        <a type="button" class="btn btn-gradient-danger me-2" href="{{ route('admin.customer.savings') }}">Cancel</a>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
