
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Videos of {{ $package->name }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_package_index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Go Back
                    </a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">

                    {{-- <div class="col-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Video</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($destinationVids as $item)
                                                @if ( $item->video )
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <iframe width="300" height="169" src="https://www.youtube.com/embed/{!! $item->video !!}?si=bU93xTZw-vXJm10L" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                        </td>

                                                        <td class="pt_10 pb_10">
                                                            <a href="{{ route('admin_destination_video_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-5">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin_destination_video_submit', $destination->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label">Video (YouTube Id) *:</label>
                                        <input type="text" class="form-control w_300" name="video">
                                    </div>

                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}


                </div>
            </div>
        </section>

    </div>

@endsection



