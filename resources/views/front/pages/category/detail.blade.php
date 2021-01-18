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
        <h3 class="text-center my-4"><strong>Kategori: </strong>{{ $writing->catalog }}</h3>
        <h3 class="text-center my-4"><strong>Nama Kutipan: </strong>{{ $writing->name }}</h3>
        <h3 class="text-center my-4"><strong>By: </strong>{{ $writing->user_name }}</h3>


        <form class="text-right mb-3" action="{{ route('category.writing_save', $writing->id) }}" method="post">
            @csrf
            <input type="submit" class="btn btn-primary" value="Simpan Kutipan">
        </form>

        <div class="masonry-quote mb-3">

            @foreach ($blocks as $block)
            <div class="grid-item mb-3">
                <div class="card">
                    <div class="card-header d-flex">
                        <h5>{{ $block->writing_name }}</h5>
                    </div>
                    <div class="card-body">
                        {!! $block->writing_text !!}
                    </div>
                </div>
            </div>
            @endforeach


            <!-- Modal -->
            <div class="modal fade" id="modalGuest" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <h4 class="modal-title text-primary" id="exampleModalLongTitle">Uppss.. <br> sepertinya kamu
                                belum
                                memiliki akun</h4>
                            <div class="mt-5 mb-4">
                                <small class="font-weight-bold text-secondary">Untuk dapat menyimpan dan mengedit
                                    tulisan kamu perlu
                                    masuk akun kamu..</small>
                            </div>
                            <div class="mb-2">
                                <a href="{{ route('login') }}" class="btn btn-primary" style="width:200px">LOGIN</a>
                            </div>

                            <div class="mt-3 mb-2">
                                <small class="font-weight-bold text-secondary">daftar bila belum memiliki akun</small>
                            </div>
                            <div class="mt-3 mb-2">
                                <a href="{{ route('register') }}" class="btn btn-primary-outline"
                                    style="width:200px">DAFTAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
