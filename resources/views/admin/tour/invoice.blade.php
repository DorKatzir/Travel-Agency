@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Invoice</h1>
            </div>
            <div class="section-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Invoice</h2>
                                    <div class="invoice-number">Order #873485</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Invoice To</strong><br>
                                            John Doe<br>
                                            324 SF Street Lane,<br>
                                            NYC, CA, USA, 98346
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Invoice Date</strong><br>
                                            February 23, 2022
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">Order Summary</div>
                                <p class="section-lead">Here put the order summery notification</p>
                                <hr class="invoice-above-table">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th>SL</th>
                                            <th>Item Name</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Laptop</td>
                                            <td class="text-center">$100</td>
                                            <td class="text-center">3</td>
                                            <td class="text-right">$300</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Headphone</td>
                                            <td class="text-center">$40</td>
                                            <td class="text-center">2</td>
                                            <td class="text-right">$80</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-12 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">$380</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="about-print-button">
                    <div class="text-md-right">
                        <a href="javascript:window.print();" class="btn btn-warning btn-icon icon-left text-white print-invoice-button"><i class="fas fa-print"></i> Print</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
