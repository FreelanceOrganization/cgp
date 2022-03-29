@extends('layouts.main')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush
@section('content')
<div class="container-fluid">
    <div class="image">
        <img src="{{ asset('img/logo.jpg') }}" alt="cgp_logo" class="logo-image">
    </div>

    <div class="container-sm">
        <form action="">
            <input type="text" class="inputField" id="username" placeholder="Username">
            <input type="password" class="inputField" id="password" placeholder="Password">
            <button type="submit" class="btn">LOG IN</button>
            <div class="info">
                <a href="#" class="frgtPswd">Forgot Password?</a>
            </div>
        </form>
    </div>
</div>
@endsection
