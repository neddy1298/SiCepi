@extends('front.layouts.main')


@section('user-content')
<div class="card">
    <div class="card-header d-flex">
        <h5>Beli Quota Tulisan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="template-table">
                <thead>
                    <tr>
                        <th>Nama Paket</th>
                        <th>Value</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)

                    <tr>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->value }} quota</td>
                        <td>Rp.{{ $package->price }}</td>
                        <td width="20%">
                            <div>
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#Purchase_{{ $package->id }}">Beli</button>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($packages as $package)



{{-- Choose Payment --}}
<div class="modal fade" tabindex="-1" role="dialog" id="Purchase_{{ $package->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Checkout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <table class="table table-striped m-2" id="template-table">
                <thead>
                    <tr>
                        <th>Nama Paket</th>
                        <th>Value</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->value }}</td>
                        <td>Rp.{{ $package->price }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="modal-header">
                <h5 class="modal-title">Metode Pembayaran</h5>
            </div>
            <div class="mr-3 ml-3">
                <tr>
                    <div class="form-check row">
                        <div class="col-8">
                            <input class="form-check-input" type="radio" name="method"
                                id="manual_transfer_{{ $package->id }}" value="manual_transfer"
                                onclick="manual_transfer_{{ $package->id }}()" required>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Manual Transfer
                            </label>
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('assets') }}/img/bca_logo.png" width="100%">
                        </div>
                    </div>
                    <hr>
                    <div class="form-check row">
                        <div class="col-12">
                            <input class="form-check-input" type="radio" name="method" disabled>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Online Banking
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-check row">
                        <div class="col-12">
                            <input class="form-check-input" type="radio" name="method" disabled>
                            <label class="form-check-label" for="flexRadioDefault2">
                                E-Wallet
                            </label>
                        </div>
                    </div>
                </tr>

            </div>

            <div class="modal-footer bg-whitesmoke br">
                <form action="{{ route('user.purchase_store', $package->id) }}" method="post">
                    @csrf
                    <input type="text" name="method" id="method_{{$package->id}}" hidden>
                    <button type="submit" class="btn btn-primary">Beli</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    function manual_transfer_{{$package->id}}() {
        var id = {!! json_encode($package->id) !!};
        var method = "metode_pembayaran_"+id;
        document.getElementById("method_"+id).value = "Manual_Transfer";
    }
</script>
@endforeach


@endsection
