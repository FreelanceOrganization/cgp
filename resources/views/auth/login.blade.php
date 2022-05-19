@extends('layouts.main')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush
@section('content')
<div class="container-fluid">
    <div class="image">
        <img src="{{ asset('img/logo.jpg') }}" alt="cgp_logo" class="logo-image">
    </div>
    @include('common.admin.pop-ups.returnMessage')

    <div class="container-sm">
        <form action="{{ route('login.send') }}" method="post">
            @csrf
            <input type="text" class="inputField" id="username" placeholder="Username" name="email">
            @error('email')
                <span style="color:red; font-size:12px">*{{ $message }}</span>
            @enderror
            <input type="password" class="inputField" id="password" placeholder="Password" name="password">
            @error('password')
                <span style="color:red; font-size:12px">*{{ $message }}</span>
            @enderror
            <button type="submit" class="btn">LOG IN</button>
            <div class="info">
                <a href="#" class="frgtPswd">Forgot Password?</a>
            </div>
        </form>
    </div>
</div>
@endsection
