
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Setting Items</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" action="{{ route('admin_setting_update') }}" enctype="multipart/form-data">
                                    @csrf

                                      <div class="row">
                                        <div class="col-md-12">

                                            <h5>Logo</h5>
                                            <div class="row mb-4 mx-2">
                                                <div class="mb-2 mt-2">
                                                    @if ($setting->logo != '')
                                                        <img src="{{ asset('uploads/'. $setting->logo) }}" class="w_200">
                                                    @else
                                                        <div class="text-danger">No Logo Found.</div>
                                                    @endif
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Upload\Change Logo</label><br>
                                                    <input type="file" name="logo" accept=".png, .jpeg, .jpg, .gif, .svg">
                                                </div>
                                            </div>

                                            <h5>Favicon</h5>
                                            <div class="row mb-4 mx-2">
                                                <div class="mb-2 mt-2">
                                                    @if ($setting->favicon != '')
                                                        <img src="{{ asset('uploads/'. $setting->favicon) }}" class="w_40">
                                                    @else
                                                        <div class="text-danger">No Favicon Found.</div>
                                                    @endif
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Upload\Change Favicon</label><br>
                                                    <input type="file" name="favicon" accept=".svg, .ico">
                                                </div>
                                            </div>


                                            <h5>Header</h5>
                                            <div class="row mb-4 mx-2">
                                                <div class="mb-2">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="header_phone" value="{{ $setting->header_phone }}">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="header_email" value="{{ $setting->header_email }}">
                                                </div>
                                            </div>

                                            <h5>Footer</h5>
                                            <div class="row mb-4 mx-2">

                                                <div class="mb-2">
                                                    <label class="form-label">Address *</label>
                                                    <input type="text" class="form-control" name="footer_address" value="{{ $setting->footer_address }}">
                                                </div>

                                                <div class="mb-2">
                                                    <label class="form-label">Email *</label>
                                                    <input type="text" class="form-control" name="footer_email" value="{{ $setting->footer_email }}">
                                                </div>

                                                <div class="">
                                                    <label class="form-label">Phone *</label>
                                                    <input type="text" class="form-control" name="footer_phone" value="{{ $setting->footer_phone }}">
                                                </div>
                                            </div>

                                            <h5>Social Links</h5>
                                            <div class="row mb-4 mx-2">
                                                <div class="mb-2">
                                                    <label class="form-label">Facebook</label>
                                                    <input type="text" class="form-control" name="facebook" value="{{ $setting->facebook }}">
                                                </div>

                                                <div class="mb-2">
                                                    <label class="form-label">Twitter</label>
                                                    <input type="text" class="form-control" name="twitter" value="{{ $setting->twitter }}">
                                                </div>

                                                <div class="mb-2">
                                                    <label class="form-label">Twitter</label>
                                                    <input type="text" class="form-control" name="twitter" value="{{ $setting->twitter }}">
                                                </div>

                                                <div class="mb-2">
                                                    <label class="form-label">Youtube</label>
                                                    <input type="text" class="form-control" name="youtube" value="{{ $setting->youtube }}">
                                                </div>

                                                <div class="mb-2">
                                                    <label class="form-label">Linkedin</label>
                                                    <input type="text" class="form-control" name="linkedin" value="{{ $setting->linkedin }}">
                                                </div>

                                                <div class="mb-2">
                                                    <label class="form-label">Instagram</label>
                                                    <input type="text" class="form-control" name="instagram" value="{{ $setting->instagram }}">
                                                </div>

                                            </div>

                                            <h5>Copyrights</h5>
                                            <div class="row mb-4 mx-2">
                                                <div class="mb-2 mt-2">
                                                    <input type="text" class="form-control" name="copyright" value="{{ $setting->copyright }}">
                                                </div>
                                            </div>

                                            <h5>Banner</h5>
                                            <div class="row mb-4 mx-2">
                                                <div class="mb-2 mt-2">
                                                    @if ($setting->banner != '')
                                                        <img src="{{ asset('uploads/'. $setting->banner) }}" class="rounded w_300">
                                                    @else
                                                        <div class="text-danger">No Banner Found.</div>
                                                    @endif
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Upload\Change Banner</label><br>
                                                    <input type="file" name="banner" accept="image/*">
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <button type="submit" class="btn btn-primary">Update Setting</button>
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




