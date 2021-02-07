@extends('dashboard.app.table')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Template</h1>
        <div class="section-header-breadcrumb">
            {{ request()->path() }}
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Promo Code</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="template-table">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>User Name</th>
                                        <th>Nama Paket</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packages as $package)
                                    <tr>
                                        <td>{{ $package->code }} <br> {{ $package->created_at->format("d/m/Y | H:i") }}
                                        </td>
                                        <td>{{ $package->user_name }} <br> ({{ $package->email }})</td>
                                        <td>{{ $package->name }} <br> ({{ $package->value }} quota)</td>
                                        <td>Rp. {{ $package->price }} <br> {{ $package->method }}</td>
                                        <td>{{ $package->status }}</td>
                                        <td>
                                            @if($package->status == "Menunggu Konfirmasi")
                                            <div class="row">
                                                <form action="{{ route('dashboard.payment_confirm', $package->id) }}"
                                                    method="POST" class="mr-2">
                                                    @csrf
                                                    <input type="text" name="status" value="Transaksi Selesai" hidden>
                                                    <button type="submit" class="btn btn-primary">
                                                        Konfirmasi
                                                    </button>
                                                </form>
                                                <form action="{{ route('dashboard.payment_confirm', $package->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="text" name="status" value="Transaksi Ditolak" hidden>
                                                    <button type="submit" class="btn btn-danger">
                                                        Tolak Transaksi
                                                    </button>
                                                </form>
                                            </div>
                                            @elseif($package->status == "Transaksi Ditolak")
                                            <button class="btn btn-danger">
                                                Transaksi Ditolak
                                            </button>
                                            @else
                                            <button class="btn btn-success" disabled>
                                                Transaksi Selesai
                                            </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('js')
<script>
    $(document).ready( function () {
    $('#template-table').DataTable();
} );
</script>
@endpush
