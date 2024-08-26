@extends('front.layout.master')

@section('main_content')

    <div class="page-top" style="background-image: url('uploads/banner.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Destinations</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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

@endsection
