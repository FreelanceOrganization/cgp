@extends('layouts.main')
@include('common.user.header')
<style>
    .content{
        background: #5CD225;
        color:white;
        text-align: center;
    }

    .text-center{
        padding-top: 15px;
        padding-bottom: 7px;
        border-bottom: 2px solid dimgray;
        width: 100%;
        display: block;
    }
    .text-balance {
        margin-top: 1rem !important;
        margin-bottom: 0rem !important;
    }
    h2{
        padding-bottom: 15px;
    }
    span{
        font-size: 15px;
    }
</style>
@section('content')
    <div class="content">
        <div class="row">
            <div class="col text-center">
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
            <div class="col">
                <h4>+</h4>
            </div>
        </div>
    </div>
    <div class="history">

    </div>
</div>
@endsection
