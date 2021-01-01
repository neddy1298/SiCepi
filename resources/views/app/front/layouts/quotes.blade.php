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
                @auth
                <div class="col-auto ml-auto">
                    <label class="d-block mb-0"><small>Tools</small></label>
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



                </div>
                @endauth
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

@endforeach
