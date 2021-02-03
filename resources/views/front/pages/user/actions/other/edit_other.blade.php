@extends('front.layouts.main')
@section('user-content')
<div class="card">
    <div class="card-header">
        <h4>Kutipan Baru -> Edit Kutipan ( 2/2 )</h4>
    </div>

    <form method="POST" action="{{ route('user.other_update', $writing->id) }}">
        @csrf
        <div class="card-body">
            <div class="row">
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

                <div class="col-12">
                    <div class="form-group">
                        <label for="">Pilih Topik</label>
                        <select name="topics[]" id="" class="select2" multiple="multiple" data-placeholder="Pilih Topik"
                            data-width="100%">
                            <option value="Age">Age</option>
                            <option value="Alone">Alone</option>
                            <option value="Amazing">Amazing</option>
                            <option value="Anger">Anger</option>
                            <option value="Anniversary">Anniversary</option>
                            <option value="Architecture">Architecture</option>
                        </select>
                    </div>
                </div>

                @foreach ($writingchilds as $writingchild)

                <input type="hidden" name="child_id_{{ $writingchild->id }}" value="{{ $writingchild->id }}">
                <div class="form-group col-12">
                    <label for="tag_body">{{ $writingchild->writing_name }}</label>

                    <textarea class="form-control summernote-simple"
                        name="block_body_{{ $writingchild->id }}">{!! $writingchild->writing_text !!}</textarea>
                    <div class="invalid-feedback">
                    </div>
                </div>

                @endforeach

            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Perubahan Simpan</button>
        </div>
    </form>


</div>
@endsection
