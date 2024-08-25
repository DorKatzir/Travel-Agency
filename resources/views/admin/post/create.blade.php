
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Create Post</h1>
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

                                <form method="POST" action="{{ route('admin_post_create_submit') }}" enctype="multipart/form-data">
                                    @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Photo *</label><br>
                                            <input class="form-control" type="file" name="photo" accept="image/*"  value="{{ old('photo') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Title *</label>
                                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Short Description *</label>
                                            <textarea name="short_description" class="form-control h_100" cols="30" rows="10">{{ old('short_description') }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description *</label>
                                            <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Category *</label>
                                            <select name="blog_category_id" class="form-select">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>

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


