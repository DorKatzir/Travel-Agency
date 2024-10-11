
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Create User</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_users') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-circle-left"></i>
                        Back to Users
                    </a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" action="{{ route('admin_user_create_submit') }}" enctype="multipart/form-data">
                                    @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Photo</label><br>
                                            <input type="file" name="photo">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Name *</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email *</label>
                                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <input type="text" class="form-control" name="state" value="{{ old('state') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Zip</label>
                                            <input type="text" class="form-control" name="zip" value="{{ old('zip') }}">
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



