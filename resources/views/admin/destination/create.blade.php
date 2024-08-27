
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Create Destination</h1>
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

                                <form method="POST" action="{{ route('admin_destination_create_submit') }}" enctype="multipart/form-data">
                                    @csrf

                                        <div class="mb-4">
                                            <label class="form-label">Featured Photo *</label><br>
                                            <input class="form-control" type="file" name="featured_photo" accept="image/*">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Name *</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Description *</label>
                                            <textarea name="description" class="form-control editor">{{ old('description') }}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Country</label>
                                                    <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Languages</label>
                                                    <input type="text" class="form-control" name="language" value="{{ old('language') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label class="form-label">Currency</label>
                                                    <input type="text" class="form-control" name="currency" value="{{ old('currency') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label class="form-label">Area</label>
                                                    <input type="text" class="form-control" name="area" value="{{ old('area') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label class="form-label">Timezone</label>
                                                    <input type="text" class="form-control" name="timezone" value="{{ old('timezone') }}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mb-4">
                                            <label class="form-label">Visa Requirements</label>
                                            <textarea name="visa" class="form-control editor">{{ old('visa') }}</textarea>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Activities</label>
                                            <textarea name="activity" class="form-control editor">{{ old('activity') }}</textarea>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Best Time to Visit</label>
                                            <textarea name="best_time" class="form-control editor">{{ old('best_time') }}</textarea>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Health & Safety</label>
                                            <textarea name="health_safety" class="form-control editor">{{ old('health_safety') }}</textarea>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Map (iframe code)</label>
                                            <textarea name="map" class="form-control h_100">{{ old('map') }}</textarea>
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


