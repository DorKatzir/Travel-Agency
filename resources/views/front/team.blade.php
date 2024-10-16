
@extends('front.layout.master')

@section('main_content')

    <div class="page-top" style="background-image: url({{ asset('uploads/' . $settingItem->banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Team Members</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Team Members</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="team pt_70">
        <div class="container">
            <div class="row">
                @foreach ($team as $member )
                    <div class="col-lg-3 col-md-6">
                        <div class="item pb_50">
                            <div class="photo">
                                <img src="{{ asset('uploads/'.$member->photo) }}" alt="" />
                            </div>
                            <div class="text">
                                <h2><a href="{{ route('member', $member->slug) }}">{{ $member->name }}</a></h2>
                                <div class="designation">{{ $member->designation }}</div>
                                <div class="social">
                                    <ul>
                                        <li class="{{ !$member->facebook ? 'd-none' : ''}}"><a href="{{ $member->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="{{ !$member->twitter ? 'd-none' : ''}}"><a href="{{ $member->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                        <li class="{{ !$member->linkedin ? 'd-none' : ''}}"><a href="{{ $member->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="{{ !$member->instagram ? 'd-none' : ''}}"><a href="{{ $member->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container pb_50">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                {{ $team->links() }}
            </div>
        </div>
    </div>

@endsection
