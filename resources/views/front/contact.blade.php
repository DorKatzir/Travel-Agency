@extends('front.layout.master')

@section('main_content')

    <div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Contact Us</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact pt_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact-form pb_70">

                        <form action="{{ route('contact_submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea class="form-control" rows="3" name="message"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit">
                                    Send Message
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    @if ($contactItem->map_code != null)
                        <div class="map">
                            {!! $contactItem->map_code !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
