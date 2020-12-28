@extends('layouts.app')

@section('title', 'Template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tag</h1>
    </div>

    <div class="section-body">

        <h2 class="section-title">Buat Tag Baru</h2>

        <div class="row">
            <div class="col-8 col-sm-12 col-md-12 col-lg-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Tag Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('dashboard.admin.tag_store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="tag_name"><span class="text-danger">*</span> Nama Tag</label>
                                    <input id="tag_name" type="text" class="form-control" name="tag_name" required
                                        autofocus
                                        placeholder="e.g. Nama Tag, nama dari tag, ditampilkan di label input">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label for="tag_body"><span class="text-danger">*</span> Tag Body</label>
                                    <input id="tag_body" type="text" class="form-control" name="tag_body" required
                                        placeholder="e.g. nama_tag, otomatis manambahkan @{{ nama_tag }}">
                                    <small><span class="text-danger">**</span> Tag tidak dapat di edit</small>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="default_replace"><span class="text-danger">*</span> Default Replace</label>
                                <input id="default_replace" type="text" class="form-control" name="default_replace"
                                    placeholder="ini akan menjadi value default jika user tidak memasukkan inputan">
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="promp_text">Promp Text</label>
                                <textarea id="promp_text" type="text" class="form-control" name="promp_text"
                                    placeholder="promp text untuk membantu user"></textarea>
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group offset-6 col-3">
                                    <a href="{{ route('dashboard.admin.tag') }}"
                                        class="btn btn-secondary btn-lg btn-block">Kembali</a>
                                </div>
                                <div class="form-group col-3">
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
