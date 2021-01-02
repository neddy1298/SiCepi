@foreach ($quotes as $quote)
<div class="grid-item">
    <div class="card card-quote">
        <div class="card-body">
            <div class="quote-text mb-3">
                “{{ $quote->quote }}”
            </div>
            <div class="quote-author row mb-4">
                <div class="col-auto">
                    <label class="d-block mb-0"><small>Author</small></label>
                    <div><a href="{{ route('author.quotes', $quote->author) }}"
                            class="text-dark font-weight-bold">{{ $quote->author }}</a></div>
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
                        <form action="{{ route('user.save_store' , $quote->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm btn-rounded"><i
                                    class="mdi mdi-content-save-all-outline align-middle"></i></button>
                        </form>
                        <form action="{{ route('user.favorite_store' , $quote->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm btn-rounded"><i
                                    class="mdi mdi-heart-outline align-middle"></i></button>
                        </form>
                    </div>





                    @if ($quote->user_id == Auth::user()->id)

                    <a href="{{ route('user.edit_quote' , $quote->id) }}" class="btn btn-light btn-sm btn-rounded"><i
                            class="mdi mdi-pencil-outline align-middle"></i></a>
                    @endif
                    @endauth



                </div>
                <div class="col-auto ml-auto">
                    <label class="d-block mb-0"><small>Share</small></label>
                    <a href="#" class="btn btn-light btn-sm btn-rounded" onclick="copy('copy_{{ $quote->id }}')">
                        <i class="mdi mdi-content-copy align-middle"></i>
                    </a>
                    <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                            class="mdi mdi-facebook align-middle"></i></a>
                    <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                            class="mdi mdi-twitter align-middle"></i></a>
                    <a href="#" class="btn btn-light btn-sm btn-rounded"><i
                            class="mdi mdi-instagram align-middle"></i></a>

                    <input type="text" id="quoteText_{{ $quote->id }}" value="{{ $quote->quote }}" hidden>

                    <script>
                        function copy(id){

                            document.getElementById("quoteText_{{ $quote->id }}").select();
                            document.execCommand('copy');

                            // console.log(dummy);
                        }
                    </script>
                </div>
            </div>
        </div>
        <div class="card-footer">
            @foreach (explode(',',$quote->topics) as $item)
            <a href="{{ route('topics.quotes', $item) }}" class="badge badge-secondary badge-pill">{{ $item }}</a>
            @endforeach
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
                    <a href="{{ route('register') }}" class="btn btn-info" style="width:200px">DAFTAR</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endforeach
