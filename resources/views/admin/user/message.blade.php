
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">

            <div class="section-header justify-content-between">
                <h1>Messages</h1>

            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>User</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            {{-- @foreach ($tours as $tour)

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $tour->package->name }} <br> <a href="{{ route('package',$tour->package->slug) }}" target="_blank"><small class="ms-1">Details Page</small></a> </td>

                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('admin_tour_edit', $tour->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_tour_delete', $tour->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>

                                            @endforeach --}}

                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>

@endsection


