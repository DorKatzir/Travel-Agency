@extends('front.layout.master')

@section('main_content')

    <div class="slider">
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


    <div class="destination pt_70 pb_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Popular Destinations</h2>
                        <p>
                            Explore our most popular travel destinations around the world
                        </p>
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



    <div class="package pt_70 pb_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Latest Packages</h2>
                        <p>
                            Explore our latest travel packages around the world
                        </p>
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
                                    <a href=""><i class="far fa-heart"></i></a>
                                </div>
                            </div>
                            <div class="text">
                                <div class="price">
                                    $150 <del>$250</del>
                                </div>
                                <h2>
                                    <a href="package.html">Venice Grand Canal</a>
                                </h2>
                                <div class="review">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    (4 Reviews)
                                </div>
                                <div class="element">
                                    <div class="element-left">
                                        <i class="fas fa-plane-departure"></i> Italy
                                    </div>
                                    <div class="element-right">
                                        <i class="fas fa-calendar-alt date-icon"></i> 14 Jun, 2024
                                    </div>
                                </div>
                                <div class="element">
                                    <div class="element-left">
                                        <i class="fas fa-users"></i> 25 Persons
                                    </div>
                                    <div class="element-right">
                                        <i class="fas fa-clock"></i> 7 Days
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
                            <a href="packages.html">View All Packages</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="testimonial pt_70 pb_70" style="background-image: url(uploads/testimonial-bg.jpg)">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">Client Testimonials</h2>
                    <h3 class="sub-header">
                        See what our clients have to say about their experience with us
                    </h3>
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



    <div class="blog pt_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Latest News</h2>
                        <p>
                            Check out the latest news and updates from our blog post
                        </p>
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

@endsection

