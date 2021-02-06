@extends('dashboard.layouts.app')

@section('title', 'Template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>User</h1>
    </div>

    <div class="section-body">

        <h2 class="section-title">Edit User</h2>

        <div class="row">
            <div class="col-6 col-sm-12 col-md-12 col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Edit User</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('dashboard.user.update', $user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input id="Name" type="text" class="form-control" name="name" required autofocus
                                    value="{{ $user->name }}">
                                <div class="invalid-feedback">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required
                                    value="{{ $user->email }}">
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="is_admin">
                                    <option value="{{ $user->is_admin }}" hidden>
                                        {{ ($user->is_admin == 1)?'Admin':'User' }}</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>

                            <div class="row">

                                <div class="form-group offset-6 col-3">
                                    <a href="{{ route('dashboard.user.index') }}"
                                        class="btn btn-secondary btn-lg btn-block">Kembali</a>
                                </div>
                                <div class="form-group col-3">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Edit
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
