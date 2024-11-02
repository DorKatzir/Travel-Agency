
<div class="navbar-area" id="stickymenu">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('home') }}" class="logo mt-1">
            @if ($setting->logo != '')
                <img src="{{ asset('uploads/' . $setting->logo) }}" alt="logo">
            @else
                <img src="{{ asset('uploads/logoipsum.svg') }}" alt="">
            @endif
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    @if ($setting->logo != '')
                        <img src="{{ asset('uploads/' . $setting->logo) }}" alt="logo">
                    @else
                        <img src="{{ asset('uploads/logoipsum.svg') }}" alt="">
                    @endif
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }} ">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>

                        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                            <a href="{{ route('about') }}" class="nav-link">About</a>
                        </li>

                        <li class="nav-item {{ Request::is('destinations') || Request::is('destination/*') ? 'active' : '' }}">
                            <a href="{{ route('destinations') }}" class="nav-link">Destinations</a>
                        </li>

                        <li class="nav-item {{ Request::is('packages') || Request::is('package/*') ? 'active' : '' }}">
                            <a href="{{ route('packages') }}" class="nav-link">Packages</a>
                        </li>

                        <li class="nav-item {{ Request::is('team') || Request::is('team-member/*') ? 'active' : '' }}">
                            <a href="{{ route('team') }}" class="nav-link">Team</a>
                        </li>

                        <li class="nav-item {{ Request::is('faq') ? 'active' : ''}}">
                            <a href="{{ route('faq') }}" class="nav-link">FAQ</a>
                        </li>

                        <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
                            <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                        </li>

                        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                            <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
