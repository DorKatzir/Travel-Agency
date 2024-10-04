
@extends('admin.layout.master')
@section('main_content')

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="main-content">

        <section class="section">

            <div class="section-header justify-content-between">
                <h1>Massages from </h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_message') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Back to Messages
                    </a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">

                    {{-- Start Messages --}}
                    <div class="col-md-7">
                        @foreach ($message_comments as $comment)
                            @php
                                if ($comment->type == 'user') {
                                    $sender_data = App\Models\User::where('id', $comment->sender_id)->first();
                                }

                                if ($comment->type == 'admin') {
                                    $sender_data = App\Models\Admin::where('id', $comment->sender_id)->first();
                                }
                            @endphp
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
                    {{-- End Messages --}}

                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                {{-- Start Form --}}
                                    <h3>Write a message</h3>
                                    <form action="{{ route('admin_message_submit', $id) }}" method="POST">
                                        @csrf
                                        <div class="mb-2">
                                            <textarea name="comment" class="form-control h-150" cols="30" rows="10" placeholder="Write your message here"></textarea>
                                        </div>
                                        <div class="mb-2">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                {{-- End Form --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>

    </div>

@endsection
