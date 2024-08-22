
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Testimonial</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_testimonial_index') }}" class="btn btn-primary">
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

                                <form method="POST" action="{{ route('admin_testimonial_edit_submit', $testimonial->id) }}" enctype="multipart/form-data">
                                    @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Existing Photo:</label><br>
                                            <img src="{{ asset('uploads/'. $testimonial->photo) }}" class="w_150">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Change Photo:</label><br>
                                            <input type="file" name="photo" class="form-control-file">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Name *</label>
                                            <input type="text" class="form-control" name="name" value="{{ $testimonial->name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Designation *</label>
                                            <input type="text" class="form-control" name="designation" value="{{ $testimonial->designation }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Comment *</label>
                                            <textarea name="comment" class="form-control h_100" cols="30" rows="10">{{ $testimonial->comment }}</textarea>
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



