@extends('layouts.app')

@section('title', 'Tulisan Baru')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tulisan Baru</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tulisan Baru -> Edit Tulisan ( 2/2 )</h4>
                    </div>

                    <form method="POST" action="{{ route('dashboard.writing.update', $writing->id) }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama tulisanmu</label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ $writing->name }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Tema katalog</label>
                                        <input type="text" class="form-control"
                                            value="{{ $writing->catalog }} -> {{ $writing->template_name }}" disabled>
                                    </div>
                                </div>

                                @foreach ($writingchilds as $writingchild)

                                @if ($writing->catalog_id == 1)
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ $writing->writing_name }}</label>
                                        <input type="hidden" name="child_id_{{ $writingchild->id }}"
                                            value="{{ $writingchild->id }}">
                                        <textarea class="form-control" name="block_body_{{ $writingchild->id }}"
                                            cols="30" rows="10" onkeyup="quote()"
                                            id="block_body">{{ $writingchild->writing_text }}</textarea>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Tampilan quote</label>

                                        <blockquote id="tampilan_quote">{{ $writingchild->writing_text }}</blockquote>
                                    </div>
                                </div>
                                @else
                                <input type="hidden" name="child_id_{{ $writingchild->id }}"
                                    value="{{ $writingchild->id }}">
                                <div class="form-group col-12">
                                    <label for="tag_body">{{ $writingchild->writing_name }}</label>

                                    <textarea class="form-control summernote-simple"
                                        name="block_body_{{ $writingchild->id }}"
                                        id="text_tag_input">{{ $writingchild->writing_text }}</textarea>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                @endif
                                @endforeach

                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Perubahan Simpan</button>
                        </div>
                    </form>


                </div>
            </div>

        </div>

    </div>
</section>
<script>
    function quote() {
        document.getElementById('tampilan_quote').innerHTML = "";
        var quote = document.getElementById('block_body').value;
        document.getElementById('tampilan_quote').innerHTML = quote;
    }
</script>
@endsection
