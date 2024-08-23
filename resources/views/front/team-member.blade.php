
@extends('front.layout.master')

@section('main_content')

    <div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $member->name }}</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('team') }}">Volunteers</a></li>
                            <li class="breadcrumb-item active">{{ $member->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="team-single pt_70 pb_70 bg_f3f3f3">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$member->photo) }}" alt="">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>{{ $member->name }}</td>
                            </tr>
                            <tr>
                                <td>Designation</td>
                                <td>{{ $member->designation }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $member->address }}</td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td>{{ $member->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $member->phone }}</td>
                            </tr>
                            <tr>
                                <td>Social Media</td>
                                <td>
                                    <ul>
                                        <li class="{{ !$member->facebook ? 'd-none' : ''}}"><a href="{{ $member->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="{{ !$member->twitter ? 'd-none' : ''}}"><a href="{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li class="{{ !$member->linkedin ? 'd-none' : ''}}"><a href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="{{ !$member->instagram ? 'd-none' : ''}}"><a href="{{ $member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-md-12 mt_30">
                    <h4>Biography</h4>
                    <div class="description">
                        {!! $member->biography !!}
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
