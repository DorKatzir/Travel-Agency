
@extends('admin.layout.master')
@section('main_content')

    <section class="section">
        <div class="container container-login">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary border-box">
                        <div class="card-header card-header-auth">
                            <h4 class="text-center">Admin Panel Login</h4>
                        </div>
                        <div class="card-body card-body-auth">
                            <form method="POST" action="{{ route('admin_login_submit') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email Address" autofocus value="admin@gmail.com">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password"  placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg w_100_p">
                                        Login
                                    </button>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <a href="{{ route('admin_forget_password') }}">
                                            Forget Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


