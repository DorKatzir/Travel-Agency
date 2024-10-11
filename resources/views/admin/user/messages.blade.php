
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
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($messages as $message)

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @if ($message->user->photo != '')
                                                            <img src="{{ asset('uploads/' . $message->user->photo) }}" alt="" class="w_50">
                                                        @else
                                                            <img src="{{ asset('uploads/default.png') }}" alt="" class="w_50">
                                                        @endif
                                                    </td>
                                                    <td>{{ $message->user->name }}</td>
                                                    <td>{{ $message->user->email }}</td>
                                                    <td>{{ $message->user->phone }}</td>
                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('admin_message_detail', $message->id) }}" class="btn btn-primary">Messages</a>
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


