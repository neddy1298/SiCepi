@extends('dashboard.layouts.app')

@section('title', 'Pricing')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Beli Tulisan</h1>
    </div>

    <div class="section-body">

        <h2 class="section-title">Beli Tulisan</h2>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 text-center">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="mb-3">
                            <h4>BELI</h4>
                            <h3 class="text-primary">RP. 20.000</h3>
                        </div>
                        <hr>
                        <div class="mb-5">
                            <div><i class="fas fa-check"></i> 20 Tulisan</div>
                        </div>
                        <a class="btn btn-primary" href="#">BELI SEKARANG</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 text-center">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="mb-3">
                            <h4>BELI</h4>
                            <h3 class="text-primary">RP. 50.000</h3>
                        </div>
                        <hr>

                        <div class="mb-5">
                            <div><i class="fas fa-check"></i> 100 Tulisan</div>
                        </div>
                        <a class="btn btn-primary" href="#">BELI SEKARANG</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 text-center">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="mb-3">
                            <h4>BELI</h4>
                            <h3 class="text-primary">RP. 100.000</h3>
                        </div>
                        <hr>
                        <div class="mb-5">
                            <div><i class="fas fa-check"></i> 1000 Tulisan</div>
                        </div>
                        <a class="btn btn-primary" href="#">BELI SEKARANG</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
