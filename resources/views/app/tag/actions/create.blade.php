@extends('layouts.app')

@section('title', 'Template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Card</h1>
    </div>

    <div class="section-body">

        <h2 class="section-title">Tulisan Saya</h2>

        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Card Header</h4>
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
