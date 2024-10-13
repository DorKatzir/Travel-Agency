
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
                                                        <img src="{{ asset('uploads/'. $package->featured_photo) }}" alt="" class="w_200">
                                                    </td>

                                                    <td>{{ $package->name }}</td>

                                                    <td>
                                                        <div class="">
                                                            <a href="{{ route('admin_package_amenities', $package->id) }}" class="btn btn-success mb-2">Amenities</a>
                                                            <a href="{{ route('admin_package_itineraries', $package->id) }}" class="btn btn-success mb-2">Itinerary</a>
                                                            <a href="{{ route('admin_package_faqs', $package->id) }}" class="btn btn-success mb-2">Faqs</a>
                                                        </div>
                                                        <div class="">
                                                            <a href="{{ route('admin_package_photos', $package->id) }}" class="btn btn-success mb-2">Photo gallery</a>
                                                            <a href="{{ route('admin_package_videos', $package->id) }}" class="btn btn-success mb-2">Video gallery</a>
                                                        </div>

                                                    </td>

                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('admin_package_edit', $package->id) }}" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_package_delete', $package->id) }}" class="btn btn-danger mb-2" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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


