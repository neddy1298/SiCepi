{{-- Manual Transfer --}}
<div class="modal fade" tabindex="-1" role="dialog" id="manual_transfer">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <span>Silahkan lakukan pembayaran sebesar</span>
                </div>
                <div class="col-12 mt-3 mb-2">
                    <h3>Rp.{{ $package->price }}</h3><br>
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
