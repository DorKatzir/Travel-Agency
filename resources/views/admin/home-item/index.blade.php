
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

                                <form method="POST" action="{{ route('admin_homeItem_update', $homeItem->id) }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Destination Heading *</label>
                                        <input type="text" class="form-control" name="destination_heading" value="{{ $homeItem->destination_heading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Destination Subheading *</label>
                                        <input type="text" class="form-control" name="destination_subheading" value="{{ $homeItem->destination_subheading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Status </label>
                                        <select name="status" class="form-select">
                                            <option value="show" {{ $homeItem->destination_status == 'show' ? 'selected' : ''  }}>show</option>
                                            <option value="hide" {{ $homeItem->destination_status == 'hide' ? 'selected' : ''  }}>hide</option>
                                        </select>
                                    </div>



                                    <div class="row mb-4">
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Item 1 - Text *</label>
                                                <input type="text" class="form-control" name="item1_text" value="{{ $homeItem->item1_text }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Item 2 - Number *</label>
                                                <input type="text" class="form-control" name="item2_number" value="{{ $homeItem->item2_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Item 2 - Text *</label>
                                                <input type="text" class="form-control" name="item2_text" value="{{ $homeItem->item2_text }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Item 3 - Number *</label>
                                                <input type="text" class="form-control" name="item3_number" value="{{ $homeItem->item3_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Item 3 - Text *</label>
                                                <input type="text" class="form-control" name="item3_text" value="{{ $homeItem->item3_text }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Item 4 - Number *</label>
                                                <input type="text" class="form-control" name="item4_number" value="{{ $homeItem->item4_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Item 4 - Text *</label>
                                                <input type="text" class="form-control" name="item4_text" value="{{ $homeItem->item4_text }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label">Status </label>
                                        <select name="status" class="form-select">
                                            <option value="show" {{ $homeItem->status == 'show' ? 'selected' : ''  }}>show</option>
                                            <option value="hide" {{ $homeItem->status == 'hide' ? 'selected' : ''  }}>hide</option>
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




