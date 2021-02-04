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
                        <div class="row mb-5">
                            <div class="form-group col-lg-6 col-md-12 col-sm-12" data-select2-id="2">
                                <span>User : <a href="{{ route('dashboard.user.edit', $writing->user_id) }}">
                                        {{ $writing->email }}</a></span>
                            </div>
                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                <span for="template_name">Update Time : {{ $writing->updated_at }}
                                </span>
                            </div>

                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                <span for="tag_body">Writing Name : {{ $writing->name }}</span>
                            </div>
                            <div class="form-group col-lg-6 col-md-12 col-sm-12 mb-5">
                                <span for="tag_body">Generate From : <a
                                        href="{{ route('dashboard.admin.template_edit', $writing->template_id) }}">{{ $writing->category }}
                                        ->
                                        {{ $writing->template_name }}</a></span>
                            </div>

                            @foreach ($blocks as $block)
                            <div class="form-group col-lg-8 col-md-12 col-sm-12 card card-primary">

                                <div class="card-header">
                                    <h4>{{ $block->writing_name }}</h4>
                                </div>
                                <div class="card-body">
                                    <p>{!! $block->writing_text !!}</p>
                                </div>

                            </div>
                            @endforeach

                            <div class="form-group offset-10 col-1">
                                <a href="{{ route('dashboard.admin.user_writing') }}"
                                    class="btn btn-secondary btn-lg btn-block">Kembali</a>
                            </div>
                            <div class="form-group col-1">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
