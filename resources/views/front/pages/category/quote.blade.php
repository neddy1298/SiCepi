@extends('front.layouts.app')
@section('content')
<div class="container">
    <div class="py-4">
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="text-center">
                    <img src="{{ asset('images/icon.svg') }}" alt="" class="d-block mx-auto mb-2">
                    <strong>"Kutipan Indah Untuk Siapa Saja"</strong>
                </h1>
                <div class="text-center mb-2">
                    <small class="font-weight-bold text-secondary">Cari kutipan yang anda inginkan di sini:</small>
                </div>
                <div class="form-group">
                    @include('front.layouts.search')

                </div>
            </div>
        </div>
        <h3 class="text-center my-4"><strong>Kategori:</strong> Quote</h3>
        <div class="masonry-quote mb-3 grid">
            @include('front.layouts.quotes')
        </div>
    </div>
</div>
@endsection
