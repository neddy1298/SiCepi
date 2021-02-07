@extends('front.layouts.app')
@section('content')
<div class="container">
    <div class="py-4 user">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets') }}/upload/user/{{Auth::user()->image}}" alt="" width="50"
                                class="rounded-circle mr-3">
                            <div>

                                <div class="mb-2"><strong>{{ Auth::user()->name }}</strong></div>
                                <a href="#" class="nav-link dropdown-toggle btn btn-primary btn-sm"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Profile Setting
                                </a>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                    <a class="dropdown-item has-icon" href="{{ route('user.profile') }}">My
                                        Profile</a>
                                    <a class="dropdown-item has-icon" href="{{ route('user.profile_password') }}">Ubah
                                        Password</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="list-group list-group-flush">
                        <label class="list-group-item list-group-item-action text-center">quota:
                            {{ Auth::user()->limit }} / {{  $User_Writings + Auth::user()->limit }}</label>
                        <a href="{{ route('user.create') }}" class="list-group-item list-group-item-action">
                            <img src="" alt="" width="20" class="mr-3"> Buat Kutipan</a>
                        <a href="{{ route('user.writing') }}" class="list-group-item list-group-item-action"><img
                                src="{{ asset('front/images/icon.svg') }}" alt="" width="20" class="mr-3"> Kutipan
                            Saya</a>
                        <a href="{{ route('user.save') }}" class="list-group-item list-group-item-action"><img
                                src="{{ asset('front/images/favorite.svg') }}" alt="" width="20" class="mr-3">
                            Tersimpan</a>
                        <a href="{{ route('user.favorite') }}" class="list-group-item list-group-item-action"><img
                                src="{{ asset('front/images/heart.svg') }}" alt="" width="20" class="mr-3"> Disukai</a>
                        <a href="{{ route('user.purchase') }}" class="list-group-item list-group-item-action"><img
                                src="" alt="" width="20" class="mr-3"> Beli
                            Quota Tulisan</a>
                        <a href="{{ route('user.purchase_history') }}"
                            class="list-group-item list-group-item-action"><img src="" alt="" width="20" class="mr-3">
                            Histori Pembelian</a>
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
