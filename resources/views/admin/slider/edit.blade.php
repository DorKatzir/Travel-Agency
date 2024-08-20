
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Slider</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_slider_index') }}" class="btn btn-primary">
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

                                <form method="POST" action="{{ route('admin_slider_edit_submit', $slider->id) }}" enctype="multipart/form-data">
                                    @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Existing Photo:</label><br>
                                            <img src="{{ asset('uploads/'. $slider->photo) }}" class="w_200">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Change Photo:</label><br>
                                            <input type="file" name="photo">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Heading *</label>
                                            <input type="text" class="form-control" name="heading" value="{{ $slider->heading }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Text *</label>
                                            <textarea name="text" class="form-control h_100" cols="30" rows="10">{{ $slider->text }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Button Text</label>
                                            <input type="text" class="form-control" name="button_text" value="{{ $slider->button_text }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Button Link</label>
                                            <input type="text" class="form-control" name="button_link" value="{{ $slider->button_link }}">
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



