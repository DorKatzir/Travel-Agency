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
                        <div class="widget">
                            <h2>Search Package</h2>
                            <div class="box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="" class="form-control" placeholder="Package Name ...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h2>Filter by Price</h2>
                            <div class="box">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="" class="form-control" placeholder="Min">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="" class="form-control" placeholder="Max">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h2>Filter by Destination</h2>
                            <div class="box">
                                <select class="form-control" name="destination_id">
                                    <option value="">Select Destination</option>
                                    @foreach ($packages as $package)
                                        <option value="{{ $package->destination->id }}">{{ $package->destination->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="widget">
                            <h2>Filter by Review</h2>
                            <div class="box">
                                <div class="form-check form-check-review form-check-review-1">
                                    <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadiosAll" value="option1" checked>
                                    <label class="form-check-label" for="reviewRadiosAll">
                                        All
                                    </label>
                                </div>
                                <div class="form-check form-check-review">
                                    <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios1" value="option1" checked>
                                    <label class="form-check-label" for="reviewRadios1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </label>
                                </div>
                                <div class="form-check form-check-review">
                                    <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios2" value="option2">
                                    <label class="form-check-label" for="reviewRadios2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </label>
                                </div>
                                <div class="form-check form-check-review">
                                    <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios3" value="option2">
                                    <label class="form-check-label" for="reviewRadios3">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </label>
                                </div>
                                <div class="form-check form-check-review">
                                    <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios4" value="option2">
                                    <label class="form-check-label" for="reviewRadios4">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </label>
                                </div>
                                <div class="form-check form-check-review">
                                    <input name="review" class="form-check-input" type="radio" name="reviewRadios" id="reviewRadios5" value="option2">
                                    <label class="form-check-label" for="reviewRadios5">
                                        <i class="fas fa-star"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-button">
                            <button class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    {{-- Packages --}}
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

                                        @if ($package->total_rating > 0)
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

                                                ({{ $package->total_rating }} Reviews)
                                            </div>

                                        @else
                                            <div class="review">
                                                (0 Reviews)
                                            </div>
                                        @endif

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

                    {{-- Pagination --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pagi">
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
