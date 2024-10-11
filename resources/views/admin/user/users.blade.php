
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">

            <div class="section-header justify-content-between">
                <h1>Users List</h1>

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
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <td>Status</td>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($users as $user)

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @if ($user->photo != '')
                                                            <img src="{{ asset('uploads/' . $user->photo) }}" alt="" class="user-image-circle">
                                                        @else
                                                            <img src="{{ asset('uploads/default.png') }}" alt="" class="user-image-circle">
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td>
                                                        @if ($user->status == 0)
                                                            <span class="badge bg-warning">Pending</span>
                                                        @endif

                                                        @if ($user->status == 1)
                                                            <span class="badge bg-success">Active</span>
                                                        @endif

                                                        @if ($user->status == 2)
                                                            <span class="badge bg-danger">Suspended</span>
                                                        @endif
                                                    </td>
                                                    <td class="pt_10 pb_10">
                                                        <a href="" class="btn btn-danger">Delete</a>
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
            </div>

        </section>

    </div>

@endsection


