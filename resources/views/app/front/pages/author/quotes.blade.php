@extends('app.front.layouts.app')
@section('content')
<div class="container">
    <div class="py-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="font-weight-bold">Cari Kutipan</h5>
                <div class="form-group">
                    <div class="icon-group">
                        <select name="" id="" class="select2 form-control form-control-lg" data-multiple="true"
                            multiple>

                            <option value="a">a</option>
                            <option value="b">b</option>
                        </select>
                        <div class="icon">
                            <i class="eva eva-search-outline align-center"></i>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <small>Contoh Author:</small> <a href="#" class="badge badge-light badge-pill">Age</a> <a href="#"
                        class="badge badge-light badge-pill">Alone</a> <a href="#"
                        class="badge badge-light badge-pill">Amazing</a> <a href="#"
                        class="badge badge-light badge-pill">Anger</a> <a href="#"
                        class="badge badge-light badge-pill">Anniversary</a> <a href="#"
                        class="badge badge-light badge-pill">Architecture</a>
                </div>
            </div>
        </div>
        <h3 class="text-center my-4"><strong>Author:</strong> {{ request()->segment(2) }}</h3>
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
    </div>
</div>
@endsection
