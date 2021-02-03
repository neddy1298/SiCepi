@extends('front.layouts.main')
@section('user-content')
<div class="card">
    <div class="card-header d-flex">
        <h5>Kutipan Baru -> Pilih Template ( 2/2 )</h5>
    </div>
    <form method="POST" action="{{ route('user.build_other_store', $writing->id) }}">
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
                                4. Jika kamu membuat ulang template Kutipanmu akan tereset menjadi
                                tampilan awal template;
                            </strong>
                        </p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>nama kutipanmu</label>
                        <input name="name" type="text" class="form-control" value="{{ $writing->name }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Tema katalog</label>
                        <input type="text" class="form-control"
                            value="{{ $writing->catalog }} -> {{ $writing->template_name }}" disabled>
                    </div>
                </div>
                @foreach ($fields as $field)

                <div class="col-12">
                    <div class="form-group">
                        {{-- <label>{{ $field }}</label> --}}

                        <label>{{ $field->tag_name }}</label>
                        <input type="text" class="form-control" placeholder="e.g. {{ $field->tag_field }}"
                            name="{{ $field->tag_field }}" required>

                        <small>{{ $field->promp_text }}</small>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Berikutnya</button>
        </div>
    </form>
</div>
@endsection
