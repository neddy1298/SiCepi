@extends('app.table')

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
                        <h4>List Catalog</h4>
                        <div class="card-header-form">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#createCatalog">Buat
                                Baru</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="template-table">
                                <thead>
                                    <tr>
                                        <th>Nama Catalog</th>
                                        <th>Deskripsi Catalog</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catalogs as $catalog)
                                    <tr>
                                        <td>{{ $catalog->catalog }}</td>
                                        <td>{{ $catalog->description }}</td>
                                        <td width="20%">
                                            <div>
                                                <button class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editCatalog_{{ $catalog->id }}"><i
                                                        class="fas fa-pencil-alt"></i></button>
                                                <button class="btn btn-danger"
                                                    data-confirm="Hapus User?|Kamu yakin ingin menghapus: {{ $catalog->catalog }}"
                                                    data-confirm-yes="window.location.href='{{ route('dashboard.admin.catalog_delete', $catalog->id) }}'">
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
<div class="modal fade" tabindex="-1" role="dialog" id="createCatalog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Catalog Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.admin.catalog_store') }}" method="post">
                @csrf
                <div class="modal-body">


                    <div class="form-group">
                        <label for="catalog"><span class="text-danger">*</span> Nama Catalog</label>
                        <input id="catalog" type="text" class="form-control" name="catalog" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description"><span class="text-danger">*</span> Deskripsi Catalog</label>
                        <textarea name="description" class="form-control"></textarea>
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

@foreach ($catalogs as $catalog)

{{-- Edit --}}
<div class="modal fade" tabindex="-1" role="dialog" id="editCatalog_{{ $catalog->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Catalog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.admin.catalog_update', $catalog->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="catalog"><span class="text-danger">*</span> Nama Catalog</label>
                        <input id="catalog" type="text" class="form-control" name="catalog"
                            value="{{ $catalog->catalog }}" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description"><span class="text-danger">*</span> Deskripsi Catalog</label>
                        <textarea name="description" class="form-control">{{ $catalog->description }}</textarea>
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
