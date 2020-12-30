@extends('layouts.app')

@section('title', 'Template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Template</h1>
    </div>

    <div class="section-body">

        <h2 class="section-title">Buat Template Baru</h2>

        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action=" {{ route('dashboard.admin.block_update', $block->id) }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="form-group col-12 mb-3">
                                    <h6>Menambahkan block untuk:
                                        {{ $block->catalog }} -> <a
                                            href="{{ route('dashboard.admin.template_edit', $block->template_id) }}">{{ $block->template_name }}</a>
                                    </h6>
                                </div>

                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label for="block_name"><span class="text-danger">*</span> Block Name</label>
                                    <input id="block_name" type="text" class="form-control" name="block_name"
                                        value="{{ $block->block_name }}" required>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label><span class="text-danger">*</span> Block Style</label>
                                    <select class="form-control select2 select2-hidden-accessible" tabindex="-1"
                                        aria-hidden="true">
                                        <option>Normal</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label><span class="text-danger">*</span> Template Catalog</label>
                                    <select class="form-control" tabindex="-1" aria-hidden="true" id="tags_select"
                                        onchange="tag_select()">
                                        <option hidden disabled selected>Pilih Tag</option>
                                        @foreach ($tags as $tag)

                                        <option value="{{ $tag->tag_body }}">{{ $tag->tag_name }} ->
                                            {{ $tag->tag_body }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="text" hidden value="{{ $block->template_id }}" name="template_id">

                                <div class="form-group col-12">
                                    <label for="tag_body"><span class="text-danger">*</span> Block Body</label>

                                    <textarea class="form-control summernote-simple" name="block_body"
                                        id="text_tag_input summernote" required>{{ $block->block_body }}</textarea>
                                    <small><span class="text-danger">**</span> Pastikan text dan tag diberi
                                        jarak</small><br>
                                    <small><span class="text-danger">***</span> Contoh nama saya @{{name}} dengan email
                                        @{{email_address}} ...</small>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="form-group offset-10 col-1">
                                    <a href="{{ route('dashboard.admin.template_edit', $block->template_id) }}"
                                        class="btn btn-secondary btn-lg btn-block">Kembali</a>
                                </div>
                                <div class="form-group col-1">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function tag_select()
    {
    var value = document.getElementById("tags_select").value;
    var input = $('#text_tag_input');
    // $('#summernote').summernote('reset');
    // $('#summernote').summernote('insertText', 'Hello, world');
    var get_code = $('#summernote').summernote('code');
    console.log(get_code);
    // edit.val(input.val() + value + ' ');
    }
</script>


@endsection
