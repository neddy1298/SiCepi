@extends('layouts.app')

@section('title', 'Template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>User</h1>
    </div>

    <div class="section-body">

        <h2 class="section-title">Buat User Baru</h2>

        <div class="row">
            <div class="col-6 col-sm-12 col-md-12 col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>User Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('dashboard.user.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input id="Name" type="text" class="form-control" name="name" required autofocus>
                                <div class="invalid-feedback">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role">
                                    <option value="User" selected>User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength"
                                        data-indicator="pwindicator" name="password" required>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password2" class="d-block">Password Confirmation</label>
                                    <input id="password2" type="password" class="form-control" name="password-confirm"
                                        required>
                                </div>
                            </div>

                            <div class="form-group offset-6">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Submit
                                </button>
                                <a href="{{ redirect()->back() }}"
                                    class="btn btn-secondary btn-lg btn-block">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
