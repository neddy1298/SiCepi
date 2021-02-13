@extends('front.layouts.app')
@section('content')
<div class="container">
    <div class="py-3">
        <div class="jumbotron">
            <h1 class="display-4">Topik Kutipan</h1>
            <p class="lead">Sedang mencari kutipan dari topik favorit mu? Koleksi kutipan kami telah disusun menurut
                topik untuk memudahkan anda menemukan <strong>Kutipn</strong> atau <strong>Quotes</strong> yang bagus
            </p>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination mb-3">

                <li class="page-item flex-fill text-center"><a class="page-link" href="#">A</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">B</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">C</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">D</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">E</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">F</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">G</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">H</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">I</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">J</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">K</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">L</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">M</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">N</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">O</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">P</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">Q</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">R</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">S</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">T</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">U</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">V</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">W</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">X</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">Y</a></li>
                <li class="page-item flex-fill text-center"><a class="page-link" href="#">Z</a></li>

            </ul>
        </nav>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <h3 class="font-weight-bold">Topik Populer</h3>
                        <div class="column-link-group column-5">
                            @foreach ($Topics->where('popular', 1) as $PopularTopic)
                            <a href="{{ route('topics.writing', $PopularTopic->name) }}"
                                class="column-link-list">{{ $PopularTopic->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <h3 class="font-weight-bold">Semua Topik</h3>
                        <div class="column-link-group column-5">
                            @foreach ($Topics as $PopularTopic)
                            <a href="{{ route('topics.writing', $PopularTopic->name) }}"
                                class="column-link-list">{{ $PopularTopic->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
