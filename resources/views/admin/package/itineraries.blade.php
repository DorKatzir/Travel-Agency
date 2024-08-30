
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Itineraries of {{ $package->name }} Package</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_package_index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Go Back
                    </a>
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-md-9 pb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4>Current Itineraries</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Itinerary Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($package_itineraries as $itinerary)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-capitalize">{{ $itinerary->name }}</td>
                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('admin_package_itinerary_delete', $itinerary->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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

                <div class="row">
                    <div class="col-md-9 pb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4>Add Itinerary</h4>
                                <form method="POST" action="{{ route('admin_package_itinerary_submit', $package->id) }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label">Name *</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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



