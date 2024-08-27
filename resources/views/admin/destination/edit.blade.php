
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Destination</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_destination_index') }}" class="btn btn-primary">
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

                                <form method="POST" action="{{ route('admin_destination_edit_submit', $destination->id) }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-4">
                                        <div class="col-md-auto">
                                            <div>
                                                <label class="form-label">Current Photo</label><br>
                                                <img src="{{ asset('uploads/'. $destination->featured_photo	) }}" class="w_200">
                                            </div>
                                        </div>
                                        <div class="col-md-auto">
                                            <div>
                                                <label class="form-label">Change Photo:</label><br>
                                                <input type="file" name="featured_photo" class="form-control-file" accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div>
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{ $destination->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <label class="form-label">Current Slug</label>
                                                <input class="form-control" type="text" placeholder="{{ $destination->slug }}" aria-label="Disabled input example" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div>
                                                <label class="form-label">Description *</label>
                                                <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $destination->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div>
                                                <label class="form-label">Country</label>
                                                <input type="text" class="form-control" name="country" value="{{ $destination->country }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label class="form-label">Languages</label>
                                                <input type="text" class="form-control" name="language" value="{{ $destination->language }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label class="form-label">Currency</label>
                                                <input type="text" class="form-control" name="currency" value="{{ $destination->currency }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div>
                                                <label class="form-label">Timezone</label>
                                                <input type="text" class="form-control" name="timezone" value="{{ $destination->timezone }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <label class="form-label">Area</label>
                                                <input type="text" class="form-control" name="area" value="{{ $destination->area }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div>
                                                <label class="form-label">Visa Requirements</label>
                                                <textarea name="visa" class="form-control editor">{{ $destination->visa }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div>
                                                <label class="form-label">Activities</label>
                                                <textarea name="activity" class="form-control editor">{{ $destination->activity }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div>
                                                <label class="form-label">Best Time to Visit</label>
                                                <textarea name="best_time" class="form-control editor">{{ $destination->best_time }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div>
                                                <label class="form-label">Health & Safety</label>
                                                <textarea name="health_safety" class="form-control editor">{{ $destination->health_safety }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div>
                                                <label class="form-label">Map (iframe code)</label>
                                                <textarea name="map" class="form-control" cols="30" rows="10">{{ $destination->map }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
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



