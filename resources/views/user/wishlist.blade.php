@extends('front.layout.master')
@section('main_content')

    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Wishlist</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Wishlist</li>
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
                <div class="col-lg-9 col-md-12">
                    @if ($wishlist->count() > 0 )
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 60px;">SL</th>
                                        <th class="w-150">Photo</th>
                                        <th>Package</th>
                                        <th class="w-100">Action</th>
                                    </tr>
                                    @foreach ($wishlist as $item)
                                        <tr class="" style="vertical-align: middle;">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/' . $item->package->featured_photo) }}" alt="" class="w-150 rounded">
                                            </td>
                                            <td>
                                                <a href="{{ route('package', $item->package->slug) }}" style="white-space: nowrap;" class="" target="_blank">
                                                    {{ $item->package->name }}
                                                </a>
                                            </td>

                                            <td>
                                                <a href="{{ route('user_wishlist_delete', $item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are You Sure?')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            Your Wishlist is empty.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
