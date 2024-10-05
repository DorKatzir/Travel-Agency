
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Send Email to All</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_subscribers') }}" class="btn btn-primary">
                        Back to Subscribers
                    </a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" action="{{ route('admin_subscribers_send_email_submit') }}">
                                    @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Subject *</label>
                                            <input type="text" class="form-control" name="subject">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Message *</label>
                                            <textarea name="message" class="form-control h_150" cols="30" rows="10"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Send Email</button>
                                        </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection



