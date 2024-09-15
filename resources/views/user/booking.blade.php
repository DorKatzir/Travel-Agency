@extends('front.layout.master')
@section('main_content')

    <div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Booking</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Booking</li>
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
                                    <th>Package</th>
                                    <th>Destination</th>
                                    <th>Paid Amount</th>
                                    <th>Payment Method</th>
                                    <th>Payment Date</th>
                                    <th>Status</th>
                                    <th class="w-100">
                                        Action
                                    </th>
                                </tr>
                                @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="" class="text-decoration-underline">{{ $booking->package->name }}</a>
                                    </td>
                                    <td>
                                        <a href="" class="text-decoration-underline">{{ $booking->package->destination->name }}</a>
                                    </td>
                                    <td>${{ $booking->paid_amount }}</td>
                                    <td>{{ $booking->payment_method }}</td>
                                    <td>{{ $booking->created_at->format('d M, Y') }}</td>
                                    <td>
                                        @if ($booking->payment_status == 'Completed')
                                        <div class="badge bg-success">Completed</div>
                                        @else
                                        <div class="badge bg-danger">Pending</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-secondary btn-sm mb-1 w-100-p" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail</a>
                                        <a href="user-order-invoice.html" class="btn btn-secondary btn-sm w-100-p">Invoice</a>
                                    </td>
                                </tr>
                               @endforeach
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3 row modal-seperator">
                                                    <div class="col-md-5">
                                                        <b>Order No:</b>
                                                    </div>
                                                    <div class="col-md-7">
                                                        ORD-123443
                                                    </div>
                                                </div>
                                                <div class="mb-3 row modal-seperator">
                                                    <div class="col-md-5">
                                                        <b>Package Name:</b>
                                                    </div>
                                                    <div class="col-md-7">
                                                        Royal Ontario Museum
                                                    </div>
                                                </div>
                                                <div class="mb-3 row modal-seperator">
                                                    <div class="col-md-5">
                                                        <b>Destination:</b>
                                                    </div>
                                                    <div class="col-md-7">
                                                        Canada
                                                    </div>
                                                </div>
                                                <div class="mb-3 row modal-seperator">
                                                    <div class="col-md-5">
                                                        <b>Total Persons:</b>
                                                    </div>
                                                    <div class="col-md-7">
                                                        3
                                                    </div>
                                                </div>
                                                <div class="mb-3 row modal-seperator">
                                                    <div class="col-md-5">
                                                        <b>Per Person Cost:</b>
                                                    </div>
                                                    <div class="col-md-7">
                                                        $300
                                                    </div>
                                                </div>
                                                <div class="mb-3 row modal-seperator">
                                                    <div class="col-md-5">
                                                        <b>Total Cost:</b>
                                                    </div>
                                                    <div class="col-md-7">
                                                        $900
                                                    </div>
                                                </div>
                                                <div class="mb-3 row modal-seperator">
                                                    <div class="col-md-5">
                                                        <b>Payment Method:</b>
                                                    </div>
                                                    <div class="col-md-7">
                                                        PayPal
                                                    </div>
                                                </div>
                                                <div class="mb-3 row modal-seperator">
                                                    <div class="col-md-5">
                                                        <b>Travel Start Date:</b>
                                                    </div>
                                                    <div class="col-md-7">
                                                        2024-09-10
                                                    </div>
                                                </div>
                                                <div class="mb-3 row modal-seperator">
                                                    <div class="col-md-5">
                                                        <b>Travel End Date:</b>
                                                    </div>
                                                    <div class="col-md-7">
                                                        2024-09-20
                                                    </div>
                                                </div>
                                                <div class="mb-3 row modal-seperator">
                                                    <div class="col-md-5">
                                                        <b>Payment Status:</b>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="badge bg-success">Completed</div>
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
