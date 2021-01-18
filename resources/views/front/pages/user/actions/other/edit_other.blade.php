@extends('front.layouts.main')
@section('user-content')
<div class="card">
    <div class="card-header">
        <h4>Tulisan Baru -> Edit Tulisan ( 2/2 )</h4>
    </div>

    <form method="POST" action="{{ route('user.other_update', $writing->id) }}">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Nama tulisanmu</label>
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
