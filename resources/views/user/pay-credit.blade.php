@extends('layouts.main')
@include('common.user.header')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/common/form.css') }}">
@endpush

@section('content')
    <div class="container">
        <div class="form-form-background-wrapper" style="height: 500px">
            @include('common.admin.pop-ups.returnMessage')
            <div class="form-form-background">
                <form class="form-form" action="{{ route('pay.credit.store') }}" method="post">
                    @csrf
                    <div class="form-balance-wrapper">
                        <label for="" class="form-balance-label">Available Balance</label>
                        <label for="" class="form-available-amount">Php {{ $balance }}</label>
                    </div>
                    <div class="form-balance-wrapper">
                        <label for="" class="form-balance-label">Available Balance</label>
                        <label for="" class="form-credit-amount">Php {{ $credits }}</label>
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Enter amount" name="amount" class="form-control custom-btn">
                        @error('amount')
                            <span style="color:red; font-size:12px">*{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-input-wrapper">
                        <label for="purpose" class="form-input-label" style="width: 51vw;text-align: justify;font-size: 14px;">Available balance:</label>
                        <input class="form-input" style="color: black;font-size: 14px;" type="tex1t" value="Php {{ $balance }}" readonly>
                    </div>
                    <div class="form-input-wrapper">
                        <label for="purpose" class="form-input-label" style="width: 51vw;text-align: justify;font-size: 14px;">Credit Balance:</label>
                        <input class="form-input" style="color: black;font-size: 14px;" type="tex1t" value="Php {{ $credits }}" readonly>
                    </div>
                    <div class="form-input-wrapper">
                        <input type="submit" class="form-button btn btn-primary" style="margin-top: 20px" value="Pay Credit" readonly>
                    </div>
                    <div class="form-input-wrapper">
                        <button class="form-button btn btn-primary" style="margin-top: 20px">Back</button>
                        {{-- <input type="submit" class="" style="margin-top: 20px" value="Back" readonly> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
