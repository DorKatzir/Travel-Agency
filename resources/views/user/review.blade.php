@extends('front.layout.master')
@section('main_content')

<div class="page-top" style="background-image: url('uploads/banner.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Reviews</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Reviews</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel pt_70 pb_70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('user.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Package</th>
                                <th>Destination</th>
                                <th>My Review</th>
                                <th>My Comment</th>
                                <th class="w-100">Action</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>
                                    <img src="uploads/package-1.jpg" alt="" class="w-200">
                                </td>
                                <td>
                                    Royal Ontario Museum
                                </td>
                                <td>
                                    Canada
                                </td>
                                <td>
                                    <div class="review">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Comment</a>
                                </td>
                                <td>
                                    <a href="package.html" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <img src="uploads/package-2.jpg" alt="" class="w-200">
                                </td>
                                <td>
                                    Great Barrier Reef
                                </td>
                                <td>
                                    Australia
                                </td>
                                <td>
                                    <div class="review">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Comment</a>
                                </td>
                                <td>
                                    <a href="package.html" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Comment</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3 row">
                                                <div class="col-md-12">
                                                    The tour was amazing. I enjoyed it a lot. If you want to visit Canada, I will recommend this tour.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Modal -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
