@extends('app.front.layouts.app')
@section('content')
<div class="hero-section jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-md-auto">

                <h1 class="text-center">
                    <img src="{{ asset('images/icon.svg') }}" alt="" class="d-block mx-auto mb-2">
                    <strong>"Kutipan Indah Untuk Siapa Saja"</strong>
                </h1>
                <div class="text-center mb-2">
                    <small class="font-weight-bold text-secondary">Cari kutipan yang anda inginkan di sini:</small>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <select name="" id="" class="form-control ">
                                <option value="">Semua</option>
                                <option value="">Topik</option>
                                <option value="">Author</option>
                            </select>
                        </div>
                        <input type="text" class="form-control input-search-quote"
                            placeholder="Cari kutipan atau dengan Hashtag #">
                        <!-- <div class="icon-group">
                            <div class="icon">
                                <a href="#" class="icon-group-link"><i class="eva eva-search-outline align-middle"></i></a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="text-center">
                    <small>Hashtag Populer Hari Ini:</small> <a href="#" class="badge badge-light badge-pill">Age</a> <a
                        href="#" class="badge badge-light badge-pill">Alone</a> <a href="#"
                        class="badge badge-light badge-pill">Amazing</a> <a href="#"
                        class="badge badge-light badge-pill">Anger</a> <a href="#"
                        class="badge badge-light badge-pill">Anniversary</a> <a href="#"
                        class="badge badge-light badge-pill">Architecture</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="author-section">
    <div class="container">
        <h3 class="font-weight-bold mb-3">Rekomendasi Quotes Hari ini</h3>
        <div class="masonry-quote mb-3 grid">

            <div class="grid-item">
                <div class="card card-quote">
                    <div class="card-body">
                        <div class="quote-text mb-3">
                            “Achieving life is not the equivalent of avoiding death.”
                        </div>
                        <div class="quote-author row">
                            <div class="col-auto">
                                <label class="d-block mb-0"><small>Author</small></label>
                                <div><a href="#" class="text-dark font-weight-bold">Sicepi</a></div>
                            </div>
                            <div class="col-auto ml-auto">
                                <label class="d-block mb-0"><small>Share</small></label>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="eva eva-copy-outline align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-facebook align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-twitter align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-instagram align-middle"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="badge badge-secondary badge-pill">Age</a> <a href="#"
                            class="badge badge-secondary badge-pill">Alone</a> <a href="#"
                            class="badge badge-secondary badge-pill">Amazing</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anger</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anniversary</a> <a href="#"
                            class="badge badge-secondary badge-pill">Architecture</a>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="card card-quote">
                    <div class="card-body">
                        <div class="quote-text mb-3">
                            "Dare to be true: nothing can need a lie; A fault which needs it most, grows two thereby.”
                        </div>
                        <div class="quote-author row">
                            <div class="col-auto">
                                <label class="d-block mb-0"><small>Author</small></label>
                                <div><a href="#" class="text-dark font-weight-bold">Sicepi</a></div>
                            </div>
                            <div class="col-auto ml-auto">
                                <label class="d-block mb-0"><small>Share</small></label>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="eva eva-copy-outline align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-facebook align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-twitter align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-instagram align-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="badge badge-secondary badge-pill">Age</a> <a href="#"
                            class="badge badge-secondary badge-pill">Alone</a> <a href="#"
                            class="badge badge-secondary badge-pill">Amazing</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anger</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anniversary</a> <a href="#"
                            class="badge badge-secondary badge-pill">Architecture</a>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="card card-quote">
                    <div class="card-body">
                        <div class="quote-text mb-3">
                            “I took a speed reading course and read 'War and Peace' in twenty minutes. It involves
                            Russia.”
                        </div>
                        <div class="quote-author row">
                            <div class="col-auto">
                                <label class="d-block mb-0"><small>Author</small></label>
                                <div><a href="#" class="text-dark font-weight-bold">Sicepi</a></div>
                            </div>
                            <div class="col-auto ml-auto">
                                <label class="d-block mb-0"><small>Share</small></label>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="eva eva-copy-outline align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-facebook align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-twitter align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-instagram align-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="badge badge-secondary badge-pill">Age</a> <a href="#"
                            class="badge badge-secondary badge-pill">Alone</a> <a href="#"
                            class="badge badge-secondary badge-pill">Amazing</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anger</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anniversary</a> <a href="#"
                            class="badge badge-secondary badge-pill">Architecture</a>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="card card-quote">
                    <div class="card-body">
                        <div class="quote-text mb-3">
                            “Love is a canvas furnished by Nature and embroidered by imagination.”
                        </div>
                        <div class="quote-author row">
                            <div class="col-auto">
                                <label class="d-block mb-0"><small>Author</small></label>
                                <div><a href="#" class="text-dark font-weight-bold">Sicepi</a></div>
                            </div>
                            <div class="col-auto ml-auto">
                                <label class="d-block mb-0"><small>Share</small></label>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="eva eva-copy-outline align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-facebook align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-twitter align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-instagram align-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="badge badge-secondary badge-pill">Age</a> <a href="#"
                            class="badge badge-secondary badge-pill">Alone</a> <a href="#"
                            class="badge badge-secondary badge-pill">Amazing</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anger</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anniversary</a> <a href="#"
                            class="badge badge-secondary badge-pill">Architecture</a>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="card card-quote">
                    <div class="card-body">
                        <div class="quote-text mb-3">
                            “It is amazing what you can accomplish if you do not care who gets the credit.”
                        </div>
                        <div class="quote-author row">
                            <div class="col-auto">
                                <label class="d-block mb-0"><small>Author</small></label>
                                <div><a href="#" class="text-dark font-weight-bold">Sicepi</a></div>
                            </div>
                            <div class="col-auto ml-auto">
                                <label class="d-block mb-0"><small>Share</small></label>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="eva eva-copy-outline align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-facebook align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-twitter align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-instagram align-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="badge badge-secondary badge-pill">Age</a> <a href="#"
                            class="badge badge-secondary badge-pill">Alone</a> <a href="#"
                            class="badge badge-secondary badge-pill">Amazing</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anger</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anniversary</a> <a href="#"
                            class="badge badge-secondary badge-pill">Architecture</a>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="card card-quote">
                    <div class="card-body">
                        <div class="quote-text mb-3">
                            “I hate quotations. Tell me what you know.”
                        </div>
                        <div class="quote-author row">
                            <div class="col-auto">
                                <label class="d-block mb-0"><small>Author</small></label>
                                <div><a href="#" class="text-dark font-weight-bold">Sicepi</a></div>
                            </div>
                            <div class="col-auto ml-auto">
                                <label class="d-block mb-0"><small>Share</small></label>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="eva eva-copy-outline align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-facebook align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-twitter align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-instagram align-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="badge badge-secondary badge-pill">Age</a> <a href="#"
                            class="badge badge-secondary badge-pill">Alone</a> <a href="#"
                            class="badge badge-secondary badge-pill">Amazing</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anger</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anniversary</a> <a href="#"
                            class="badge badge-secondary badge-pill">Architecture</a>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="card card-quote">
                    <div class="card-body">
                        <div class="quote-text mb-3">
                            “I don't necessarily agree with everything I say.”
                        </div>
                        <div class="quote-author row">
                            <div class="col-auto">
                                <label class="d-block mb-0"><small>Author</small></label>
                                <div><a href="#" class="text-dark font-weight-bold">Sicepi</a></div>
                            </div>
                            <div class="col-auto ml-auto">
                                <label class="d-block mb-0"><small>Share</small></label>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="eva eva-copy-outline align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-facebook align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-twitter align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-instagram align-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="badge badge-secondary badge-pill">Age</a> <a href="#"
                            class="badge badge-secondary badge-pill">Alone</a> <a href="#"
                            class="badge badge-secondary badge-pill">Amazing</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anger</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anniversary</a> <a href="#"
                            class="badge badge-secondary badge-pill">Architecture</a>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="card card-quote">
                    <div class="card-body">
                        <div class="quote-text mb-3">
                            “I don't necessarily agree with everything I say.”
                        </div>
                        <div class="quote-author row">
                            <div class="col-auto">
                                <label class="d-block mb-0"><small>Author</small></label>
                                <div><a href="#" class="text-dark font-weight-bold">Sicepi</a></div>
                            </div>
                            <div class="col-auto ml-auto">
                                <label class="d-block mb-0"><small>Share</small></label>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="eva eva-copy-outline align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-facebook align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-twitter align-middle"></i></a>
                                <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                                        class="mdi mdi-instagram align-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="badge badge-secondary badge-pill">Age</a> <a href="#"
                            class="badge badge-secondary badge-pill">Alone</a> <a href="#"
                            class="badge badge-secondary badge-pill">Amazing</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anger</a> <a href="#"
                            class="badge badge-secondary badge-pill">Anniversary</a> <a href="#"
                            class="badge badge-secondary badge-pill">Architecture</a>
                    </div>
                </div>
            </div>


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
