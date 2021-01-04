@extends('dashboard.layouts.app')

@section('title', 'Template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>User</h1>
    </div>

    <div class="section-body">

        <h2 class="section-title">My Profile</h2>

        <form action=" {{ route('dashboard.user.profile_update', Auth::user()->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-8 col-sm-12 col-md-12 col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>My Profile</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input id="Name" type="text" class="form-control" name="name" required
                                    value="{{ Auth::user()->name }}">
                                <div class="invalid-feedback">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required
                                    value="{{ Auth::user()->email }}">
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group offset-8 col-2">
                                    <a href="{{ route('dashboard.user.index') }}"
                                        class="btn btn-secondary btn-lg btn-block">Kembali</a>
                                </div>
                                <div class="form-group col-2">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-12 col-md-12 col-lg-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>My Avatar</h4>
                        </div>
                        <div class="card-body">
                            <div id="image-preview" class="form-group image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="image-upload" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection
