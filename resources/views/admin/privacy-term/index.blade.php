
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Privacy&Terms Items</h1>

            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        <form method="POST" action="{{ route('admin_privacyTerms_update') }}">
                            @csrf
                            {{-- Feature --}}
                            {{-- <div class="card">
                                <div class="card-body">
                                    <h4>Feature Section</h4>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="feature_status" class="form-select">
                                            <option value="Show" {{ $aboutItem->feature_status == 'Show' ? 'selected' : ''  }}>Show</option>
                                            <option value="Hide" {{ $aboutItem->feature_status == 'Hide' ? 'selected' : ''  }}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- End Feature --}}
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-grid col-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
