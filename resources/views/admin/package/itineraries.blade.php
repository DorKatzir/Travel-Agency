
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Itineraries of {{ $package->name }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_package_index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Go Back
                    </a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">

                    <div class="col-7">

                        <div class="card">
                            <div class="card-body">
                                {{-- Include Table --}}
                                {{-- <div class="table-responsive">
                                    <h4>Include</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Amenity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($package_amenities_include as $include)

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-capitalize">{{ $include->amenity->name }}</td>
                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('admin_package_amenity_delete', $include->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> --}}

                                {{-- Exclude Table --}}
                                {{-- <div class="table-responsive">
                                    <h4>Exclude</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Amenity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($package_amenities_exclude as $exclude)

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-capitalize">{{ $exclude->amenity->name }}</td>
                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('admin_package_amenity_delete', $exclude->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> --}}


                            </div>
                        </div>

                    </div>

                    <div class="col-5">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin_package_amenity_submit', $package->id) }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label">Amenity *</label>
                                        <select name="amenity_id" class="form-select">
                                            @foreach ($amenities as $amenity)
                                                <option class="text-capitalize" value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Type *</label>

                                        <select name="type" class="form-select">
                                           <option value="Include">Include</option>
                                           <option value="Exclude">Exclude</option>
                                        </select>
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



