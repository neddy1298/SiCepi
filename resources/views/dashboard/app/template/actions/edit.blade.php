@extends('dashboard.layouts.app')

@section('title', 'Template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Template</h1>
    </div>

    <div class="section-body">

        <h2 class="section-title">Edit Template</h2>

        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Template Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('dashboard.admin.template_update', $template->id) }}" method="POST">
                            @csrf
                            <div class="row mb-5">
                                <div class="form-group col-12">
                                    <div class="control-label mb-2">
                                        <h5>Basic Setting</h5>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        @if ($template->status == 'Published')

                                        <input type="checkbox" class="custom-control-input " id="customCheck1"
                                            name="status" checked="true">

                                        @else
                                        <input type="checkbox" class="custom-control-input " id="customCheck1"
                                            name="status">
                                        @endif
                                        <label class=" custom-control-label" for="customCheck1">Publish template (
                                            Publish template jika
                                            dirasa sudah sempurna )</label>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12" data-select2-id="2">
                                    <label><span class="text-danger">*</span> Template Catalog</label>
                                    <select class="form-control select2 select2-hidden-accessible" tabindex="-1"
                                        aria-hidden="true" name="catalog_id">
                                        <option value="{{ $template->catalog_id }}">{{ $template->catalog }}</option>
                                    </select>
                                    <small><span class="text-danger">**</span> Kamu tidak dapat merubah template
                                        catalog</small>
                                </div>
                                <div class="form-group col-12">
                                    <label for="template_name"><span class="text-danger">*</span> Nama template</label>
                                    <input id="template_name" type="text" class="form-control" name="template_name"
                                        required autofocus placeholder="tidak boleh lebih dari 50 karakter" max="50"
                                        value="{{ $template->template_name }}">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="tag_body"><span class="text-danger">*</span> Perkenalan template</label>

                                    <textarea class="form-control" name="template_intro" id="" cols="30" rows="10"
                                        placeholder="jelaskan kegunaan template ini">{{ $template->template_intro }}</textarea>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>


                                <div class="form-group col-12 mt-5 mb-3">
                                    <h5> Default Block</h5>
                                    <a href="{{ route('dashboard.admin.block_create', $template->id) }}"
                                        class="btn btn-primary mb-3 mt-3"><i class="fas fa-plus-square"></i> add
                                        block</a>

                                </div>

                                @foreach ($blocks as $block)
                                <div class="form-group col-12 card card-primary">

                                    <div class="card-header">
                                        <h4>{{ $block->block_name }}
                                            <a href="{{ route('dashboard.admin.block_edit', $block->id) }}"
                                                class="text-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="#" class="text-danger"
                                                data-confirm="Hapus Block?|Kamu yakin ingin menghapus {{ $block->block_name }}"
                                                data-confirm-yes="window.location.href='{{ route('dashboard.admin.block_delete', $block->id) }}'">
                                                <i class="fas fa-trash"></i></a>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <p>{!! $block->block_body !!}</p>
                                    </div>

                                </div>
                                @endforeach



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

@endsection
