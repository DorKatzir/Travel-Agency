
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
                                                <th class="w_40">SL</th>
                                                <th>Photo</th>
                                                <th>User Info</th>
                                                <th>Address Info</th>
                                                <th>Status</th>
                                                <th class="w_40">Action</th>
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
                                                    <td>
                                                        <div>
                                                            <small class="m-0 p-0">Name:
                                                                <strong> {{ $user->name }}</strong>
                                                            </small>
                                                        <div>
                                                            <small class="m-0 p-0">Email:
                                                                <strong> {{ $user->email }}</strong>
                                                            </small>
                                                        </div>
                                                        <div>
                                                            <small class="m-0 p-0">Phone:
                                                                <strong> {{ $user->phone }}</strong>
                                                            </small>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div>
                                                            <small class="m-0 p-0">Country:
                                                                <strong> {{ $user->country }}</strong>
                                                            </small>
                                                        <div>
                                                        <div>
                                                            <small class="m-0 p-0">City:
                                                                <strong> {{ $user->city }}</strong>
                                                            </small>
                                                        </div>
                                                        <div>
                                                            <small class="m-0 p-0">Street:
                                                                <strong> {{ $user->address }}</strong>
                                                            </small>
                                                        <div>
                                                        <div>
                                                            <small class="m-0 p-0">Zip:
                                                                <strong> {{ $user->zip }}</strong>
                                                            </small>
                                                        <div>
                                                    </td>

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
                                                    <td>
                                                        {{-- <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a> --}}
                                                        <a href="" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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


