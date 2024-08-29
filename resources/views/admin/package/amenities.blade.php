
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Amenities of {{ $package->name }}</h1>
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
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Amenity</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($package_amenities as $item)

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->amenity_id }}</td>
                                                    <td>{{ $item->type }}</td>

                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('admin_package_amenity_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


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
                                                <option value="amenity_id">{{ $amenity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Type *</label>

                                        <select name="type" class="form-select">
                                           <option value="include">Include</option>
                                           <option value="exclude">Exclude</option>
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



