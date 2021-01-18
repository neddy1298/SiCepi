@extends('dashboard.layouts.app')

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
                    <form method="post" action="{{ route('dashboard.writing.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Beri nama tulisanmu</label>
                                        <input name="name" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pilih Topik</label>
                                        <select name="topics" id="" class="select2" data-placeholder="Pilih Topik"
                                            data-width="100%" required>
                                            <option value="Age">Age</option>
                                            <option value="Alone">Alone</option>
                                            <option value="Amazing">Amazing</option>
                                            <option value="Anger">Anger</option>
                                            <option value="Anniversary">Anniversary</option>
                                            <option value="Architecture">Architecture</option>
                                        </select>
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
