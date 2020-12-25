@extends('layouts.app')

@section('title', 'Template')

@push('stylesheet')

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('plugin') }}/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('plugin') }}/datatables.net-select-bs4/css/select.bootstrap4.min.css">

@endpush

@section('content')

<section class="section">
    <div class="section-header">
        <h1>@yield('header', 'title')</h1>
        <div class="section-header-breadcrumb">
            {{ request()->path() }}
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @yield('card-header')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @yield('table')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('javascript')

<!-- JS Libraies -->
<script src="{{ asset('plugin') }}/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('plugin') }}/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('plugin') }}/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js') }}/page/modules-datatables.js"></script>

@stack('js')
@endpush
