
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
                                                <th class="w_50">Persons</th>
                                                <th>Amount</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                                <th>Invoice</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($booking_data as $booking)

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $booking->invoice_no }}</td>
                                                    <td>
                                                        <strong>Name: </strong>{{ $booking->user->name }}<br>
                                                        <strong>Email: </strong>{{ $booking->user->email }}<br>
                                                        <strong>Phone: </strong>{{ $booking->user->phone }}<br>
                                                    </td>
                                                    <td>{{ $booking->total_person }}</td>
                                                    <td>{{ $booking->paid_amount }}</td>
                                                    <td>{{ $booking->payment_method }}</td>

                                                    @if ($booking->payment_status == 'Completed')
                                                        <td><span class="badge badge-success">Completed</span></td>
                                                        <td><a href="{{ route('admin_tour_invoice', $booking->invoice_no) }}" class="badge badge-info text-decoration-none">Show</a></td>
                                                        @else
                                                        <td><span class="badge badge-danger">Pending</span></td>
                                                        <td></td>
                                                    @endif


                                                    <td class="pt_10 pb_10">

                                                        <a href="{{ route('admin_tour_booking_delete', $booking->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                                                    </td>
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



