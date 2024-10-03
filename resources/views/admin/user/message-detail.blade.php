
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="message-item">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>

@endsection
