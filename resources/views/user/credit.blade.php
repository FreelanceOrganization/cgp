@extends('layouts.main')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/balance.css') }}">
@endpush
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col text-center ">
                    <a href="{{ route('customer') }}">
                        Balance
                    </a>
                </div>
                <div class="col text-center balance">
                    <a href="{{ route('credits') }}">
                        Credit
                    </a>
                </div>
            </div>
        </div>

        <p class="text-balance">Available Balance</p>
         <h2> <span>PhP</span> {{ number_format($balance,2,'.',',') }}</h2>
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
    @if($transactions != null)
        @foreach ($transactions as $history)
            @if($loop->index % 2 != 0)
            <div class="second-row trans-cont">
                <div class="format-text">
                    @if ($history->transaction_type == config('const.transactions.add_debts'))
                        <h5 class="add">₱ +{{ number_format($history->amount,2, '.', ',') }}</h5>
                    @else
                        <h5 class="minus">₱ -{{number_format($history->amount,2, '.', ',') }}</h5>
                    @endif
                </div>
                <div class="format-text">
                <p class="right"> {{$history->created_at->format('F d')}}<br> <span><a href="{{ route('details',['transaction' => $history->id]) }}" class="details">View Details</a></span></p>
                </div>
            </div>
            @else
            <div class="first-row trans-cont">
                <div class="format-text">
                    @if ($history->transaction_type == config('const.transactions.add_debts'))
                        <h5 class="add">₱ +{{ number_format($history->amount,2, '.', ',') }}</h5>
                    @else
                        <h5 class="minus">₱ -{{ number_format($history->amount,2, '.', ',') }}</h5>
                    @endif
                </div>
                <div class="format-text">
                <p class="right"> {{$history->created_at->format('F d')}}<br> <small><a href="{{ route('details',['transaction' => $history->id]) }}" class="details">View Details</a></small></p>
                </div>
            </div>
            @endif
        @endforeach
    @endif
</div>
@endsection
