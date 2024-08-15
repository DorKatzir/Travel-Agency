
@extends('admin.layout.master')
@section('main_content')

    <section class="section">
        <div class="container container-login">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary border-box">
                        <div class="card-header card-header-auth">
                            <h4 class="text-center">Reset Password</h4>
                        </div>
                        <div class="card-body card-body-auth">
                            <form method="POST" action="">
                                @csrf
                                <div class="form-group">
                                    <input type="password" class="form-control" name="" placeholder="Password" value="" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="" placeholder="Retype Password" value="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg w_100_p">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


