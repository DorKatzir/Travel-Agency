
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Welcome</h1>

            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" action="{{ route('admin_welcom_update', $welcomeItem->id) }}" enctype="multipart/form-data">
                                    @csrf

                                        <div class="row row-gap-5">
                                            <div class="col-md-4 w_400">

                                                <div class="mb-3">
                                                    <label class="form-label">Current Photo</label><br>
                                                    <img width="300" height="169"src="{{ asset('uploads/'. $welcomeItem->photo) }}"">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Change Photo:</label><br>
                                                    <input class="form-control w_300" type="file" name="photo">
                                                </div>

                                            </div>

                                            <div class="col-md-4 w_400">

                                                <div class="mb-2">
                                                    <label class="form-label">Current Video</label>

                                                    <iframe width="300" height="169" src="https://www.youtube.com/embed/{{ $welcomeItem->video }}?si=bU93xTZw-vXJm10L" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Change Video (YouTube Id) *:</label>
                                                    <input type="text" class="form-control w_300" name="video" value="{{ $welcomeItem->video }}">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Title *</label>
                                            <input type="text" class="form-control" name="title" value="{{ $welcomeItem->title }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description *</label>
                                            <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $welcomeItem->description }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Button Text</label>
                                            <input type="text" class="form-control" name="button_text" value="{{ $welcomeItem->button_text }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Button Link</label>
                                            <input type="text" class="form-control" name="button_link" value="{{ $welcomeItem->button_link }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Status </label>
                                            <select name="status" class="form-select">
                                                <option value="show" {{ $welcomeItem->status == 'show' ? 'selected' : ''  }}>show</option>
                                                <option value="hide" {{ $welcomeItem->status == 'hide' ? 'selected' : ''  }}>hide</option>
                                            </select>
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




