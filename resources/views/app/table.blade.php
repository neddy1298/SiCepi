@extends('layouts.app')

@section('title', 'Template')

@push('stylesheet')

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('plugin') }}/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('plugin') }}/datatables.net-select-bs4/css/select.bootstrap4.min.css">

@endpush

@push('javascript')

<!-- JS Libraies -->
<script src="{{ asset('plugin') }}/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('plugin') }}/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('plugin') }}/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js') }}/page/modules-datatables.js"></script>

@stack('js')
@endpush
