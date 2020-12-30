@extends('layouts.app')

@section('title', 'Template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>User</h1>
    </div>

    <div class="section-body">

        <h2 class="section-title">Ubah Password</h2>

        <form action=" {{ route('dashboard.user.password_update', Auth::user()->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-8 col-sm-12 col-md-12 col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Ubah Password</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="password" class="d-block"><label class="text-danger">*</label> Password
                                    Lama</label>
                                <input id="password" type="password" class="form-control pwstrength"
                                    data-indicator="pwindicator" name="old_password" required>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="d-block"><label class="text-danger">*</label> Password
                                    Baru</label>
                                <input id="password" type="password" class="form-control pwstrength"
                                    data-indicator="pwindicator" name="password" required>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password2" class="d-block"><label class="text-danger">*</label> Password
                                    Confirmation</label>
                                <input id="password2" type="password" class="form-control" name="password-confirm"
                                    required>
                            </div>

                            <div class="form-group offset-10 col-2">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Simpan
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection
