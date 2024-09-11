
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Booking Information</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_tours_index') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Back to Tours
                    </a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Invoice No</th>
                                                <th>User Info</th>
                                                <th>Total Persons</th>
                                                <th>Paid Amount</th>
                                                <th>Payment Method</th>
                                                <th>Payment Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($booking_data as $booking)

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $booking->invoice_no }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection



