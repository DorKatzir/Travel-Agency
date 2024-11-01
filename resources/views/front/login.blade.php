@extends('front.layout.master')
@section('main_content')

    <div class="page-top" style="background-image: url({{ asset('uploads/' . $settingItem->banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Login</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Login</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content pt-4 pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-form">
                        {{-- Gmail Login --}}
                        <div class="px-6 py-2 d-flex align-items-center justify-content-center">
                            <a href="{{ route('auth.google') }}">
                                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                            </a>
                        </div>

                        <div class="d-flex gap-4 align-items-center justify-content-between pt-2 pb-2">
                           <hr class="hr">
                           <small class="text-muted">OR</small>
                           <hr class="hr">
                        </div>

                        <form class="pb-4" action="{{ route('login_submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                             <div class="d-flex gap-4 align-items-center justify-content-between">
                                <button type="submit" class="btn btn-primary flex-grow-1">
                                    Login
                                </button>

                                <a href="{{ route('forget_password') }}" class="primary-color">Forgot Password?</a>
                            </div>

                        </form>

                        <hr class="">
                        <div class="pt-2 pb-5 d-flex gap-4 align-items-center justify-content-between">
                            <span>Don't have an account?</span>
                            <a href="{{ route('registration') }}" class="primary-color">Create Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
