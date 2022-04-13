@extends('layouts.main')
@include('common.user.header')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/common/form.css') }}">
@endpush

@section('content')
    <div class="container">
        <div class="form-form-background-wrapper">
            <div class="form-form-background">
                <form class="form-form" action="{{ route('customer') }}">
                    <div class="form-input-wrapper">
                        <label for="purpose" class="form-input-label">Purpose:</label>
                        <input name="purpose" class="form-input" type="tex1t" placeholder="Purpose" value="{{ $transaction->transaction_type }}" readonly>
                    </div>
                    <div class="form-input-wrapper">
                        <label for="purpose" class="form-input-label">Date:</label>
                        <input name="purpose" class="form-input" type="tex1t" placeholder="Date" value="{{ $transaction->created_at->format('l jS \of F Y') }}" readonly>
                    </div>
                    <div class="form-input-wrapper">
                        <label for="purpose" class="form-input-label">Time:</label>
                        <input name="purpose" class="form-input" type="tex1t" placeholder="Time" value="{{ $transaction->created_at->setTimezone('Singapore')->format('h:i:s A') }}" readonly>
                    </div>
                    <div class="form-input-wrapper">
                        <label for="purpose" class="form-input-label">Amount:</label>
                        <input name="purpose" class="form-input" type="tex1t" placeholder="Amount" value="{{ $transaction->amount }}" readonly>
                    </div>
                    <div class="form-input-wrapper">
                        <input type="submit" class="form-button btn btn-primary" value="Back" readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
