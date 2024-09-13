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
                                                <td colspan="3">
                                                    <span>{{ $booking->created_at->format('d M, Y') }}</span><br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">To: </th>
                                                <td>{{ $booking->user->name }}</td>
                                                <td colspan="2">
                                                    <span>Email: {{ $booking->user->email }}</span><br>
                                                    <span>Phone: {{ $booking->user->phone }}</span>
                                                </td>

                                            </tr>

                                            <tr>
                                                <th class="w_200">From: </th>
                                                <td>
                                                    <span>{{ Auth::guard('admin')->user()->name }}</span>
                                                </td>
                                                <td colspan="2">
                                                    <span>Email: {{ Auth::guard('admin')->user()->email }}</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">Tour Information: </th>
                                                <td colspan="3">
                                                    <span></span><br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">Package Information: </th>
                                                <td colspan="3">
                                                    <span></span><br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">Payment Method: </th>
                                                <td colspan="3">
                                                    <span>{{ $booking->payment_method }}</span><br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">Payment Status: </th>
                                                <td colspan="3">
                                                    <span>{{ $booking->payment_status }}</span><br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">Total Persons: </th>
                                                <td colspan="3">
                                                    <span>{{ $booking->total_person }}</span><br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">Paid Amount: </th>
                                                <td colspan="3">
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
