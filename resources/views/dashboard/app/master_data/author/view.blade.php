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
                        <h4>Author</h4>
                        <div class="card-header-form">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#createAuthor">Buat
                                Baru</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="template-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Author</th>
                                        <th>Popular</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $author->id }}</td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ ($author->popular == 1)? 'Popular' : '-' }}</td>
                                        <td>{{ $author->created_at }}</td>
                                        <td width="20%">
                                            <div>
                                                <button class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editAuthor_{{ $author->id }}"><i
                                                        class="fas fa-pencil-alt"></i></button>
                                                <button class="btn btn-danger"
                                                    data-confirm="Hapus Author?|Kamu yakin ingin menghapus: {{ $author->name }}"
                                                    data-confirm-yes="window.location.href='{{ route('dashboard.admin.destroy_author', $author->id) }}'">
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
<div class="modal fade" tabindex="-1" role="dialog" id="createAuthor">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Author Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.admin.store_author') }}" method="post">
                @csrf
                <div class="modal-body">


                    <div class="form-group">
                        <label for="catalog"><span class="text-danger">*</span> Name</label>
                        <input id="catalog" type="text" class="form-control" name="name" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catalog"><span class="text-danger">*</span> Popular</label>
                        <select name="popular" id="author" class="form-control" data-placeholder="Pilih Author"
                            data-width="100%">
                            <option value="0">-</option>
                            <option value="1">Popular</option>
                        </select>
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

@foreach ($authors as $author)

{{-- Edit --}}
<div class="modal fade" tabindex="-1" role="dialog" id="editAuthor_{{ $author->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Author</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.admin.update_author', $author->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="catalog"><span class="text-danger">*</span> Name</label>
                        <input id="catalog" type="text" class="form-control" name="name" value="{{ $author->name }}"
                            required>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catalog"><span class="text-danger">*</span> Popular</label>
                        <select name="popular" id="author" class="form-control" data-placeholder="Pilih Author"
                            data-width="100%">
                            <option hidden>{{ ($author->popular == 1)? 'Popular' : '-' }}</option>
                            <option value="0">-</option>
                            <option value="1">Popular</option>
                        </select>
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
