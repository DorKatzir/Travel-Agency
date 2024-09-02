
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Create Tour</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_tours_index') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        View All
                    </a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" action="{{ route('admin_tour_create_submit') }}">
                                    @csrf
                                    <div class="row">
                                            <div class="col-md-6">

                                            <div class="mb-3">
                                                <label class="form-label">Select Package *</label>
                                                <select name="package_id" class="form-select">
                                                @foreach ($packages as $package)
                                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Tour Start Date *</label>
                                                <input type="text" class="form-control" name="tour_start_date" value="{{ old('tour_start_date') }}">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Tour End Date *</label>
                                                <input type="text" class="form-control" name="tour_end_date" value="{{ old('tour_end_date') }}">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Booking End Date *</label>
                                                <input type="text" class="form-control" name="booking_end_date" value="{{ old('booking_end_date') }}">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Total Seat *</label>
                                                <input type="text" class="form-control" name="total_seat" value="{{ old('total_seat') }}">
                                            </div>

                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection


