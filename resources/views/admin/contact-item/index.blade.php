
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Contact Items</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin_contactItem_update') }}">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div>
                                                <label class="form-label">Map (iframe code)</label>
                                                <textarea name="map" class="form-control" cols="30" rows="10">{{ $contactItem->map_code }}</textarea>
                                            </div>
                                        </div>
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




