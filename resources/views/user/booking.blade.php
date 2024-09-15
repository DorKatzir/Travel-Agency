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
                                    <th>Invoice No</th>
                                    <th>Total Persons</th>
                                    <th>Paid Amount</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th class="w-100">
                                        Action
                                    </th>
                                </tr>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $booking->invoice_no }}
                                        </td>
                                        <td>
                                            {{ $booking->total_person }}
                                        </td>
                                        <td>${{ $booking->paid_amount }}</td>
                                        <td>${{ $booking->payment_method }}</td>

                                        <td>
                                            @if ($booking->payment_status == 'Completed')
                                            <div class="badge bg-success">Completed</div>
                                            @else
                                            <div class="badge bg-danger">Pending</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-secondary btn-sm mb-1 w-100-p" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->iteration }}">Detail</a>
                                            @if($booking->payment_status == 'Completed')
                                            <a href="#" class="btn btn-secondary btn-sm w-100-p">Invoice</a>
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Booking Details</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3 row modal-seperator">
                                                        <div class="col-md-5">
                                                            <b>Invoice No:</b>
                                                        </div>
                                                        <div class="col-md-7">
                                                            {{ $booking->invoice_no }}
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row modal-seperator">
                                                        <div class="col-md-5">
                                                            <b>Package Details:</b>
                                                        </div>
                                                        <div class="col-md-7">
                                                            package details
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row modal-seperator">
                                                        <div class="col-md-5">
                                                            <b>Tour Details:</b>
                                                        </div>
                                                        <div class="col-md-7">
                                                            tour details
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row modal-seperator">
                                                        <div class="col-md-5">
                                                            <b>Total Persons:</b>
                                                        </div>
                                                        <div class="col-md-7">
                                                            {{ $booking->total_person }}
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row modal-seperator">
                                                        <div class="col-md-5">
                                                            <b>Paid Amount:</b>
                                                        </div>
                                                        <div class="col-md-7">
                                                            ${{ $booking->paid_amount }}
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row modal-seperator">
                                                        <div class="col-md-5">
                                                            <b>Payment Method:</b>
                                                        </div>
                                                        <div class="col-md-7">
                                                            {{ $booking->payment_method }}
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row modal-seperator">
                                                        <div class="col-md-5">
                                                            <b>Payment Status:</b>
                                                        </div>
                                                        <div class="col-md-7">
                                                            @if ($booking->payment_status == 'Completed')
                                                                <div class="badge bg-success">Completed</div>
                                                            @else
                                                                <div class="badge bg-danger">Pending</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- // Modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
