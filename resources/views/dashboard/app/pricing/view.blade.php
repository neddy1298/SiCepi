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
                        <div class="card-header-form">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#createCode">Buat
                                Baru</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="template-table">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Value</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($codes as $code)
                                    <tr>
                                        <td>{{ $code->code }}</td>
                                        <td>{{ $code->value }}</td>
                                        <td width="20%">
                                            <div>
                                                <button class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editCode_{{ $code->id }}"><i
                                                        class="fas fa-pencil-alt"></i></button>
                                                <button class="btn btn-danger"
                                                    data-confirm="Hapus User?|Kamu yakin ingin menghapus: {{ $code->code }}"
                                                    data-confirm-yes="window.location.href='{{ route('dashboard.pricing_delete', $code->id) }}'">
                                                    <i class="fas fa-trash"></i></button>

                                            </div>
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


{{-- Create --}}
<div class="modal fade" tabindex="-1" role="dialog" id="createCode">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Promo Code Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.pricing_store') }}" method="post">
                @csrf
                <div class="modal-body">


                    <div class="form-group">
                        <label for="catalog"><span class="text-danger">*</span> Promo Code</label>
                        <input id="catalog" type="text" class="form-control" name="code" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description"><span class="text-danger">*</span> Value</label>
                        <input id="catalog" type="number" class="form-control" name="value" value="{{ $code->code }}"
                            required>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($codes as $code)

{{-- Edit --}}
<div class="modal fade" tabindex="-1" role="dialog" id="editCode_{{ $code->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Promo Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.pricing_update', $code->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="catalog"><span class="text-danger">*</span> Promo Code</label>
                        <input id="catalog" type="text" class="form-control" name="code" value="{{ $code->code }}"
                            required>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description"><span class="text-danger">*</span> Value</label>
                        <input id="catalog" type="number" class="form-control" name="value" value="{{ $code->value }}"
                            required>
                        <div class="invalid-feedback">

                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


@endsection

@push('js')
<script>
    $(document).ready( function () {
    $('#template-table').DataTable();
} );
</script>
@endpush
