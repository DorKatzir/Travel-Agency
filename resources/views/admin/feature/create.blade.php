
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Create Feature</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_feature_index') }}" class="btn btn-primary">
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

                                <form method="POST" action="{{ route('admin_feature_create_submit') }}" enctype="multipart/form-data">
                                    @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Icon *</label>
                                            <input type="text" class="form-control" name="icon" value="{{ old('icon') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Title *</label>
                                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description *</label>
                                            <textarea name="description" class="form-control h_100" cols="30" rows="10">{{ old('description') }}</textarea>
                                        </div>

                                        <div class="mb-3">

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


