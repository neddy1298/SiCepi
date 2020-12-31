@extends('app.front.pages.user.main')
@section('user-content')
<div class="card">
    <div class="card-header d-flex">
        <h5>Buat Kutipan</h5>
        <div class="ml-auto">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="">Pilih Topik</label>
            <select name="" id="" class="select2" multiple="multiple" data-placeholder="Pilih Topik" data-width="100%">
                <option value="a">A</option>
                <option value="b">B</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Isi Kutipan / Quote</label>
            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
    </div>
</div>
@endsection
