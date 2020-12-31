@extends('app.front.layouts.app')
@section('content')
<div class="hero-section jumbotron d-flex py-0 align-items-center mb-0" style="height: 600px">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-md-auto">

                <h1 class="text-center">
                    <img src="{{ asset('images/icon.svg') }}" alt="" class="d-block mx-auto mb-2">
                    <strong>Login Sininis untuk bisa membuat, menyimpan, dan menkoleksi kutipan di Sicepi</strong>
                </h1>
                <div class="text-center mb-2">
                    <small class="font-weight-bold text-secondary">Klik login atau daftar untuk melanjutkan</small>
                </div>
                <div class="form-group text-center">
                    <a href="{{ route('login') }}" class="btn btn-primary">Login Sekarang</a>
                    <a href="{{ route('register') }}" class="btn btn-light">Daftar Akun</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
