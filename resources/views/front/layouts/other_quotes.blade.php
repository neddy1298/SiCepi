@foreach ($writings as $writing)
<div class="grid-item">
    <div class="card card-quote">
        <div class="card-body">
            <div class="quote-text mb-3">
                <a href="{{ route('user.quote_other_detail', $writing->id) }}">{{ $writing->name }}</a>
            </div>
            <div class="quote-author row mb-4">
                <div class="col-auto">
                    <label class="d-block mb-0"><small>Publish by</small></label>
                    <div class="text-dark font-weight-bold">SiCEPI</div>
                </div>
                <div class="col-auto ml-auto">
                    <label class="d-block mb-0"><small>Kategori</small></label>
                    <a href="{{ route('category.category', $writing->category) }}"
                        class="badge badge-primary badge-pill">{{ $writing->category }}</a>
                </div>
            </div>
            <div class="quote-author row">

                <div class="col-auto ml-auto">
                    <label class="d-block mb-0"><small>Tools</small></label>

                    @auth


                    @if ($writing->user_id == Auth::user()->id)

                    <a href="{{ route('user.edit_other' , $writing->id) }}" class="btn btn-light btn-sm btn-rounded"><i
                            class="mdi mdi-pencil-outline align-middle"></i></a>
                    @endif
                    @endauth



                </div>
            </div>
        </div>
        <div class="card-footer">
            @foreach (explode(',',$writing->topics) as $item)
            <a href="{{ route('topics.writing', $item) }}" class="badge badge-secondary badge-pill">{{ $item }}</a>
            @endforeach
        </div>
    </div>
</div>
@endforeach
