@extends('front.layout.master')

@section('main_content')

    <div class="page-top page-top-package" style="background-image: url({{ asset('uploads/'. $package->banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-capitalize">{{ $package->name }}</h2>
                    <h3 class="text-capitalize"><i class="fas fa-plane-departure"></i> {{ $package->destination->name }}, {{ $package->destination->country }}</h3>

                    @if ($package->total_rating > 0)
                        <div class="review">
                            <div class="set">

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

                            </div>
                            <span>({{ $avg }} out of 5)</span>
                        </div>
                    @endif

                    <div class="price">
                        ${{ $package->price }}
                        @if ($package->old_price)
                            <del>${{ $package->old_price }}</del>
                        @endif
                    </div>
                    <div class="person">
                        per person
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="package-detail pt_50 pb_50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">


                    <div class="main-item mb_50">

                        <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="tab-1" data-bs-toggle="tab" data-bs-target="#tab-1-pane" type="button" role="tab" aria-controls="tab-1-pane" aria-selected="true">Detail</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab-2" data-bs-toggle="tab" data-bs-target="#tab-2-pane" type="button" role="tab" aria-controls="tab-2-pane" aria-selected="false">Itinerary</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab-3" data-bs-toggle="tab" data-bs-target="#tab-3-pane" type="button" role="tab" aria-controls="tab-3-pane" aria-selected="false">Location</button>
                            </li>
                            @if ( $package_photos->count() > 0 || $package_videos->count() > 0 )
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab-4" data-bs-toggle="tab" data-bs-target="#tab-4-pane" type="button" role="tab" aria-controls="tab-4-pane" aria-selected="false">Gallery</button>
                                </li>
                            @endif

                            @if ( $package_faqs->count() > 0 )
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab-5" data-bs-toggle="tab" data-bs-target="#tab-5-pane" type="button" role="tab" aria-controls="tab-5-pane" aria-selected="false">FAQ</button>
                            </li>
                            @endif

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab-6" data-bs-toggle="tab" data-bs-target="#tab-6-pane" type="button" role="tab" aria-controls="tab-6-pane" aria-selected="false">Review</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab-7" data-bs-toggle="tab" data-bs-target="#tab-7-pane" type="button" role="tab" aria-controls="tab-7-pane" aria-selected="false">Enquery</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab-8" data-bs-toggle="tab" data-bs-target="#tab-8-pane" type="button" role="tab" aria-controls="tab-8-pane" aria-selected="false">Booking</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="tab-1-pane" role="tabpanel" aria-labelledby="tab-1" tabindex="0">
                                <!-- Detail -->
                                <h2 class="mt_30">Detail</h2>
                                {!! $package->description !!}

                                <h2 class="mt_30">Includes</h2>
                                <div class="amenity">
                                    <div class="row">
                                        @foreach ($package_amenities_include as $item_include)
                                            <div class="col-lg-3 mb_15">
                                                <i class="fas fa-check"></i> {{ $item_include->amenity->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <h2 class="mt_30">Excludes</h2>
                                <div class="amenity">
                                    <div class="row">
                                        @foreach ($package_amenities_exclude as $item_exclude)
                                            <div class="col-lg-3 mb_15">
                                                <i class="fas fa-times"></i> {{ $item_exclude->amenity->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- // Detail -->


                            </div>

                            <div class="tab-pane fade" id="tab-2-pane" role="tabpanel" aria-labelledby="tab-2" tabindex="0">
                                <!-- Itinerary -->
                                <h2 class="mt_30">Itinerary</h2>
                                <div class="tour-plan">

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            @foreach ($package_itineraries as $itinerary)
                                                <tr>
                                                    <td class="text-capitalize"><b>{{ $itinerary->name }}</b></td>
                                                    <td>{!! $itinerary->description !!}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>

                                <!-- // Itinerary -->
                            </div>

                            <div class="tab-pane fade" id="tab-3-pane" role="tabpanel" aria-labelledby="tab-3" tabindex="0">
                                @if ($package->map)
                                    <!-- Location -->
                                    <h2 class="mt_30">Location Map</h2>
                                    <div class="location-map">
                                        {!! $package->map !!}
                                    </div>
                                    <!-- // Location -->
                                @endif
                            </div>

                            <div class="tab-pane fade" id="tab-4-pane" role="tabpanel" aria-labelledby="tab-4" tabindex="0">
                                <!-- Gallery -->
                                @if ( $package_photos->count() > 0 )
                                    <h2 class="mt_30">
                                        Photos
                                    </h2>
                                    <div class="photo-all">
                                        <div class="row">
                                            @foreach ($package_photos as $package_photo)
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="item">
                                                        <a href="{{ asset('uploads/'.$package_photo->photo) }}" class="magnific">
                                                            <img src="{{ asset('uploads/'.$package_photo->photo) }}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if ( $package_videos->count() > 0 )
                                    <h2 class="mt_30">
                                        Videos
                                    </h2>
                                    <div class="video-all">
                                        <div class="row">
                                            @foreach ($package_videos as $package_video)
                                            <div class="col-md-6 col-lg-6">
                                                <div class="item">
                                                    <a class="video-button" href="http://www.youtube.com/watch?v={{ $package_video->video }}">
                                                        <img src="http://img.youtube.com/vi/{{ $package_video->video }}/0.jpg" alt="">
                                                        <div class="icon">
                                                            <i class="far fa-play-circle"></i>
                                                        </div>
                                                        <div class="bg"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- // Gallery -->
                            </div>



                            <div class="tab-pane fade" id="tab-5-pane" role="tabpanel" aria-labelledby="tab-5" tabindex="0">
                                <!-- FAQ -->
                                <h2 class="mt_30">Frequently Asked Questions</h2>
                                <div class="faq-package">
                                    <div class="accordion" id="accordionExample">
                                        @foreach ($package_faqs as $package_faq)
                                            <div class="accordion-item mb_30">
                                                <h2 class="accordion-header" id="heading_1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse_{{ $loop->iteration }}">
                                                        {{ $package_faq->question }}
                                                    </button>
                                                </h2>
                                                <div id="collapse_{{ $loop->iteration }}" class="accordion-collapse collapse" aria-labelledby="heading_{{ $loop->iteration }}" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        {!! $package_faq->answer !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- // FAQ -->
                            </div>



                            <div class="tab-pane fade" id="tab-6-pane" role="tabpanel" aria-labelledby="tab-6" tabindex="0">
                                <!-- Review -->
                                <div class="review-package">

                                    <h2>Reviews ({{ $reviews->count() }})</h2>

                                    @foreach ($reviews as $review)
                                        <div class="review-package-section">
                                            <div class="review-package-box d-flex justify-content-start">
                                                <div class="left">
                                                    @if ($review->user->photo)
                                                        <img src="{{ asset('uploads/' . $review->user->photo) }}" alt="">
                                                    @else
                                                        <img src="{{ asset('uploads/default.png') }}" alt="">
                                                    @endif

                                                </div>
                                                <div class="right">
                                                    <div class="name">{{ $review->user->name }}</div>
                                                    <div class="date">{{ $review->created_at->format('d M Y') }}</div>

                                                    <div class="review mb-2">
                                                        <div class="set">


                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $review->rating)
                                                                    <i class="fas fa-star"></i>
                                                                @else
                                                                    <i class="far fa-star"></i>
                                                                @endif
                                                            @endfor

                                                        </div>

                                                    </div>

                                                    <div class="text">
                                                        {!! $review->comment !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                    <div class="mt_40"></div>

                                    <h2>Leave Your Review</h2>
                                    @if (Auth::guard('web')->check())

                                        @php
                                            $allowed_review = App\Models\Booking::where('user_id', Auth::guard('web')->user()->id)->where('package_id', $package->id)->where('payment_status', 'Completed')->count();
                                        @endphp

                                        @if ($allowed_review > 0)

                                            @php
                                                App\Models\Review::where('user_id', Auth::guard('web')->user()->id)->where('package_id', $package->id)->count() > 0 ? $reviewed = true : $reviewed = false;
                                            @endphp

                                            @if (!$reviewed)
                                                <form method="POST" action="{{ route('review_submit') }}">
                                                    @csrf
                                                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                                                        <div class="mb-3">
                                                            <div class="give-review-auto-select">
                                                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                                                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                                                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                                                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                                                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                                                            </div>
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', (event) => {
                                                                    const stars = document.querySelectorAll('.star-rating label');
                                                                    stars.forEach(star => {
                                                                        star.addEventListener('click', function() {
                                                                            stars.forEach(s => s.style.color = '#ccc');
                                                                            this.style.color = '#f5b301';
                                                                            let previousStar = this.previousElementSibling;
                                                                            while(previousStar) {
                                                                                if (previousStar.tagName === 'LABEL') {
                                                                                    previousStar.style.color = '#f5b301';
                                                                                }
                                                                                previousStar = previousStar.previousElementSibling;
                                                                            }
                                                                        });
                                                                    });
                                                                });
                                                            </script>
                                                        </div>
                                                        <div class="mb-3">
                                                            <textarea class="form-control" rows="3" placeholder="Comment" name="comment"></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                </form>
                                            @else
                                                <div class="alert alert-danger">
                                                    You have already given review.
                                                </div>
                                            @endif

                                        @else
                                            <div class="alert alert-danger">
                                                You have to book this package to give review.
                                            </div>
                                        @endif

                                    @else
                                        <div class="mb-3">
                                            <a href="{{ route('login') }}" class="btn btn-danger">Login to Review</a>
                                        </div>

                                    @endif
                                </div>
                                <!-- // Review -->
                            </div>



                            <div class="tab-pane fade" id="tab-7-pane" role="tabpanel" aria-labelledby="tab-7" tabindex="0">
                                <!-- Enquery -->
                                <h2 class="mt_30">Ask Your Question</h2>
                                <div class="enquery-form">
                                    <form action="{{ route('enquey_form_submit', $package->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input name="name" type="text" class="form-control" placeholder="Full Name">
                                        </div>
                                        <div class="mb-3">
                                            <input name="email" type="email" class="form-control" placeholder="Email Address">
                                        </div>
                                        <div class="mb-3">
                                            <input name="phone" type="text" class="form-control" placeholder="Phone Number">
                                        </div>
                                        <div class="mb-3">
                                            <textarea name="message" class="form-control h-150" rows="3" placeholder="Message"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">
                                                Send Message
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- // Enquery -->
                            </div>


                            <div class="tab-pane fade" id="tab-8-pane" role="tabpanel" aria-labelledby="tab-8" tabindex="0">
                                <!-- Booking -->

                                <form method="POST" action="{{ route('payment') }}">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                                    <div class="row">
                                        <div class="col-md-8">
                                            @php $i = 0; @endphp

                                            @foreach ($tours as $tour)


                                               @if ( $tour->booking_end_date < today('Asia/Jerusalem','d m,Y') )
                                                   @continue
                                               @endif

                                               @php
                                                    $i++;

                                                    $total_booked_seats = 0;
                                                    $bookings = App\Models\Booking::where('tour_id', $tour->id)->where('package_id', $package->id)->get();
                                                        foreach ($bookings as $booking) {
                                                            $total_booked_seats += $booking->total_person;
                                                        }
                                                    $remaining_seats = $tour->total_seat - $total_booked_seats;
                                               @endphp

                                                <h2 class="mt_30">
                                                    <input type="radio" name="tour_id" value="{{ $tour->id }}" @if ($i == 1) checked @endif>
                                                    Tour {{ $i }}
                                                </h2>
                                                <div class="summary">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td><b>Tour Start Date</b></td>
                                                                <td>{{ $tour->tour_start_date }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Tour End Date</b></td>
                                                                <td>{{ $tour->tour_end_date }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Booking End Date</b></td>
                                                                <td class="text-danger">{{ $tour->booking_end_date }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Total Seats</b></td>
                                                                @if ($tour->total_seat == -1)
                                                                    <td>Unlimited</td>
                                                                @else
                                                                    <td>{{ $tour->total_seat }}</td>
                                                                @endif
                                                            </tr>
                                                            <tr>
                                                                <td><b>Booked Seats</b></td>
                                                                <td>{{ $total_booked_seats }}</td>
                                                            </tr>

                                                            @if ($tour->total_seat != -1)
                                                            <tr>
                                                                <td><b>Availiable Seats</b></td>
                                                                <td>{{ $remaining_seats }}</td>
                                                            </tr>
                                                            @endif

                                                        </table>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="col-md-4">
                                            <h2 class="mt_30">Payment</h2>
                                            <div class="summary">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>
                                                                    <input type="hidden" name="ticket_price" id="ticketPrice" value="{{ $package->price }}">
                                                                    <label for=""><b>Number of Persons</b></label>
                                                                    <input type="number" min="1" max="100" name="total_person" class="form-control" value="1" id="numPersons" oninput="calculateTotal()">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <label for=""><b>Total</b></label>
                                                                    <input type="text" name="total_amount" class="form-control" id="totalAmount" value="{{ $package->price }}" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <label for=""><b>Select Payment Method</b></label>
                                                                    <select name="payment_method" class="form-select">
                                                                        <option value="Paypal">Paypal</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option disabled value="Stripe">Stripe - will be soon availiable</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    @if (Auth::guard('web')->check())
                                                                        <button type="submit" class="btn btn-primary">Pay Now</button>
                                                                    @else
                                                                        <a href="{{ route('login') }}" class="btn btn-primary">Login to Book</a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                <script>
                                                    function calculateTotal() {
                                                    const ticketPrice = document.getElementById('ticketPrice').value;
                                                    const numPersons = document.getElementById('numPersons').value;
                                                    const totalAmount = ticketPrice * numPersons;
                                                    document.getElementById('totalAmount').value = `$${totalAmount}`;
                                                }
                                                </script>
                                        </div>
                                    </div>
                                </form>
                                <!-- // Booking -->
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
