@extends('layouts.app')

@section('title', 'Template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Card</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
            <div class="breadcrumb-item">Card</div>
        </div>
    </div>

    <div class="section-body">

        <h2 class="section-title">Tulisan Saya</h2>

        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Card Header</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-primary">
                                View All
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Write something here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
