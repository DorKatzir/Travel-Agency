@extends('front.layout.master')

@section('main_content')

    <div class="page-top page-top-package" style="background-image: url({{ asset('uploads/'. $package->banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-capitalize">{{ $package->name }}</h2>
                    <h3 class="text-capitalize"><i class="fas fa-plane-departure"></i> {{ $package->destination->name }}, {{ $package->destination->country }}</h3>
                    <div class="review">
                        <div class="set">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span>(4.2 out of 5)</span>
                    </div>
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
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab-4" data-bs-toggle="tab" data-bs-target="#tab-4-pane" type="button" role="tab" aria-controls="tab-4-pane" aria-selected="false">Gallery</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab-5" data-bs-toggle="tab" data-bs-target="#tab-5-pane" type="button" role="tab" aria-controls="tab-5-pane" aria-selected="false">FAQ</button>
                            </li>
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
                                <h2 class="mt_30">
                                    Photos
                                </h2>
                                <div class="photo-all">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="item">
                                                <a href="uploads/package-thumb-1.jpg" class="magnific">
                                                    <img src="uploads/package-thumb-1.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="item">
                                                <a href="uploads/package-thumb-2.jpg" class="magnific">
                                                    <img src="uploads/package-thumb-2.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="item">
                                                <a href="uploads/package-thumb-3.jpg" class="magnific">
                                                    <img src="uploads/package-thumb-3.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="item">
                                                <a href="uploads/package-thumb-4.jpg" class="magnific">
                                                    <img src="uploads/package-thumb-4.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="item">
                                                <a href="uploads/package-thumb-5.jpg" class="magnific">
                                                    <img src="uploads/package-thumb-5.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="item">
                                                <a href="uploads/package-thumb-6.jpg" class="magnific">
                                                    <img src="uploads/package-thumb-6.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="item">
                                                <a href="uploads/package-thumb-7.jpg" class="magnific">
                                                    <img src="uploads/package-thumb-7.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="item">
                                                <a href="uploads/package-thumb-8.jpg" class="magnific">
                                                    <img src="uploads/package-thumb-8.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <h2 class="mt_30">
                                    Videos
                                </h2>
                                <div class="video-all">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="item">
                                                <a class="video-button" href="http://www.youtube.com/watch?v=kLuqCtnKr_8">
                                                    <img src="http://img.youtube.com/vi/kLuqCtnKr_8/0.jpg" alt="">
                                                    <div class="icon">
                                                        <i class="far fa-play-circle"></i>
                                                    </div>
                                                    <div class="bg"></div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="item">
                                                <a class="video-button" href="http://www.youtube.com/watch?v=HRg1gJi6yqc">
                                                    <img src="http://img.youtube.com/vi/HRg1gJi6yqc/0.jpg" alt="">
                                                    <div class="icon">
                                                        <i class="far fa-play-circle"></i>
                                                    </div>
                                                    <div class="bg"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // Gallery -->
                            </div>


                            <div class="tab-pane fade" id="tab-5-pane" role="tabpanel" aria-labelledby="tab-5" tabindex="0">
                                <!-- FAQ -->
                                <h2 class="mt_30">Frequently Asked Questions</h2>
                                <div class="faq-package">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item mb_30">
                                            <h2 class="accordion-header" id="heading_1">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="false" aria-controls="collapse_1">
                                                    What activities are included in the tour?
                                                </button>
                                            </h2>
                                            <div id="collapse_1" class="accordion-collapse collapse" aria-labelledby="heading_1" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    The Great Barrier Reef tour includes snorkeling, diving, and glass-bottom boat tours, allowing you to explore the vibrant marine life and coral formations. Additionally, the package offers guided reef tours, informative presentations by marine biologists, and leisure time on stunning beaches.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb_30">
                                            <h2 class="accordion-header" id="heading_2">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_2" aria-expanded="false" aria-controls="collapse_2">
                                                    What should I bring on the tour?
                                                </button>
                                            </h2>
                                            <div id="collapse_2" class="accordion-collapse collapse" aria-labelledby="heading_2" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    We recommend bringing swimwear, sunscreen, a hat, sunglasses, and a reusable water bottle. If you plan to snorkel or dive, bring your own gear if you prefer, although equipment is provided. Don’t forget a camera to capture the incredible underwater scenery!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb_30">
                                            <h2 class="accordion-header" id="heading_3">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_3" aria-expanded="false" aria-controls="collapse_3">
                                                    Is the tour suitable for beginners?
                                                </button>
                                            </h2>
                                            <div id="collapse_3" class="accordion-collapse collapse" aria-labelledby="heading_3" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Yes, the tour is designed for all experience levels. Our guides provide comprehensive instructions and safety briefings for snorkeling and diving. Beginners can enjoy glass-bottom boat tours and shallow water snorkeling, while experienced divers can explore deeper parts of the reef.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb_30">
                                            <h2 class="accordion-header" id="heading_4">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">
                                                    How long is the tour and what’s the schedule?
                                                </button>
                                            </h2>
                                            <div id="collapse_4" class="accordion-collapse collapse" aria-labelledby="heading_4" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    The Great Barrier Reef tour typically lasts a full day, starting early in the morning and returning by late afternoon. The schedule includes transportation to and from the reef, several hours of water activities, lunch, and free time for relaxation and exploration.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb_30">
                                            <h2 class="accordion-header" id="heading_5">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_5" aria-expanded="false" aria-controls="collapse_5">
                                                    What measures are in place for reef conservation?
                                                </button>
                                            </h2>
                                            <div id="collapse_5" class="accordion-collapse collapse" aria-labelledby="heading_5" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Our tours adhere to strict environmental guidelines to protect the reef. We use eco-friendly boats, limit visitor numbers, and provide education on reef conservation. Our guides also ensure that all activities are conducted responsibly, minimizing impact on the marine ecosystem.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // FAQ -->
                            </div>


                            <div class="tab-pane fade" id="tab-6-pane" role="tabpanel" aria-labelledby="tab-6" tabindex="0">
                                <!-- Review -->
                                <div class="review-package">

                                    <h2>Reviews (2)</h2>

                                    <div class="review-package-section">
                                        <div class="review-package-box d-flex justify-content-start">
                                            <div class="left">
                                                <img src="uploads/team-2.jpg" alt="">
                                            </div>
                                            <div class="right">
                                                <div class="name">John Doe</div>
                                                <div class="date">September 25, 2022</div>
                                                <div class="text">
                                                    Qui ea oporteat democritum, ad sed minimum offendit expetendis. Idque volumus platonem eos ut, in est verear delectus. Vel ut option adipisci consequuntur. Mei et solum malis detracto, has iuvaret invenire inciderint no. Id est dico nostrud invenire.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="review-package-section">
                                        <div class="review-package-box d-flex justify-content-start">
                                            <div class="left">
                                                <img src="uploads/team-1.jpg" alt="">
                                            </div>
                                            <div class="right">
                                                <div class="name">John Doe</div>
                                                <div class="date">September 25, 2022</div>
                                                <div class="text">
                                                    Qui ea oporteat democritum, ad sed minimum offendit expetendis. Idque volumus platonem eos ut, in est verear delectus. Vel ut option adipisci consequuntur. Mei et solum malis detracto, has iuvaret invenire inciderint no. Id est dico nostrud invenire.
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mt_40"></div>

                                    <h2>Leave Your Review</h2>

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
                                        <textarea class="form-control" rows="3" placeholder="Comment"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <!-- // Review -->
                            </div>



                            <div class="tab-pane fade" id="tab-7-pane" role="tabpanel" aria-labelledby="tab-7" tabindex="0">
                                <!-- Enquery -->
                                <h2 class="mt_30">Ask Your Question</h2>
                                <div class="enquery-form">
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Full Name">
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="Email Address">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Phone Number">
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control h-150" rows="3" placeholder="Message"></textarea>
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

                                <div class="row">
                                    <div class="col-md-8">
                                        <h2 class="mt_30">Booking Information</h2>
                                        <div class="summary">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><b>Price (per person)</b></td>
                                                        <td>$400</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Start Date</b></td>
                                                        <td>
                                                            12 Jun, 2024
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>End Date</b></td>
                                                        <td>
                                                            28 Jun, 2024
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Total Seat</b></td>
                                                        <td>
                                                            20
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Booked Seat</b></td>
                                                        <td>
                                                            15
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Available Seat</b></td>
                                                        <td>
                                                            5
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h2 class="mt_30">Payment</h2>
                                        <div class="summary">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" name="ticket_price" id="ticketPrice" value="400">
                                                            <label for=""><b>Number of Persons</b></label>
                                                            <input type="number" min="1" max="100" name="total_person" class="form-control" value="1" id="numPersons" oninput="calculateTotal()">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for=""><b>Total</b></label>
                                                            <input type="text" name="" class="form-control" id="totalAmount" value="$400" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for=""><b>Select Payment Method</b></label>
                                                            <select name="" class="form-select">
                                                                <option value="">PayPal</option>
                                                                <option value="">Stripe</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button type="submit" class="btn btn-primary">Pay Now</button>
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
                                <!-- // Booking -->
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
