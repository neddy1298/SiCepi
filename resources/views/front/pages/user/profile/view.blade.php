@extends('front.layouts.main')
@section('user-content')
<div class="card">
    <form action="{{ route('dashboard.user.profile_update', Auth::user()->id) }}" method="post">
        @csrf
        <div class="card-header d-flex">
            <h5>My Profile</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
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
