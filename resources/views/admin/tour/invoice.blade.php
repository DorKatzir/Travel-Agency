@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">
        <section class="section">

            <div class="section-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title mb-4 d-flex align-items-center gap-2">
                                    <h1>Booking Invoice </h1>
                                    <h3 class="m-0">
                                        #{{ $booking->invoice_no }}
                                    </h3>
                                </div>
                                {{-- <hr> --}}
                                <div class="table-responsive mb-4">
                                    <table class="table table-bordered">
                                        <tbody>

                                            <tr>
                                                <th class="w_200">Booking Date: </th>
                                                <td>
                                                    <span>{{ $booking->created_at->format('d M, Y') }}</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>To: </th>
                                                <td class="d-flex align-items-center gap-3">
                                                    <span>Name: {{ $booking->user->name }}</span>
                                                    <span>Email: {{ $booking->user->email }}</span>
                                                    <span>Phone: {{ $booking->user->phone }}</span>
                                                </td>

                                            </tr>

                                            <tr>
                                                <th>From: </th>
                                                <td class="d-flex align-items-center gap-3">
                                                    <span>Name: {{ Auth::guard('admin')->user()->name }}</span>
                                                    <span>Email: {{ Auth::guard('admin')->user()->email }}</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Tour Information: </th>
                                                <td class="d-flex align-items-center gap-3">
                                                    <span>Start date: {{ $booking->tour->tour_start_date }}</span>
                                                    <span>End date: {{ $booking->tour->tour_end_date }}</span>
                                                </td>

                                            </tr>

                                            <tr>
                                                <th>Package Information: </th>
                                                <td class="d-flex align-items-center gap-3">
                                                    <span>{{ $booking->package->name }}</span><br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Payment Method: </th>
                                                <td>
                                                    <span>{{ $booking->payment_method }}</span><br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Payment Status: </th>
                                                <td>
                                                    <span>{{ $booking->payment_status }}</span><br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Total Persons: </th>
                                                <td>
                                                    <span>{{ $booking->total_person }}</span><br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Paid Amount: </th>
                                                <td>
                                                    <span>${{ $booking->paid_amount }}</span><br>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>


                    </div>
                    {{-- <hr class="about-print-button"> --}}
                    <div class="text-md-right">
                        <a href="javascript:window.print();" class="btn btn-warning btn-icon icon-left text-white print-invoice-button"><i class="fas fa-print"></i> Print Invoice</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
