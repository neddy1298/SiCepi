@extends('front.layouts.app')
@section('content')
<div class="container">
    <div class="py-4 user">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('front/images/user/user2--square.png') }}" alt="" width="50"
                                class="rounded-circle mr-3">
                            <div>
                                <div class="mb-2"><strong>{{ Auth::user()->name }}</strong></div>
                                <a href="{{ route('dashboard.user.profile') }}" class="btn btn-primary btn-sm">Profile
                                    Setting</a>
                            </div>
                        </div>

                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('user.quote') }}" class="list-group-item list-group-item-action"><img
                                src="{{ asset('front/images/icon.svg') }}" alt="" width="20" class="mr-3"> Kutipan
                            Saya</a>
                        <a href="{{ route('user.save') }}" class="list-group-item list-group-item-action"><img
                                src="{{ asset('front/images/favorite.svg') }}" alt="" width="20" class="mr-3">
                            Tersimpan</a>
                        <a href="{{ route('user.favorite') }}" class="list-group-item list-group-item-action"><img
                                src="{{ asset('front/images/heart.svg') }}" alt="" width="20" class="mr-3"> Disukai</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @yield('user-content')
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
</div>
@endsection
