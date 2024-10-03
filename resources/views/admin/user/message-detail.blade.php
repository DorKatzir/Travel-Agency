
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">

            <div class="section-header justify-content-between">
                <h1>Massages from </h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_message') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Back to Messages
                    </a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">

                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                {{-- Messages --}}
                                <div class="rounded message-item">
                                    <div class="message-top">
                                        <div class="left">
                                            <img src="{{ asset('uploads/default.png') }}" alt="">
                                        </div>
                                        <div class="right">
                                            <h4 class="text-capitalize">Name</h4>
                                            <h5 class="text-capitalize">User</h5>
                                            <div class="date-time">
                                                <small>
                                                    <strong>
                                                        Date
                                                    </strong>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-bottom">
                                        <p>Comment</p>
                                    </div>
                                </div>
                                {{-- End Messages --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                {{-- Start Form --}}
                                    <h3>Write a message</h3>
                                    <form action="" method="POST">

                                        <div class="mb-2">
                                            <textarea name="comment" class="form-control h-150" cols="30" rows="10" placeholder="Write your message here"></textarea>
                                        </div>
                                        <div class="mb-2">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                {{-- End Form --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>

    </div>

@endsection
