
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Faqs of {{ $package->name }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_package_index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Go Back
                    </a>
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-9">
                        <div class="card">
                            <div class="card-body">
                                <h5>Current:</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Question</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($package_faqs as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->question }}</td>
                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('admin_package_faq_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-9">
                        <div class="card">
                            <div class="card-body">
                                <h5>Create:</h5>
                                <form method="POST" action="{{ route('admin_package_faq_submit', $package->id) }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label">Question *:</label>
                                        <input type="text" class="form-control" name="question" value="{{ old('question') }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Answer *:</label>
                                        <textarea class="form-control editor" name="answer">{{ old('answer') }}</textarea>
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



