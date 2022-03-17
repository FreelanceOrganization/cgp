@extends('layouts.main')
@push('css')
<link rel="stylesheet" href="{{ asset('css/common/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/common/sidebar.css') }}">
@endpush
<header>
    <div class="header-container">
        <div class="container">
            <div class="row">
                <div class="col-9" id="burger-cont">
                    <div>
                        <div class="burgerMenu"></div>
                        <div class="burgerMenu"></div>
                        <div class="burgerMenu"></div>
                    </div>
                </div>
                <div class="col-3" id="profile-cont">
                    <div id="profile-and-name">
                        <div style="height: 53%;">
                            <p class="name">John Doe</p>
                        </div>
                        <div class="profile"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

{{-- side bar --}}

<div class="sidebar-wrapper">
    <div class="container" id="sub-header-info">
        <div class="sub-header-divider">
            <div id="sub-header-logo">
                <img id="logo-image" src="{{ asset('img/logo.jpg') }}" alt="">
            </div>
            <div id="sub-header-name">
                <span id="sub-header-text">CGP Trading & Marketing</span>
            </div>
        </div>
    </div>
</div>
