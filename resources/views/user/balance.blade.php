@extends('layouts.main')
@include('common.user.header')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/balance.css') }}">
@endpush
@section('content')
    <div class="content">
        <div class="row">
            <div class="col text-center balance">
                Balance
            </div>
            <div class="col text-center">
                Credit
            </div>
        </div>

        <p class="text-balance">Available Balance</p>
         <h2> <span>PhP</span> 100.50</h2>
    </div>
<div class="container">
    <div class="transaction">
        <div class="row">
            <div class="col">
                <p>Recent Transactions</p>
            </div>
            <div class="col right">
                <h4>+</h4>
            </div>
        </div>
    </div>
</div>
<div class="history">
    <div class="row first-row">
        <div class="col left">
            <h5 class="add">₱ +500.00</h5>
        </div>
        <div class="col right">
           <p> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
      <div class="row second-row">
        <div class="col left">
           <h5 class="minus"> ₱ -200.00</h5>
        </div>
        <div class="col right">
            <p> April 01 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="row first-row">
        <div class="col left">
            <h5 class="add">₱ +500.00</h5>
        </div>
        <div class="col right">
           <p> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
      <div class="row second-row">
        <div class="col left">
           <h5 class="minus"> ₱ -200.00</h5>
        </div>
        <div class="col right">
            <p> April 01 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="row first-row">
        <div class="col left">
            <h5 class="add">₱ +500.00</h5>
        </div>
        <div class="col right">
           <p> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
      <div class="row second-row">
        <div class="col left">
           <h5 class="minus"> ₱ -200.00</h5>
        </div>
        <div class="col right">
            <p> April 01 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="row first-row">
        <div class="col left">
            <h5 class="add">₱ +500.00</h5>
        </div>
        <div class="col right">
           <p> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
      <div class="row second-row">
        <div class="col left">
           <h5 class="minus"> ₱ -200.00</h5>
        </div>
        <div class="col right">
            <p> April 01 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="row first-row">
        <div class="col left">
            <h5 class="add">₱ +500.00</h5>
        </div>
        <div class="col right">
           <p> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
      <div class="row second-row">
        <div class="col left">
           <h5 class="minus"> ₱ -200.00</h5>
        </div>
        <div class="col right">
            <p> April 01 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
</div>
@endsection
