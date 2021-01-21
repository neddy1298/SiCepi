@extends('front.layouts.main')


@section('user-content')
<div class="card">
    <div class="card-header d-flex">
        <h5>Histori Pembelian</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="template-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Value</th>
                        <th>Tanggal Penggunaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $history)

                    <tr>
                        <td></td>
                        <td>{{ $history->code }}</td>
                        <td>{{ $history->value }}</td>
                        <td>{{ $history->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
