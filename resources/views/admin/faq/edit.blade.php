
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        {{-- <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Feature</h1>
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

                                <form method="POST" action="{{ route('admin_feature_edit_submit', $feature->id) }}">
                                    @csrf


                                        <div class="mb-3">
                                            <label class="form-label">Current Icon:</label>
                                            <div><i class="{{ $feature->icon  }} fz_30"></i></div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Icon *</label>
                                            <input type="text" class="form-control" name="icon" value="{{ $feature->icon }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Title *</label>
                                            <input type="text" class="form-control" name="title" value="{{ $feature->title }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description *</label>
                                            <textarea name="description" class="form-control h_100" cols="30" rows="10">{{ $feature->description }}</textarea>
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
        </section> --}}

    </div>

@endsection



