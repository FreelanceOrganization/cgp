@push('css')
<link rel="stylesheet" href="{{ asset('css/common/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/common/sidebar.css') }}">
@endpush
@section('js')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection

{{-- header --}}
<header>
    <div class="header-container">
        <div class="container">
	@if(isset($user))
            <div class="row">
                <div class="col-9" id="burger-cont">
                    <div id="burger-inner-cont">
                        <div class="burgerMenu"></div>
                        <div class="burgerMenu"></div>
                        <div class="burgerMenu"></div>
                    </div>
                </div>
                <div class="col-3" id="profile-cont">
                    <div id="profile-and-name">
                        <div style="height: 53%;">
                            <p class="name">{{ $user->firstname }} {{ $user->lastname }}</p>
                        </div>
                        <div class="profile"></div>
                    </div>
                </div>
            </div>
	@endif
        </div>
    </div>
</header>

{{-- sidebar --}}
<div id="sidebar-wrapper">
    <div id="sub-header-info">
        {{-- sub header info --}}
        <div class="sub-header-divider">
            <div id="sub-header-logo">
                <img id="logo-image" src="{{ asset('img/logo.jpg') }}" alt="">
            </div>
            <div id="sub-header-name">
                <span id="sub-header-text">CGP Trading & Marketing</span>
            </div>
        </div>
        {{-- sub header profile info --}}
        <div id="sub-header-profile-info">
            <div id="sub-header-profile-img-cont">
                <img id="sub-header-profile-img" src="{{ asset('img/logo.jpg') }}" alt="">
            </div>
            <div id="sub-header-profile-text-cont">
                <p id="sub-header-profile-text">{{ isset($user) ? $user->firstname : ''}} {{ isset($user) ? $user->lastname : ''}}</p>
            </div>
            <span id="sub-header-profile-text-sm">{{ isset($user) ? $user->id : 0 }}</span>
        </div>
        {{-- sidebar-navigation --}}
        <div id="sidebar-nav-cont">
            <ul id="sidebar-nav-items-wrapper">
                <li class="sidebar-nav-item">
                    <a href="{{ route('customer') }}">
                        Account Balance
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="{{ route('credits') }}">
                        Account Credits
                    </a>
                </li>
                @if(isset($user) ? $user->purpose->where('type',config('const.purpose.credits'))->first() : false)
                <li class="sidebar-nav-item">
                    <a href="{{ route('pay.credit') }}">
                        Pay Credit
                    </a>
                </li>
                @endif
                <li class="sidebar-nav-item">
                    <a href="{{ route('about') }}">
                        About
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="{{ route('logout') }}">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
