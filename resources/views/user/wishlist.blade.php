@extends('front.layout.master')
@section('main_content')

    <div class="page-top" style="background-image: url('uploads/banner.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Wishlist</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Wishlist</li>
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
                                        <a href="package.html" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-danger btn-sm" onClick="return confirm('Are You Sure?')"><i class="fas fa-trash"></i></a>
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
                                        <a href="package.html" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-danger btn-sm" onClick="return confirm('Are You Sure?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
