@extends('layouts.main')
@include('common.user.header')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/common/form.css') }}">
@endpush

@section('content')
    <div class="container">
        <div class="form-form-background-wrapper" style="height: 500px">
            <div class="form-form-background">
                <form class="form-form" action="">
                    <div class="form-balance-wrapper">
                        <label for="" class="form-balance-label">Available Balance</label>
                        <label for="" class="form-available-amount">Php 500.00</label>
                    </div>
                    <div class="form-balance-wrapper">
                        <label for="" class="form-balance-label">Available Balance</label>
                        <label for="" class="form-credit-amount">Php 500.00</label>
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Enter amount" class="form-control custom-btn">
                    </div>
                    <div class="form-input-wrapper">
                        <label for="purpose" class="form-input-label" style="width: 51vw;text-align: justify;font-size: 14px;">Available balance:</label>
                        <input name="purpose" class="form-input" style="color: black;font-size: 14px;" type="tex1t" value="Php 500.00" readonly>
                    </div>
                    <div class="form-input-wrapper">
                        <label for="purpose" class="form-input-label" style="width: 51vw;text-align: justify;font-size: 14px;">Credit Balance:</label>
                        <input name="purpose" class="form-input" style="color: black;font-size: 14px;" type="tex1t" value="Php 500.00" readonly>
                    </div>
                    <div class="form-input-wrapper">
                        <input type="submit" class="form-button btn btn-primary" style="margin-top: 20px" value="Pay Credit" readonly>
                    </div>
                    <div class="form-input-wrapper">
                        <input type="submit" class="form-button btn btn-primary" style="margin-top: 20px" value="Back" readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
