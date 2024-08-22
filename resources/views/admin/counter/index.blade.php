
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Counter Item</h1>

            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" action="{{ route('admin_counter_update', $counterItem->id) }}">
                                    @csrf

                                    <div class="row mb-4 border-5 border-start">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Number *</label>
                                                <input type="text" class="form-control" name="item1_number" value="{{ $counterItem->item1_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Text *</label>
                                                <input type="text" class="form-control" name="item1_text" value="{{ $counterItem->item1_text }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4 border-5 border-start">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Number *</label>
                                                <input type="text" class="form-control" name="item2_number" value="{{ $counterItem->item2_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Text *</label>
                                                <input type="text" class="form-control" name="item2_text" value="{{ $counterItem->item2_text }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4 border-5 border-start">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Number *</label>
                                                <input type="text" class="form-control" name="item3_number" value="{{ $counterItem->item3_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Text *</label>
                                                <input type="text" class="form-control" name="item3_text" value="{{ $counterItem->item3_text }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4 border-5 border-start">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Number *</label>
                                                <input type="text" class="form-control" name="item4_number" value="{{ $counterItem->item4_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Text *</label>
                                                <input type="text" class="form-control" name="item4_text" value="{{ $counterItem->item4_text }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label">Status </label>
                                        <select name="status" class="form-select">
                                            <option value="show" {{ $counterItem->status == 'show' ? 'selected' : ''  }}>show</option>
                                            <option value="hide" {{ $counterItem->status == 'hide' ? 'selected' : ''  }}>hide</option>
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




