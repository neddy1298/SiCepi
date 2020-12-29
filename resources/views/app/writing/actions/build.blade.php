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
                                <div class="col-12">
                                    <div class="form-group">
                                        <h6>Notice :</h6>
                                        <p>
                                            1. Semua field harus diisi; <br>
                                            2. Kamu dapat merubah text setelah membuild template; <br>
                                            3. Kamu dapat membuat ulang template; <br>
                                            <strong>
                                                4. Jika kamu membuat ulang template tulisanmu akan tereset menjadi
                                                tampilan awal template;
                                            </strong>
                                        </p>
                                    </div>
                                </div>
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
                                @foreach ($fields as $field)

                                <div class="col-12">
                                    <div class="form-group">
                                        {{-- <label>{{ $field }}</label> --}}

                                        <label>{{ $field->tag_name }}</label>
                                        <input type="text" class="form-control"
                                            placeholder="e.g. {{ $field->tag_field }}" name="{{ $field->tag_body }}"
                                            required>

                                        <small>{{ $field->promp_text }}</small>
                                    </div>
                                </div>

                                @endforeach

                                @endif
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Berikutnya</button>
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
