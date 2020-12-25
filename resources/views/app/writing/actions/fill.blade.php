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

                    <form method="POST" action="{{ route('dashboard.writing.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama tulisanmu</label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ $template->name }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Tema katalog</label>
                                        <input type="text" class="form-control"
                                            value="{{ $template->catalog }} -> {{ $template->template }}" disabled>
                                        <input type="hidden" name="catalog_id">
                                        <input type="hidden" name="template_id">
                                    </div>
                                </div>
                                @if ($template->catalog_id == 1)
                                <div class="col">
                                    <div class="form-group">
                                        <label>Quote</label>
                                        <textarea class="form-control" name="writing" id="" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                </div>
                                @else
                                <div class="col">
                                    <div class="form-group">
                                        <label>Sales</label>
                                    </div>
                                </div>
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
@endsection
