@extends('front.layout.master')

@section('main_content')

    <div class="page-top" style="background-image: url('uploads/banner.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Packages</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                            <h2>Filter by Country</h2>
                            <div class="box">
                                <ul>
                                    <li><a href=""><i class="fas fa-angle-right"></i> All</a></li>
                                    <li><a href=""><i class="fas fa-angle-right"></i> Australia</a></li>
                                    <li><a href=""><i class="fas fa-angle-right"></i> Italy</a></li>
                                    <li><a href=""><i class="fas fa-angle-right"></i> Thailand</a></li>
                                    <li><a href=""><i class="fas fa-angle-right"></i> Canada</a></li>
                                    <li><a href=""><i class="fas fa-angle-right"></i> Japan</a></li>
                                </ul>
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
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
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
                        <div class="col-lg-6 col-md-6">
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
                        <div class="col-lg-6 col-md-6">
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
                        <div class="col-lg-6 col-md-6">
                            <div class="item pb_25">
                                <div class="photo">
                                    <a href="package.html"><img src="uploads/package-4.jpg" alt=""></a>
                                    <div class="wishlist">
                                        <a href=""><i class="far fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="text">
                                    <div class="price">
                                        $400
                                    </div>
                                    <h2>
                                        <a href="package.html">Royal Ontario Museum</a>
                                    </h2>
                                    <div class="review">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        (7 Reviews)
                                    </div>
                                    <div class="element">
                                        <div class="element-left">
                                            <i class="fas fa-plane-departure"></i> Canada
                                        </div>
                                        <div class="element-right">
                                            <i class="fas fa-calendar-alt date-icon"></i> 20 Jul, 2024
                                        </div>
                                    </div>
                                    <div class="element">
                                        <div class="element-left">
                                            <i class="fas fa-users"></i> 16 Persons
                                        </div>
                                        <div class="element-right">
                                            <i class="fas fa-clock"></i> 9 Days
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
