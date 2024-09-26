@extends('front.layout.master')

@section('main_content')

    <div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Packages</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Packages</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="package pt_70 pb_50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="package-sidebar">
                        <form action="{{ route('packages') }}" method="GET">
                            @csrf
                            <div class="widget">
                                <h2>Search Package</h2>
                                <div class="box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="name" class="form-control" placeholder="Package Name ..." value="{{ request()->get('name') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <h2>Filter by Price</h2>
                                <div class="box">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="min_price" class="form-control" placeholder="Min" value="{{ request()->get('min_price') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="max_price" class="form-control" placeholder="Max" value="{{ request()->get('max_price') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <h2>Filter by Destination</h2>
                                <div class="box">
                                    <select class="form-select" name="destination_id">
                                        <option value="">All</option>
                                        @foreach ($destinations as $destination)
                                            <option value="{{ $destination->id }}" {{ request()->get('destination_id') == $destination->id ? 'selected' : '' }}>{{ $destination->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="widget">
                                <h2>Filter by Review</h2>
                                <div class="box">
                                    <div class="form-check form-check-review form-check-review-1">
                                        <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadiosAll" value="all" @if($form_review == 'all' || $form_review == null) checked @endif>
                                        <label class="form-check-label" for="reviewRadiosAll">
                                            All
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios1" value="5" @if($form_review == '5') checked @endif>
                                        <label class="form-check-label" for="reviewRadios1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios2" value="4.5" @if($form_review == '4.5') checked @endif>
                                        <label class="form-check-label" for="reviewRadios2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios3" value="4" @if($form_review == '4') checked @endif>
                                        <label class="form-check-label" for="reviewRadios3">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios4" value="3.5" @if($form_review == '3.5') checked @endif>
                                        <label class="form-check-label" for="reviewRadios4">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios5" value="3" @if($form_review == '3') checked @endif>
                                        <label class="form-check-label" for="reviewRadios5">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios6" value="2.5" @if($form_review == '2.5') checked @endif>
                                        <label class="form-check-label" for="reviewRadios6">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios7" value="2" @if($form_review == '2') checked @endif>
                                        <label class="form-check-label" for="reviewRadios7">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios8" value="1.5" @if($form_review == '1.5') checked @endif>
                                        <label class="form-check-label" for="reviewRadios8">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios9" value="1" @if($form_review == '1') checked @endif>
                                        <label class="form-check-label" for="reviewRadios9">
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-button">
                                <button class="btn btn-primary">Filter</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-lg-8 col-md-6">
                    {{-- Packages --}}
                    @if($packages->count() > 0)
                        <div class="row">
                            @foreach ($packages as $package)
                                <div class="col-lg-6 col-md-6">
                                    <div class="item pb_25">
                                        <div class="photo">
                                            <a href="{{ route('package', $package->slug) }}"><img src="{{ asset('uploads/'. $package->featured_photo) }}" alt=""></a>
                                            <div class="wishlist">
                                                <a href=""><i class="far fa-heart"></i></a>
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
                    @else
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <h4>No Packages Found</h4>
                            </div>
                        </div>
                    </div>
                    @endif


                    {{-- Pagination --}}
                    <div class="row">
                        <div class="col-md-12">
                            {{ $packages->appends($_GET)->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
