
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Home Item</h1>

            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                {{-- <form method="POST" action="{{ route('admin_homeItem_update', $homeItem->id) }}"> --}}
                                <form method="POST" action="">
                                    @csrf
                                    {{-- Destination --}}
                                    <div class="mb-3">
                                        <label class="form-label">Destination Heading *</label>
                                        <input type="text" class="form-control" name="destination_heading" value="{{ $homeItem->destination_heading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Destination Subheading *</label>
                                        <input type="text" class="form-control" name="destination_subheading" value="{{ $homeItem->destination_subheading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Destination Status </label>
                                        <select name="destination_status" class="form-select">
                                            <option value="show" {{ $homeItem->destination_status == 'show' ? 'selected' : ''  }}>show</option>
                                            <option value="hide" {{ $homeItem->destination_status == 'hide' ? 'selected' : ''  }}>hide</option>
                                        </select>
                                    </div>
                                    {{-- End Destination --}}



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




