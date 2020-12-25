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
                        <h4>Tulisan Baru -> Pilih Template ( 1/2 )</h4>
                    </div>
                    <form method="GET" action="{{ route('dashboard.writing.fill') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Beri nama tulisanmu</label>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih katalog tulisanmu</label>
                                        <select class="form-control select2" name="catalog_id">
                                            @foreach ($catalogs as $catalog)
                                            <option value="{{ $catalog->id }}">{{ $catalog->catalog }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih tema tulisanmu</label>
                                        <select class="form-control select2" name="template_id">
                                            @foreach ($templates as $template)
                                            <option value="{{ $template->id }}">{{ $template->template }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="offset-1 col-7">
                                    <div id="accordion">
                                        <div class="accordion">
                                            <div class="accordion-header" role="button" data-toggle="collapse"
                                                data-target="#panel-body-1" aria-expanded="true">
                                                <h4>Tema 1</h4>
                                            </div>
                                            <div class="accordion-body collapse show" id="panel-body-1"
                                                data-parent="#accordion">
                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                    elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                    minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                    commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                    velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                                    cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est
                                                    laborum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
@endsection
