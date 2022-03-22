@extends('layouts.main')
@include('common.user.header')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/common/detail.css') }}">
@endpush

@section('content')
    <div class="container">
        <div id="detail-form-background-wrapper">
            <div id="detail-form-background">
                <form id="detail-form" action="">
                    <div class="detail-input-wrapper">
                        <label for="purpose" class="detail-input-label">Purpose:</label>
                        <input name="purpose" class="detail-input" type="tex1t" placeholder="Purpose">
                    </div>
                    <div class="detail-input-wrapper">
                        <label for="purpose" class="detail-input-label">Date:</label>
                        <input name="purpose" class="detail-input" type="tex1t" placeholder="Date">
                    </div>
                    <div class="detail-input-wrapper">
                        <label for="purpose" class="detail-input-label">Time:</label>
                        <input name="purpose" class="detail-input" type="tex1t" placeholder="Time">
                    </div>
                    <div class="detail-input-wrapper">
                        <label for="purpose" class="detail-input-label">Amount:</label>
                        <input name="purpose" class="detail-input" type="tex1t" placeholder="Amount">
                    </div>
                    <div class="detail-input-wrapper">
                        <input type="submit" id="detail-button" class="btn btn-primary" value="Back">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
