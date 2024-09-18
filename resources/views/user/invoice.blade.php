@extends('front.layout.master')
@section('main_content')

    <div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Invoice</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
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
                    <div class="invoice-container" id="print_invoice">
                        <div class="invoice-top">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-border-0">
                                            <tbody>
                                                <tr>
                                                    <td class="w-50">
                                                        <img src="{{ asset('uploads/logo.png') }}" alt="logo" class="h-60">
                                                    </td>
                                                    <td class="w-50">
                                                        <div class="invoice-top-right">
                                                            <h4>Invoice</h4>
                                                            <h5>Invoice No: {{ $booking->invoice_no }}</h5>
                                                            <h5>Date: {{ $booking->created_at->format('d M, Y') }}</h5>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-middle">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-border-0">
                                            <tbody>
                                                <tr>
                                                    <td class="w-50">
                                                        <div class="invoice-middle-left">
                                                            <h4>Invoice To:</h4>
                                                            <p class="mb_0">{{ $booking->user->name }}</p>
                                                            <p class="mb_0">{{ $booking->user->email }}</p>
                                                            <p class="mb_0">{{ $booking->user->phone }}</p>
                                                            <p class="mb_0">{{ $booking->user->address }}</p>
                                                            <p class="mb_0">{{ $booking->user->city }}, {{ $booking->user->country }}</p>
                                                        </div>
                                                    </td>
                                                    <td class="w-50">
                                                        <div class="invoice-middle-right">
                                                            <h4>Invoice From:</h4>
                                                            @php
                                                                $company_name = env('APP_NAME');
                                                                $company_email = env('MAIL_FROM_ADDRESS');
                                                            @endphp
                                                            <p class="mb_0">{{ $company_name }}</p>
                                                            <p class="mb_0 color_6d6d6d">{{ $company_email }}</p>
                                                            <p class="mb_0">215-899-5780</p>
                                                            <p class="mb_0">3145 Glen Falls Road</p>
                                                            <p class="mb_0">Bensalem, PA 19020</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered invoice-item-table">
                                            <tbody>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Package</th>
                                                    <th>Tour Start Date</th>
                                                    <th>Tour End Date</th>
                                                    <th>Ticket Price</th>
                                                    <th>Tickets</th>
                                                    <th>Price</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>{{ $booking->package->name }}</td>
                                                    <td>{{ $booking->tour->tour_start_date }}</td>
                                                    <td>{{ $booking->tour->tour_end_date }}</td>
                                                    <td>${{ $booking->package->price }}</td>
                                                    <td>{{ $booking->total_person }}</td>
                                                    <td>${{ $booking->paid_amount }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-bottom">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-border-0">
                                            <tbody>
                                                <td class="w-70 invoice-bottom-payment">
                                                    <h4>Payment Method</h4>
                                                    <p>{{ $booking->payment_method }}</p>
                                                </td>
                                                <td class="w-30 tar invoice-bottom-total-box">
                                                    @php
                                                        $old_price = $booking->package->old_price;
                                                        $price = $booking->package->price;
                                                        $total_person = $booking->total_person;
                                                        $subtotal = $old_price * $total_person;
                                                        $discount = ($old_price - $price) * $total_person;
                                                    @endphp
                                                    <p class="mb_0 d-flex gap-3 align-items-center justify-content-end">
                                                        <small>Subtotal: ${{ $subtotal }}</small>
                                                        <small>Discount: ${{ $discount }}</small>
                                                        <strong>Total: ${{ $booking->paid_amount }}</strong>
                                                    </p>


                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="print-button mt_25">
                        <a onclick="printInvoice()" href="javascript:;" class="btn btn-primary"><i class="fas fa-print"></i> Print</a>
                    </div>
                    <script>
                        function printInvoice() {
                            let body = document.body.innerHTML;
                            let data = document.getElementById('print_invoice').innerHTML;
                            document.body.innerHTML = data;
                            window.print();
                            document.body.innerHTML = body;
                        }
                    </script>
                </div>

            </div>
        </div>
    </div>




@endsection

