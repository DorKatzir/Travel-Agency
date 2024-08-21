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
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_25">
                        <div class="photo">
                            <a href="destination.html"><img src="uploads/destination-1.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="destination.html">Australia</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_25">
                        <div class="photo">
                            <a href="destination.html"><img src="uploads/destination-2.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="destination.html">Thailand</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_25">
                        <div class="photo">
                            <a href="destination.html"><img src="uploads/destination-3.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="destination.html">Canada</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_25">
                        <div class="photo">
                            <a href="destination.html"><img src="uploads/destination-4.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="destination.html">Dubai</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_25">
                        <div class="photo">
                            <a href="destination.html"><img src="uploads/destination-5.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="destination.html">Portugal</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_25">
                        <div class="photo">
                            <a href="destination.html"><img src="uploads/destination-6.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="destination.html">Morocco</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_25">
                        <div class="photo">
                            <a href="destination.html"><img src="uploads/destination-7.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="destination.html">Venice</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_25">
                        <div class="photo">
                            <a href="destination.html"><img src="uploads/destination-8.jpg" alt=""></a>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="destination.html">Paris</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="see-more">
                        <div class="button-style-1 mt_20">
                            <a href="destinations.html">View All Destinations</a>
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
                        <h2>Popular Packages</h2>
                        <p>
                            Explore our most popular travel packages around the world
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="item pb_25">
                        <div class="photo">
                            <a href="package.html"><img src="uploads/package-1.jpg" alt=""></a>
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
                <div class="col-lg-4 col-md-6">
                    <div class="item pb_25">
                        <div class="photo">
                            <a href="package.html"><img src="uploads/package-2.jpg" alt=""></a>
                            <div class="wishlist">
                                <a href=""><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="text">
                            <div class="price">
                                $230
                            </div>
                            <h2>
                                <a href="package.html">Great Barrier Reef</a>
                            </h2>
                            <div class="review">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                (0 Reviews)
                            </div>
                            <div class="element">
                                <div class="element-left">
                                    <i class="fas fa-plane-departure"></i> Australia
                                </div>
                                <div class="element-right">
                                    <i class="fas fa-calendar-alt date-icon"></i> 23 Sep, 2024
                                </div>
                            </div>
                            <div class="element">
                                <div class="element-left">
                                    <i class="fas fa-users"></i> 12 Persons
                                </div>
                                <div class="element-right">
                                    <i class="fas fa-clock"></i> 3 Days
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item pb_25">
                        <div class="photo">
                            <a href="package.html"><img src="uploads/package-3.jpg" alt=""></a>
                            <div class="wishlist">
                                <a href=""><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="text">
                            <div class="price">
                                $540
                            </div>
                            <h2>
                                <a href="package.html">Similan Islands, Andaman Sea</a>
                            </h2>
                            <div class="review">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                (34 Reviews)
                            </div>
                            <div class="element">
                                <div class="element-left">
                                    <i class="fas fa-plane-departure"></i> Thailand
                                </div>
                                <div class="element-right">
                                    <i class="fas fa-calendar-alt date-icon"></i> 20 Jul, 2024
                                </div>
                            </div>
                            <div class="element">
                                <div class="element-left">
                                    <i class="fas fa-users"></i> 22 Persons
                                </div>
                                <div class="element-right">
                                    <i class="fas fa-clock"></i> 5 Days
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <div class="item">
                            <div class="photo">
                                <img src="uploads/t1.jpg" alt="" />
                            </div>
                            <div class="text">
                                <h4>Robert Krol</h4>
                                <p>CEO, ABC Company</p>
                            </div>
                            <div class="quote">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="description">
                                <p>
                                    Volunteering with this charity has been a transformative experience. Their unwavering dedication to helping those in need is truly inspiring. I'm proud to be part of their mission, witnessing the remarkable impact they make. I'm grateful for the opportunity to contribute to their efforts.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="photo">
                                <img src="uploads/t2.jpg" alt="" />
                            </div>
                            <div class="text">
                                <h4>Sal Harvey</h4>
                                <p>Director, DEF Company</p>
                            </div>
                            <div class="quote">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="description">
                                <p>
                                    As a long-time donor, I'm consistently impressed by this charity's transparency and life-changing impact. They provide real support to those in need, making a meaningful difference in various communities. I'm proud to be a part of their mission and will continue to support their efforts.
                                </p>
                            </div>
                        </div>
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
                <div class="col-lg-4 col-md-6">
                    <div class="item pb_70">
                        <div class="photo">
                            <img src="uploads/blog-1.jpg" alt="" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="post.html">Partnering to create a strong community</a>
                            </h2>
                            <div class="short-des">
                                <p>
                                    In order to create a good community we need to work together. We need to help, support each other and be respectful to each other.
                                </p>
                            </div>
                            <div class="button-style-2 mt_20">
                                <a href="post.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item pb_70">
                        <div class="photo">
                            <img src="uploads/blog-2.jpg" alt="" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="post.html">Turning your emergency donation into instant aid</a>
                            </h2>
                            <div class="short-des">
                                <p>
                                    We are working hard to help the poor people. We are trying to provide them food, shelter, clothing, education and medical assistance.
                                </p>
                            </div>
                            <div class="button-style-2 mt_20">
                                <a href="post.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item pb_70">
                        <div class="photo">
                            <img src="uploads/blog-3.jpg" alt="" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="post.html">Charity provides educational boost for children</a>
                            </h2>
                            <div class="short-des">
                                <p>
                                    In order boost the education of the children, we are providing them books, pens, pencils, notebooks and other necessary things.
                                </p>
                            </div>
                            <div class="button-style-2 mt_20">
                                <a href="post.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

