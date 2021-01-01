@extends('app.front.layouts.app')
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
                    <form action="{{ route('quote.search') }}" method="get">
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
                    @include('app.front.layouts.tags')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="author-section">
    <div class="container">
        <h3 class="font-weight-bold mb-3">Rekomendasi Quotes Hari ini</h3>
        <div class="masonry-quote mb-3 grid">
            @include('app.front.layouts.quotes')
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="font-weight-bold">Penulis Populer</h3>
                        <div class="column-link-group">
                            <a href="#" class="column-link-list">A. P. J. Abdul Kalam</a>
                            <a href="#" class="column-link-list">Aldous Huxley</a>
                            <a href="#" class="column-link-list">Alexandria Ocasio-Cortez</a>
                            <a href="#" class="column-link-list">Aristotle</a>
                            <a href="#" class="column-link-list">Barack Obama</a>
                            <a href="#" class="column-link-list">Benjamin Franklin</a>
                            <a href="#" class="column-link-list">Buddha</a>
                            <a href="#" class="column-link-list">Carl Jung</a>
                            <a href="#" class="column-link-list">Chanakya</a>
                            <a href="#" class="column-link-list">Charles Spurgeon</a>
                            <a href="#" class="column-link-list">Dalai Lama</a>
                            <a href="#" class="column-link-list">Donald Trump</a>
                            <a href="#" class="column-link-list">Edgar Allan Poe</a>
                            <a href="#" class="column-link-list">Eleanor Roosevelt</a>
                            <a href="#" class="column-link-list">Ernest Hemingway</a>
                            <a href="#" class="column-link-list">Francis of Assisi</a>
                            <a href="#" class="column-link-list">Franklin D. Roosevelt</a>
                            <a href="#" class="column-link-list">Friedrich Nietzsche</a>
                            <a href="#" class="column-link-list">George Bernard Shaw</a>
                            <a href="#" class="column-link-list">George Carlin</a>
                            <a href="#" class="column-link-list">George S. Patton</a>
                            <a href="#" class="column-link-list">Groucho Marx</a>
                            <a href="#" class="column-link-list">H. L. Mencken</a>
                            <a href="#" class="column-link-list">Henry David Thoreau</a>
                            <a href="#" class="column-link-list">J. K. Rowling</a>
                            <a href="#" class="column-link-list">James Baldwin</a>
                            <a href="#" class="column-link-list">Jerry Garcia</a>
                            <a href="#" class="column-link-list">Jesus Christ</a>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <h3 class="font-weight-bold">Topik Populer</h3>
                        <div class="column-link-group">
                            <a href="#" class="column-link-list">Age</a>
                            <a href="#" class="column-link-list">Alone</a>
                            <a href="#" class="column-link-list">Amazing</a>
                            <a href="#" class="column-link-list">Anger</a>
                            <a href="#" class="column-link-list">Anniversary</a>
                            <a href="#" class="column-link-list">Architecture</a>
                            <a href="#" class="column-link-list">Art Favorite</a>
                            <a href="#" class="column-link-list">Attitude</a>
                            <a href="#" class="column-link-list">Beauty</a>
                            <a href="#" class="column-link-list">Best</a>
                            <a href="#" class="column-link-list">Birthday</a>
                            <a href="#" class="column-link-list">Brainy</a>
                            <a href="#" class="column-link-list">Business</a>
                            <a href="#" class="column-link-list">Car</a>
                            <a href="#" class="column-link-list">Chance</a>
                            <a href="#" class="column-link-list">Change</a>
                            <a href="#" class="column-link-list">Christmas</a>
                            <a href="#" class="column-link-list">Communication</a>
                            <a href="#" class="column-link-list">Computers</a>
                            <a href="#" class="column-link-list">Cool</a>
                            <a href="#" class="column-link-list">Courage</a>
                            <a href="#" class="column-link-list">Dad</a>
                            <a href="#" class="column-link-list">Dating</a>
                            <a href="#" class="column-link-list">Death</a>
                            <a href="#" class="column-link-list">Design</a>
                            <a href="#" class="column-link-list">Diet</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
