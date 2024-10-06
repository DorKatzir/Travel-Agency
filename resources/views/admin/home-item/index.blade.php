
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Home Items</h1>

            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        <form method="POST" action="{{ route('admin_homeItem_update') }}">
                            @csrf
                            {{-- Destination --}}
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Destination Heading</label>
                                        <input type="text" class="form-control" name="destination_heading" value="{{ $homeItem->destination_heading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Destination Subheading</label>
                                        <input type="text" class="form-control" name="destination_subheading" value="{{ $homeItem->destination_subheading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Destination Status</label>
                                        <select name="destination_status" class="form-select">
                                            <option value="show" {{ $homeItem->destination_status == 'show' ? 'selected' : ''  }}>show</option>
                                            <option value="hide" {{ $homeItem->destination_status == 'hide' ? 'selected' : ''  }}>hide</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- End Destination --}}




                            {{-- Feature --}}
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Features Status</label>
                                        <select name="feature_status" class="form-select">
                                            <option value="show" {{ $homeItem->feature_status == 'show' ? 'selected' : ''  }}>show</option>
                                            <option value="hide" {{ $homeItem->feature_status == 'hide' ? 'selected' : ''  }}>hide</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- End Feature --}}


                            {{-- Package --}}
                            <div class="card">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <label class="form-label">Package Heading</label>
                                        <input type="text" class="form-control" name="package_heading" value="{{ $homeItem->package_heading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Package Subheading</label>
                                        <input type="text" class="form-control" name="package_subheading" value="{{ $homeItem->package_subheading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Package Status</label>
                                        <select name="package_status" class="form-select">
                                            <option value="show" {{ $homeItem->package_status == 'show' ? 'selected' : ''  }}>show</option>
                                            <option value="hide" {{ $homeItem->package_status == 'hide' ? 'selected' : ''  }}>hide</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- End Package --}}

                            {{-- Tesstimonial --}}
                            <div class="card">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <label class="form-label">Testimonial Heading</label>
                                        <input type="text" class="form-control" name="testimonial_heading" value="{{ $homeItem->testimonial_heading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Testimonial Subheading</label>
                                        <input type="text" class="form-control" name="testimonial_subheading" value="{{ $homeItem->testimonial_subheading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Testimonial Status</label>
                                        <select name="testimonial_status" class="form-select">
                                            <option value="show" {{ $homeItem->testimonial_status == 'show' ? 'selected' : ''  }}>show</option>
                                            <option value="hide" {{ $homeItem->testimonial_status == 'hide' ? 'selected' : ''  }}>hide</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- End Tesstimonial --}}

                            {{-- Blog --}}
                            <div class="card">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <label class="form-label">Blog Heading</label>
                                        <input type="text" class="form-control" name="blog_heading" value="{{ $homeItem->blog_heading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Blog Subheading</label>
                                        <input type="text" class="form-control" name="blog_subheading" value="{{ $homeItem->blog_subheading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Blog Status</label>
                                        <select name="blog_status" class="form-select">
                                            <option value="show" {{ $homeItem->blog_status == 'show' ? 'selected' : ''  }}>show</option>
                                            <option value="hide" {{ $homeItem->blog_status == 'hide' ? 'selected' : ''  }}>hide</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- End Blog --}}





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




