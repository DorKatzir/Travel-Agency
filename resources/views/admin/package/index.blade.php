
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Packages</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_package_create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Add New
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
                                                <th>Featured Photo</th>
                                                <th>Name</th>
                                                <th>Gallery</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($packages as $package)

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>
                                                        <img src="{{ asset('uploads/'. $package->featured_photo) }}" alt="" class="h_100 object-cover">
                                                    </td>

                                                    <td>{{ $package->name }}</td>

                                                    <td>
                                                        <a href="{{ route('admin_package_amenities', $package->id) }}" class="btn btn-success">Amenities</a>
                                                        <a href="{{ route('admin_package_itineraries', $package->id) }}" class="btn btn-success">Itinerary</a>
                                                        <a href="{{ route('admin_package_photos', $package->id) }}" class="btn btn-success">Photo gallery</a>
                                                        <a href="" class="btn btn-success">Video gallery</a>

                                                        {{-- <a href="{{ route('admin_package_photos', $package->id) }}" class="btn btn-success btn-sm">Photo Gallery</a>
                                                        <a href="{{ route('admin_package_video', $package->id) }}" class="btn btn-success btn-sm">Video Gallery</a> --}}
                                                    </td>

                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('admin_package_edit', $package->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_package_delete', $package->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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


