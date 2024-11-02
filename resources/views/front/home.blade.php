@extends('front.layout.master')

@section('main_content')

    <div class="slider d-none d-md-block">
        <div class="slide-carousel owl-carousel">

            @foreach ($sliders as $slider)

                <div class="item" style="background-image:url({{ asset('uploads/' . $slider->photo) }});">
                    <div class="bg"></div>
                    <div class="text">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="text-wrapper">
                                        <div class="text-content">
                                            <h2>{{ $slider->heading }}</h2>
                                            <p>
                                                {!! $slider->text !!}
                                            </p>
                                            @if ($slider->button_text != null)
                                                <div class="button-style-1 mt_20">
                                                    <a href="{{ $slider->button_link }}" target="_blank">{{ $slider->button_text }}</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>


    @if ($welcomeItem->status == 'show')
        <div class="special mt-5 mt-md-0 pt_70 pb_70">
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


    @if($homeItem->destination_status == 'show')
        <div class="destination pt_70 pb_70">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>{!! $homeItem->destination_heading !!}</h2>
                            <p>{!! $homeItem->destination_subheading !!}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($destinations as $destination)
                        <div class="col-lg-3 col-md-6">
                            <div class="item pb_25">
                                <div class="photo">
                                    <a href="{{ route('destination', $destination->slug) }}"><img src="{{ asset('uploads/'.$destination->featured_photo) }}" alt=""></a>
                                </div>
                                <div class="text">
                                    <h2>
                                        <a href="{{ route('destination', $destination->slug) }}">{{ $destination->name }}</a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="see-more">
                            <div class="button-style-1 mt_20">
                                <a href="{{ route('destinations') }}">View All Destinations</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if($homeItem->feature_status == 'show')
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
    @endif


    @if($homeItem->package_status == 'show')
        <div class="package pt_70 pb_70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>{!! $homeItem->package_heading !!}</h2>
                            <p>{!! $homeItem->package_subheading !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($packages as $package)
                        <div class="col-lg-4 col-md-6">
                            <div class="item pb_25">
                                <div class="photo">
                                    <a href="{{ route('package', $package->slug) }}"><img src="{{ asset('uploads/'. $package->featured_photo) }}" alt=""></a>
                                    <div class="wishlist">
                                        <a href="{{ route('wishlist', $package->id) }}"><i class="far fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="text">
                                    <div class="price">
                                        ${{ $package->price }}
                                        @if ($package->old_price)
                                            <del>${{ $package->old_price }}</del>
                                        @endif
                                    </div>
                                    <h2>
                                        <a href="{{ route('package', $package->slug) }}">{{ $package->name }}</a>
                                    </h2>

                                    @if( $package->total_rating > 0 )
                                        <div class="review">
                                            @php
                                                $avg = $package->total_score / $package->total_rating;
                                            @endphp

                                            @for ($i = 1; $i <= 5; $i++)

                                                @if ($i <= $avg)
                                                    <i class="fas fa-star"></i>
                                                @elseif ($i-0.5 <= $avg)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif

                                            @endfor

                                            <small>( {{ $package->total_rating }} Reviews )</small>
                                        </div>

                                    @else
                                        <div class="review">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="far fa-star"></i>
                                            @endfor
                                            <small>( {{ $package->total_rating }} Reviews )</small>
                                        </div>
                                    @endif

                                    <div class="element">
                                        <div class="element-left">
                                            <i class="fas fa-plane-departure"></i> {{ $package->destination->name }}
                                        </div>
                                        <div class="element-right">
                                            <i class="fas fa-check-circle"></i> {{ $package->package_amenities->count() }} Amenities
                                        </div>
                                    </div>
                                    <div class="element">
                                        <div class="element-left">
                                            <i class="fas fa-calendar-alt"></i> {{ $package->tours->count() }} Tours
                                        </div>
                                        <div class="element-right">
                                            <i class="fas fa-clock"></i> {{ $package->package_itineraries->count() }} Itineraries
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="see-more">
                            <div class="button-style-1 mt_20">
                                <a href="{{ route('packages') }}">View All Packages</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if ($homeItem->testimonial_status == 'show')
        <div class="testimonial pt_70 pb_70" style="background-image: url('{{ asset('uploads/'. $homeItem->testimonial_background) }}');">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="main-header">{!! $homeItem->testimonial_heading !!}</h2>
                        <h3 class="sub-header">{!! $homeItem->testimonial_subheading !!}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial-carousel owl-carousel">

                            @foreach ($testimonials as $testimonial)
                                <div class="item">
                                    <div class="photo">
                                        <img src="{{ asset('uploads/' . $testimonial->photo) }}" alt="" />
                                    </div>
                                    <div class="text">
                                        <h4>{{ $testimonial->name }}</h4>
                                        <p>{{ $testimonial->designation }}</p>
                                    </div>
                                    <div class="quote">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div class="description">
                                        <p>{!! $testimonial->comment !!}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($homeItem->blog_status == 'show')
        <div class="blog pt_70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>{!! $homeItem->blog_heading !!}</h2>
                            <p>{!! $homeItem->blog_subheading !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-lg-4 col-md-6">
                            <div class="item pb_70">
                                <div class="photo">
                                    <img src="{{ asset('uploads/'.$post->photo) }}" alt="" />
                                </div>
                                <div class="text">
                                    <h2>
                                        <a href="{{ route('blog_post', $post->slug) }}">{{ $post->title }}</a>
                                    </h2>
                                    <div class="short-des">{!! $post->short_description !!}</div>
                                    <div class="button-style-2 mt_20">
                                        <a href="{{ route('blog_post', $post->slug) }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@endsection

