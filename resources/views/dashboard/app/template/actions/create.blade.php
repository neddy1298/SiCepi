@extends('dashboard.layouts.app')

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
                    <div class="card-header">
                        <h4>Template Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('dashboard.admin.template_store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <div class="control-label mb-2">
                                        <h5>Basic Setting</h5>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input " id="customCheck1"
                                            name="status">
                                        <label class="custom-control-label" for="customCheck1">Publish template (
                                            Publish template jika
                                            dirasa sudah sempurna )</label>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label><span class="text-danger">*</span> Template Catalog</label>
                                    <select class="form-control select2 select2-hidden-accessible" tabindex="-1"
                                        aria-hidden="true" name="catalog_id" id="catalog" onchange="block_form()">
                                        <option hidden disabled selected>Pilih Template Catalog</option>
                                        @foreach ($catalogs as $catalog)

                                        <option value="{{ $catalog->id }}">{{ $catalog->catalog }}</option>
                                        @endforeach
                                        <small><span class="text-danger">**</span> Kamu tidak dapat merubah template
                                            catalog</small>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="template_name"><span class="text-danger">*</span> Nama template</label>
                                    <input id="template_name" type="text" class="form-control" name="template_name"
                                        required autofocus placeholder="tidak boleh lebih dari 50 karakter" max="50">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="template_intro"><span class="text-danger">*</span> Perkenalan
                                        template</label>

                                    <textarea class="form-control" name="template_intro" cols="30" rows="10"
                                        required></textarea>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="block_form" hidden>
                                <div class="form-group col-12 mt-5 mb-3">
                                    <h5>Default Block</h5>
                                </div>

                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label for="block_name"><span class="text-danger">*</span> Block Name</label>
                                    <input id="block_name" type="text" class="form-control" name="block_name">
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

                                <div class="form-group col-12">
                                    <div class="form-group row mb-4">
                                        <label for="tag_body"><span class="text-danger">*</span> Block Body</label>
                                        <div class="col-sm-12 col-md-12">
                                            <textarea class="summernote-simple" name="block_body"
                                                id="text_tag_input"></textarea>
                                        </div>
                                    </div>
                                    <small><span class="text-danger">**</span> Pastikan text dan tag diberi
                                        jarak</small><br>
                                    <small><span class="text-danger">***</span> Contoh : nama saya @{{name}} dengan
                                        email
                                        @{{email_address}} ...</small>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group offset-10 col-1">
                                    <a href="{{ route('dashboard.admin.template') }}"
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
    function block_form()
    {
    var value = document.getElementById("catalog").value;
        if(value == 1){
            document.getElementById("block_form").hidden = true;
        }else{
            document.getElementById("block_form").hidden = false;
        }
    }

    function tag_select()
    {
    var value = document.getElementById("tags_select").value;
    var input = $('#text_tag_input');
    input.val(input.val() + value + ' ');
    }
</script>


@endsection
