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
                        <h4>Tulisan Baru -> Pilih Template ( 2/2 )</h4>
                    </div>

                    <form method="POST" action="{{ route('dashboard.writing.build_store', $writing->id) }}">
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
                                @if ($writing->catalog_id == 1)
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Quote</label>
                                        <textarea class="form-control" name="writing" cols="30" rows="10"
                                            onkeypress="quote()" id="quote_text"></textarea>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Tampilan quote</label>

                                        <blockquote id="tampilan_quote"></blockquote>
                                    </div>
                                </div>
                                @else
                                @foreach ($writingchilds as $writingchild)

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ $writingchild->writing_name }}</label>

                                        <label></label>
                                        <textarea class="form-control" name="writing[]"
                                            required>{{ $writingchild->writing_text }}</textarea>
                                    </div>
                                </div>

                                @endforeach

                                @endif
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
        var quote = document.getElementById('quote_text').value;
        document.getElementById('tampilan_quote').innerHTML = quote;
    }
</script>
@endsection
