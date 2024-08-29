
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Amenity</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_amenity_index') }}" class="btn btn-primary">
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

                                <form method="POST" action="{{ route('admin_amenity_edit_submit', $amenity->id) }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">Name *</label>
                                            <input type="text" class="form-control" name="name" value="{{ $amenity->name }}">
                                        </div>
                                    </div>

                                    <div class="mb-4">
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



