@extends('front.layout.master')

@section('main_content')

    <div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Privacy Policy</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Privacy Policy</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content pt_50 pb_50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    {!! $privacy->privacy !!}
                </div>
            </div>
        </div>
    </div>


@endsection
