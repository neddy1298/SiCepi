@foreach ($writings as $writing)
<div class="grid-item">
    <div class="card card-quote">
        <div class="card-body">
            <div class="quote-text mb-3">
                <a href="{{ route('category.detail', $writing->id) }}">{{ $writing->name }}</a>
            </div>
            <div class="quote-author row mb-4">
                <div class="col-auto">
                    <label class="d-block mb-0"><small>Publish by</small></label>
                    <div class="text-dark font-weight-bold">SiCEPI</div>
                </div>
                <div class="col-auto ml-auto">
                    <label class="d-block mb-0"><small>Kategori</small></label>
                    <a href="{{ route('category.view', $writing->catalog_id) }}"
                        class="badge badge-primary badge-pill">{{ $writing->catalog }}</a>
                </div>
            </div>
        </div>
        <div class="card-footer">
            @foreach (explode(',',$writing->topics) as $item)
            <a href="{{ route('topics.quotes', $item) }}" class="badge badge-secondary badge-pill">{{ $item }}</a>
            @endforeach
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalGuest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title text-primary" id="exampleModalLongTitle">Uppss.. <br> sepertinya kamu belum
                    memiliki akun</h4>
                <div class="mt-5 mb-4">
                    <small class="font-weight-bold text-secondary">Untuk dapat menyimpan dan mengedit Kutipan kamu perlu
                        masuk akun kamu..</small>
                </div>
                <div class="mb-2">
                    <a href="{{ route('login') }}" class="btn btn-primary" style="width:200px">LOGIN</a>
                </div>

                <div class="mt-3 mb-2">
                    <small class="font-weight-bold text-secondary">daftar bila belum memiliki akun</small>
                </div>
                <div class="mt-3 mb-2">
                    <a href="{{ route('register') }}" class="btn btn-primary-outline" style="width:200px">DAFTAR</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endforeach
