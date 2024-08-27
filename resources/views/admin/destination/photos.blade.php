
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Photos of {{ $destination->name }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_destination_index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Go Back
                    </a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">

                    <div class="col-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($destination->photos as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <img src="{{ asset('uploads/'.$item->photo) }}" class="w_150">
                                                    </td>

                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('admin_destination_photos_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin_destination_photos_submit', $destination->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label">Photo *</label><br>
                                        <input class="form-control" type="file" name="photo" accept="image/*">
                                    </div>

                                    <div class="mb-4">
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



