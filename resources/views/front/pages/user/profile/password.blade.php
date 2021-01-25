@extends('front.layouts.main')
@section('user-content')
<div class="card">
    <form action="{{ route('dashboard.user.password_update', Auth::user()->id ) }}" method="post">
        @csrf
        <div class="card-header d-flex">
            <h5>My Profile</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="password" class="d-block"><label class="text-danger">*</label> Password
                    Lama</label>
                <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                    name="old_password" required>
            </div>
            <div class="form-group">
                <label for="password" class="d-block"><label class="text-danger">*</label> Password
                    Baru</label>
                <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                    name="password" required>
            </div>
            <div class="form-group">
                <label for="password2" class="d-block"><label class="text-danger">*</label> Password
                    Confirmation</label>
                <input id="password2" type="password" class="form-control" name="password-confirm" required>
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
