@foreach ($writings as $writing)
<div class="grid-item">
    <div class="card card-quote">
        <div class="card-body">
            <div class="quote-text mb-3">
                <a href="{{ route('category.detail', $writing->id) }}">{{ $writing->name }}</a>
            </div>
            <div class="quote-author row mb-4">
                <div class="col-auto">
                    <label class="d-block mb-0"><small>Author</small></label>
                    <div class="text-dark font-weight-bold">{{ $writing->user_name }}</div>
                </div>
                <div class="col-auto">
                    <label class="d-block mb-0"><small>Publish by</small></label>
                    <div class="text-dark font-weight-bold">SiCEPI</div>
                </div>
            </div>
            <div class="quote-author row">

                <div class="col-auto ml-auto">
                    <label class="d-block mb-0"><small>Tools</small></label>

                    @guest
                    <div class="row">

                        <button type="submit" class="btn btn-light btn-sm btn-rounded" data-toggle="modal"
                            data-target="#modalGuest"><i
                                class="mdi mdi-content-save-all-outline align-middle"></i></button>
                        <button type="submit" class="btn btn-light btn-sm btn-rounded" data-toggle="modal"
                            data-target="#modalGuest"><i class="mdi mdi-heart-outline align-middle"></i></button>
                    </div>
                    @endguest

                    @auth
                    <div class="row">
                        @if(!request()->is('user/save'))
                        <form action="{{ route('user.save_store' , $writing->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm btn-rounded"><i
                                    class="mdi mdi-content-save-all-outline align-middle"></i></button>
                        </form>
                        @else
                        <form action="{{ route('user.save_destroy' , $writing->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm btn-rounded"><i
                                    class="mdi mdi-delete-forever align-middle"></i></button>
                        </form>
                        @endif
                        @if(!request()->is('user/favorite'))
                        <form action="{{ route('user.favorite_store' , $writing->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm btn-rounded"><i
                                    class="mdi mdi-heart-outline align-middle"></i></button>
                        </form>
                        @else
                        <form action="{{ route('user.favorite_destroy' , $writing->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm btn-rounded"><i
                                    class="mdi mdi-heart align-middle"></i></button>
                        </form>
                        @endif
                    </div>





                    @if ($writing->user_id == Auth::user()->id)

                    <a href="{{ route('user.edit_quote' , $writing->id) }}" class="btn btn-light btn-sm btn-rounded"><i
                            class="mdi mdi-pencil-outline align-middle"></i></a>
                    @endif
                    @endauth



                </div>
                <div class="col-auto ml-auto">
                    <label class="d-block mb-0"><small>Share</small></label>
                    <a href="#" class="btn btn-light btn-sm btn-rounded" onclick="copy('copy_{{ $writing->id }}')">
                        <i class="mdi mdi-content-copy align-middle"></i>
                    </a>
                    <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                            class="mdi mdi-facebook align-middle"></i></a>
                    <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                            class="mdi mdi-twitter align-middle"></i></a>
                    <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                            class="mdi mdi-instagram align-middle"></i></a>

                    <input type="text" id="quoteText_{{ $writing->id }}" value="{{ $writing->quote }}" hidden>

                    <script>
                        function copy(id){

                            document.getElementById("quoteText_{{ $writing->id }}").select();
                            document.execCommand('copy');

                            // console.log(dummy);
                        }
                    </script>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('category.view', $writing->catalog_id) }}"
                class="badge badge-secondary badge-pill">{{ $writing->catalog }}</a>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalGuest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title text-primary" id="exampleModalLongTitle">Uppss.. <br> sepertinya kamu belum
                    memiliki akun</h4>
                <div class="mt-5 mb-4">
                    <small class="font-weight-bold text-secondary">Untuk dapat menyimpan dan mengedit tulisan kamu perlu
                        masuk akun kamu..</small>
                </div>
                <div class="mb-2">
                    <a href="{{ route('login') }}" class="btn btn-primary" style="width:200px">LOGIN</a>
                </div>

                <div class="mt-3 mb-2">
                    <small class="font-weight-bold text-secondary">daftar bila belum memiliki akun</small>
                </div>
                <div class="mt-3 mb-2">
                    <a href="{{ route('register') }}" class="btn btn-primary-outline" style="width:200px">DAFTAR</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endforeach
