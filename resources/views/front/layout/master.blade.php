@php
    $setting = App\Models\Setting::where('id', 1)->first();
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TripSummit</title>

        @if ($setting->favicon != '')
            <link rel="icon" type="image/png" href="{{ asset('uploads/' . $setting->favicon) }}">
        @else
            <link rel="icon" type="image/png" href="{{ asset('uploads/faviconipsum.svg') }}">
        @endif

        <!-- All CSS -->
        <link rel="stylesheet" href="{{ asset('dist-front/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/bootstrap-datepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/select2-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/iziToast.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/spacing.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/style.css') }}">

        <!-- All Javascripts -->
        <script src="{{ asset('dist-front/js/jquery-3.6.1.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/wow.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/select2.full.js') }}"></script>
        <script src="{{ asset('dist-front/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/moment.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/counterup.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/multi-countdown.js') }}"></script>
        <script src="{{ asset('dist-front/js/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('dist/js/iziToast.min.js') }}"></script>

        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="top">
            <div class="top-container">
                <div class="row top-row-flex">
                    <div class="col-md-6 d-none d-md-block">
                        <ul class="">
                            <li class="phone-text"><i class="fas fa-phone"></i> {{ $setting->header_phone }}</li>
                            <li class="email-text"><i class="fas fa-envelope"></i> {{ $setting->header_email }}</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-6">

                        @if (Auth::guard('web')->check())
                            <ul class="right justify-content-md-end">
                                <li>Hello, {{ Auth::guard('web')->user()->name }}</li>
                                <li class="">
                                    <i class="fas fa-clipboard-check"></i>
                                    <a class="ms-1" href="{{ route('user_dashboard') }}"> Dashboard</a>
                                </li>
                            </ul>
                        @else
                            <ul class="right justify-content-md-end">
                                <li>
                                    <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('registration') }}"><i class="fas fa-user"></i> Sign Up</a>
                                </li>
                            </ul>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        @include('front.layout.nav')


        @yield('main_content')


        <div class="footer pt_70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="item pb_50">
                            <h2 class="heading">Important Pages</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route('home') }}"><i class="fas fa-angle-right"></i> Home</a></li>
                                <li><a href="{{ route('destinations') }}"><i class="fas fa-angle-right"></i> Destinations</a></li>
                                <li><a href="{{ route('packages') }}"><i class="fas fa-angle-right"></i> Packages</a></li>
                                <li><a href="{{ route('blog') }}"><i class="fas fa-angle-right"></i> Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="item pb_50">
                            <h2 class="heading">Useful Links</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route('faq') }}"><i class="fas fa-angle-right"></i> FAQ</a></li>
                                <li><a href="{{ route('terms') }}"><i class="fas fa-angle-right"></i> Terms of Use</a></li>
                                <li><a href="{{ route('privacy') }}"><i class="fas fa-angle-right"></i> Privacy Policy</a></li>
                                <li><a href="{{ route('contact') }}"><i class="fas fa-angle-right"></i> Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="item pb_50">
                            <h2 class="heading">Contact</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                   {{ $setting->footer_address }}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="right">{{ $setting->footer_phone }}</div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="right">{{ $setting->footer_email }}</div>
                            </div>
                            <ul class="social">
                                @if ($setting->facebook)
                                    <li><a href="{{ $setting->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if ($setting->twitter)
                                    <li><a href="{{ $setting->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                @endif
                                @if ($setting->youtube)
                                    <li><a href="{{ $setting->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                @endif
                                @if ($setting->linkedin)
                                    <li><a href="{{ $setting->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                @endif
                                @if ($setting->instagram)
                                    <li><a href="{{ $setting->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    {{-- Subscribe --}}
                    <div class="col-lg-3 col-md-6">
                        <div class="item pb_50">
                            <h2 class="heading">Newsletter</h2>
                            <p>
                                To get the latest news from our website, please
                                subscribe us here:
                            </p>
                            <form action="{{ route('subscriber_submit') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Subscribe Now">
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- End Subscribe --}}
                </div>
            </div>
        </div>

        @if ($setting->copyright)
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="copyright">
                                {{ $setting->copyright }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>

        <script src="{{ asset('dist-front/js/custom.js') }}"></script>

        @if($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                iziToast.show({
                    message: '{{ $error }}',
                    color: 'red',
                    position: 'topRight',
                    zindex: 99999,
                });
            </script>
        @endforeach
        @endif


        @if(session('success'))
            <script>
                iziToast.show({
                    message: '{{ session("success") }}',
                    color: 'green',
                    position: 'topRight',
                    zindex: 99999,
                });
            </script>
        @endif


        @if(session('error'))
            <script>
                iziToast.show({
                    message: '{{ session("error") }}',
                    color: 'red',
                    position: 'topRight',
                    zindex: 99999,
                });
            </script>
        @endif


    </body>
</html>
