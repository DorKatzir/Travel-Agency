
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Post</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_post_index') }}" class="btn btn-primary">
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

                                <form method="POST" action="{{ route('admin_post_edit_submit', $post->id) }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-8">

                                            <div class="mb-3">
                                                <label class="form-label">Current Photo:</label><br>
                                                <img src="{{ asset('uploads/'. $post->photo) }}" class="w_150">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Change Photo:</label><br>
                                                <input type="file" name="photo" class="form-control" accept="image/*">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Title *</label>
                                                <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Slug:</label>
                                                <input class="form-control" type="text" placeholder="{{ $post->slug }}" aria-label="Disabled input example" disabled>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Description *</label>
                                                <textarea name="description" class="form-control editor">{{ $post->description }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Short Description *</label>
                                                <textarea name="short_description" class="form-control h_100" cols="30" rows="10">{{ $post->short_description }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Category *</label>
                                                <select name="blog_category_id" class="form-select">
                                                    @foreach ($categories as $category)
                                                        <option
                                                            value="{{ $category->id }}"
                                                            @if ( $category->id == $post->blog_category_id )
                                                                selected
                                                            @endif
                                                        >
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">Update</button>
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



