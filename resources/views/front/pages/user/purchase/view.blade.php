@extends('front.layouts.main')
@section('user-content')
<div class="card">
    <form action="{{ route('user.purchase_store') }}" method="post">
        @csrf
        <div class="card-header d-flex">
            <h5>Beli Kutipan</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Code</label>
                <input type="text" class="form-control" name="code" placeholder="Masukkan kode promo">
            </div>
            <div class="form-group">
                <div class="text-right">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
