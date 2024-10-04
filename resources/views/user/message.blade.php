@extends('front.layout.master')
@section('main_content')

    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Message</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Message</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="page-content user-panel pt_70 pb_70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                   @include('user.sidebar')
                </div>
            </div>

            @if ($message_check)
                {{-- Start Messages List --}}
                <div class="col-lg-5 col-md-12">
                    <h3>All Messages</h3>
                    @foreach ($message_comments as $comment)

                       @php
                           if ($comment->type == 'user') {
                             $sender_data = App\Models\User::where('id', $comment->sender_id)->first();
                           }

                           if ($comment->type == 'admin') {
                            $sender_data = App\Models\Admin::where('id', $comment->sender_id)->first();
                           }
                       @endphp

                        {{-- Messages --}}
                        <div class="rounded message-item @if ($comment->type == 'admin') message-item-admin-border @endif">
                            <div class="message-top">
                                <div class="left">
                                    @if ($sender_data->photo != '')
                                        <img src="{{ asset('uploads/' . $sender_data->photo) }}" alt="">
                                    @else
                                    <img src="{{ asset('uploads/default.png') }}" alt="">
                                    @endif
                                </div>
                                <div class="right">
                                    <h4 class="text-capitalize">{{ $sender_data->name }}</h4>
                                    <h5 class="text-capitalize">{{ $comment->type }}</h5>
                                    <div class="date-time">
                                        <small>
                                            <strong>
                                                {{ $comment->created_at->format('d M Y H:i A') }}
                                            </strong>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="message-bottom">
                                <p>{!! $comment->comment !!}</p>
                            </div>
                        </div>

                    @endforeach

                </div>
                {{-- End Messages List --}}

                {{-- Start Form --}}
                <div class="col-lg-4 col-md-12">
                    <h3>Write a message</h3>
                    <form action="{{ route('user_message_submit') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <textarea name="comment" class="form-control h-150" cols="30" rows="10" placeholder="Write your message here"></textarea>
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                {{-- End Form --}}

            @else
            <div class="col-lg-5 col-md-12">
                <div class="alert alert-danger">
                    <p>No message found.</p>
                    <a href="{{ route('user_message_start') }}" class="btn btn-primary">Start Messaging</a>
                </div>
            </div>
            @endif

        </div>
    </div>
    </div>

@endsection
