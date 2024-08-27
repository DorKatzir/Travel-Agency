@extends('front.layout.master')

@section('main_content')

    <div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Destinations</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Destinations</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="destination pt_70 pb_50">
        <div class="container">
            <div class="row">
                @foreach ($destinations as $destination)
                    <div class="col-lg-3 col-md-6">
                        <div class="item pb_25">
                            <div class="photo">
                                <a href="{{ route('destination', $destination->slug) }}"><img src="{{ asset('uploads/'. $destination->featured_photo) }}" alt=""></a>
                            </div>
                            <div class="text">
                                <h2 class="text-capitalize">
                                    <a href="{{ route('destination', $destination->slug) }}">{{ $destination->name }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

     {{-- PAGINATION --}}
     <div class="container pb_50">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                {{ $destinations->links() }}
            </div>
        </div>
    </div>

@endsection
