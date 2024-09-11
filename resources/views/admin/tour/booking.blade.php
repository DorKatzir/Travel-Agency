
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
                                    <table class="table table-bordered">

                                        @foreach ($booking_data as $booking)

                                            <tr>
                                                <th class="w_200">Invoice No</th>
                                                <td>{{ $booking->invoice_no }}</td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">Package Name</th>
                                                <td>{{ $booking->package->name }}</td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">User Name</th>
                                                <td>{{ $booking->user->name }}</td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">User Email</th>
                                                <td>{{ $booking->user->email }}</td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">User Phone</th>
                                                <td>{{ $booking->user->phone }}</td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">Total Persons</th>
                                                <td>{{ $booking->total_person }}</td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">Paid Amount</th>
                                                <td>{{ $booking->paid_amount }}</td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">Payment Method</th>
                                                <td>{{ $booking->payment_method }}</td>
                                            </tr>

                                            <tr>
                                                <th class="w_200">Payment Status</th>
                                                <td>{{ $booking->payment_status }}</td>
                                            </tr>

                                        @endforeach

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



