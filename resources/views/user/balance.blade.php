@extends('layouts.main')
@include('common.user.header')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/balance.css') }}">
@endpush
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col text-center balance">
                    Balance
                </div>
                <div class="col text-center">
                    Credit
                </div>
            </div>
        </div>

        <p class="text-balance">Available Balance</p>
         <h2> <span>PhP</span> 100.50</h2>
    </div>
    <div class="transaction">
        <div class="container">
            <div class="trans-cont" style="height: 35px;">
                <div>
                    <p style="margin-top: 3.7px">Recent Transactions</p>
                </div>
                <div class="col right">
                    <div id="plus">
                        <h4>+</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="history">
    <div class="first-row trans-cont">
        <div class="format-text">
            <h5 class="add">₱ +500.00</h5>
        </div>
        <div class="format-text">
           <p class="right"> April 06 <br> <small><a href="#" class="details">View Details</a></small></p>
        </div>
    </div>
    <div class="second-row trans-cont">
        <div class="format-text">
            <h5 class="minus">₱ -200.00</h5>
        </div>
        <div class="format-text">
           <p class="right"> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="first-row trans-cont">
        <div class="format-text">
            <h5 class="add">₱ +500.00</h5>
        </div>
        <div class="format-text">
           <p class="right"> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="second-row trans-cont">
        <div class="format-text">
            <h5 class="minus">₱ -200.00</h5>
        </div>
        <div class="format-text">
           <p class="right"> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="first-row trans-cont">
        <div class="format-text">
            <h5 class="add">₱ +500.00</h5>
        </div>
        <div class="format-text">
           <p class="right"> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="second-row trans-cont">
        <div class="format-text">
            <h5 class="minus">₱ -200.00</h5>
        </div>
        <div class="format-text">
           <p class="right"> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="first-row trans-cont">
        <div class="format-text">
            <h5 class="add">₱ +500.00</h5>
        </div>
        <div class="format-text">
           <p class="right"> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="second-row trans-cont">
        <div class="format-text">
            <h5 class="minus">₱ -200.00</h5>
        </div>
        <div class="format-text">
           <p class="right"> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="first-row trans-cont">
        <div class="format-text">
            <h5 class="add">₱ +500.00</h5>
        </div>
        <div class="format-text">
           <p class="right"> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="second-row trans-cont">
        <div class="format-text">
            <h5 class="minus">₱ -200.00</h5>
        </div>
        <div class="format-text">
           <p class="right"> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="first-row trans-cont">
        <div class="format-text">
            <h5 class="add">₱ +500.00</h5>
        </div>
        <div class="format-text">
           <p class="right"> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
    <div class="second-row trans-cont">
        <div class="format-text">
            <h5 class="minus">₱ -200.00</h5>
        </div>
        <div class="format-text">
           <p class="right"> April 06 <br> <span><a href="#" class="details">View Details</a></span></p>
        </div>
    </div>
</div>
@endsection
