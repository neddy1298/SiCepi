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
                        <th>Code</th>
                        <th>User</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $history)

                    <tr>
                        <td>
                            {{ $history->code }}
                            <br>
                            {{ $history->created_at->format("d/m/Y | H:i") }}
                        </td>
                        <td>{{ $history->user_name }} <br> ({{ $history->email }})</td>
                        <td>{{ $history->name }} <br> ({{ $history->value }} Quota)</td>
                        <td>Rp.{{ $history->price }} <br> {{ $history->method }}</td>
                        @if ($history->status == "Menunggu Konfirmasi")
                        <td class="text-warning">
                            {{ $history->status }}</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#{{ $history->method }}_{{ $history->id }}">Bayar</button>
                        </td>

                        @elseif ($history->status == "Transaksi Ditolak")
                        <td class="text-danger">
                            {{ $history->status }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" disabled>Ditolak</button>
                        </td>
                        @else
                        <td class="text-success">
                            {{ $history->status }}</td>
                        <td>
                            <button class="btn btn-success btn-sm" disabled>Selesai</button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($histories as $history)

{{-- Manual Transfer --}}
<div class="modal fade" tabindex="-1" role="dialog" id="Manual_Transfer_{{ $history->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row text-center">
                <div class="col-12 mt-3 mb-3">
                    <span>{{ $history->code }}</span>
                </div>
                <div class="col-12">
                    <span>Silahkan lakukan pembayaran sebesar</span>
                </div>
                <div class="col-12 mt-3 mb-3">
                    <h3>Rp.{{ $history->price }}</h3><br>
                    <span>Ke rekening BCA</span>
                </div>

                <div class="ml-4 col-4 mb-3">
                    <img src="{{ asset('assets') }}/img/bca_logo.png" width="100%">
                </div>
                <div class="col-auto">
                    <div class="row">
                        <h2>123456789</h2>
                    </div>
                    <div class="row">
                        <small>SICEPI INDONESIA</small>
                    </div>
                </div>

            </div>

            <div class="modal-footer bg-whitesmoke">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Konfirmasi">
                    <span>Konfirmasi</span>
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                    <span>Close</span>
                </button>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection
