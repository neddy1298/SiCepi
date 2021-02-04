@extends('front.layouts.app')
@section('content')
<div class="hero-section jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-md-auto">

                <h1 class="text-center">
                    <img src="{{ asset('front/images/icon.svg') }}" alt="" class="d-block mx-auto mb-2">
                    <strong>"Kutipan Indah Untuk Siapa Saja"</strong>
                </h1>
                <div class="text-center mb-2">
                    <small class="font-weight-bold text-secondary">Cari kutipan yang anda inginkan di sini:</small>
                </div>
                <div class="form-group">
                    <form action="{{ route('writing.search') }}" method="get">
                        @csrf

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <select name="key" id="" class="form-control ">
                                    <option value="Semua">Semua</option>
                                    <option value="Topik">Topik</option>
                                    <option value="Author">Author</option>
                                </select>
                            </div>
                            <input type="text" class="form-control input-search-quote"
                                placeholder="Cari kutipan atau dengan Hashtag #" name="search">
                            <!-- <div class="icon-group">
                            <div class="icon">
                                <a href="#" class="icon-group-link"><i class="eva eva-search-outline align-middle"></i></a>
                            </div>
                        </div> -->
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <small>Hashtag Populer Hari Ini:</small>
                    @include('front.layouts.tags')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="author-section">
    <div class="container">
        <h3 class="font-weight-bold mb-3">Rekomendasi Kutipan Hari ini</h3>
        <div class="masonry-quote mb-3 grid">
            @include('front.layouts.writings')
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="font-weight-bold">Penulis Populer</h3>
                        <div class="column-link-group">
                            @foreach ($Authors as $PopularAuthor)
                            <a href="{{ route('author.writing', $PopularAuthor->name) }}"
                                class="column-link-list">{{ $PopularAuthor->name }}</a>
                            @endforeach
                        </div>

                    </div>
                    <div class="col-md-6">
                        <h3 class="font-weight-bold">Topik Populer</h3>
                        <div class="column-link-group">
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
