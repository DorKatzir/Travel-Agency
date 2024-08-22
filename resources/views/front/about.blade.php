@extends('front.layout.master')

@section('main_content')

    <div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>About Us</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">About Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($welcomeItem->status == 'show')

        <div class="special pt_70 pb_70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="left-side">
                                        <div class="inner">
                                            <h3>{{ $welcomeItem->title }}</h3>
                                            <div>
                                                {!! $welcomeItem->description !!}
                                            </div>

                                            @if ( $welcomeItem->button_text != '')
                                                <div class="button-style-1 mt_20">
                                                    <a href="{{ $welcomeItem->button_link }}">{{ $welcomeItem->button_text }}</a>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="right-side" style="background-image: url({{ asset('uploads/'. $welcomeItem->photo) }});">
                                        <a class="video-button" href="https://www.youtube.com/watch?v={{ $welcomeItem->video }}"><span></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif


    <div class="why-choose pt_70">
        <div class="container">
            <div class="row">

                @foreach ($features as $feature)

                    <div class="col-md-4">
                        <div class="inner pb_70">
                            <div class="icon">
                                <i class="{{ $feature->icon }}"></i>
                            </div>
                            <div class="text">
                                <h2>{{ $feature->title }}</h2>
                                <p>{!! $feature->description !!}</p>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>


    @if ($counterItem->status == 'show')

        <div class="counter-section pt_70 pb_70">
            <div class="container">
                <div class="row counter-items">
                    <div class="col-md-3 counter-item">
                        <div class="counter">{{ $counterItem->item1_number }}</div>
                        <div class="text text-capitalize">{{ $counterItem->item1_text }}</div>
                    </div>
                    <div class="col-md-3 counter-item">
                        <div class="counter">{{ $counterItem->item2_number }}</div>
                        <div class="text text-capitalize">{{ $counterItem->item2_text }}</div>
                    </div>
                    <div class="col-md-3 counter-item">
                        <div class="counter">{{ $counterItem->item3_number }}</div>
                        <div class="text text-capitalize">{{ $counterItem->item3_text }}</div>
                    </div>
                    <div class="col-md-3 counter-item">
                        <div class="counter">{{ $counterItem->item4_number }}</div>
                        <div class="text text-capitalize">{{ $counterItem->item4_text }}</div>
                    </div>
                </div>
            </div>
        </div>

    @endif


@endsection
