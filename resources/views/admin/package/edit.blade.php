
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Package</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_package_index') }}" class="btn btn-primary">
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

                                <form method="POST" action="{{ route('admin_package_edit_submit', $package->id) }}" enctype="multipart/form-data">
                                    @csrf

                                      <div class="row">
                                        <div class="col-md-9">

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label">Current Featured Photo *</label><br>
                                                    <img src="{{ asset('uploads/'. $package->featured_photo	) }}" class="w_200">

                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Current Banner *</label><br>
                                                    <img src="{{ asset('uploads/'. $package->banner	) }}" class="w_200">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label">Featured Photo *</label><br>
                                                    <input class="form-control" type="file" name="featured_photo" accept="image/*">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Banner *</label><br>
                                                    <input class="form-control" type="file" name="banner" accept="image/*">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label">Name *</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $package->name }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Slug</label>
                                                    <input type="text" class="form-control" disabled readonly value="{{ $package->slug }}">
                                                </div>
                                            </div>


                                            <div class="mb-4">
                                                <label class="form-label">Description *</label>
                                                <textarea name="description" class="form-control editor">{{ $package->description }}</textarea>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-4">
                                                        <label class="form-label">Select Destination *</label>
                                                        <select name="destination_id" class="form-select">
                                                            @foreach ($destinations as $destination)
                                                                <option value="{{ $destination->id }}" @if ( $destination->id  == $package->destination_id ) selected @endif>
                                                                    {{ $destination->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-4">
                                                        <label class="form-label">Price *</label>
                                                        <input type="text" class="form-control" name="price" value="{{ $package->price }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-4">
                                                        <label class="form-label">Old Price</label>
                                                        <input type="text" class="form-control" name="old_price" value="{{ $package->old_price }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label">Map (iframe code)</label>
                                                <textarea name="map" class="form-control h_100">{{ $package->map }}</textarea>
                                            </div>

                                            <div class="mb-4">
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



