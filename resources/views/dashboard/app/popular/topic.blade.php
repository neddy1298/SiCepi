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
                        <h4>Popular Topic</h4>
                        <div class="card-header-form">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#createPopularTopic">Buat
                                Baru</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="template-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Popular Topic</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topics as $topic)
                                    <tr>
                                        <td>{{ $topic->id }}</td>
                                        <td>{{ $topic->name }}</td>
                                        <td>{{ $topic->created_at }}</td>
                                        <td width="20%">
                                            <div>
                                                <button class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editPopularTopic_{{ $topic->id }}"><i
                                                        class="fas fa-pencil-alt"></i></button>
                                                <button class="btn btn-danger"
                                                    data-confirm="Hapus Topic Popular?|Kamu yakin ingin menghapus: {{ $topic->name }}"
                                                    data-confirm-yes="window.location.href='{{ route('dashboard.popular.destroy_topic', $topic->id) }}'">
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
<div class="modal fade" tabindex="-1" role="dialog" id="createPopularTopic">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Popular Topic Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.popular.store_topic') }}" method="post">
                @csrf
                <div class="modal-body">


                    <div class="form-group">
                        <label for="catalog"><span class="text-danger">*</span> Name</label>
                        <input id="catalog" type="text" class="form-control" name="name" required>
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

@foreach ($topics as $topic)

{{-- Edit --}}
<div class="modal fade" tabindex="-1" role="dialog" id="editPopularTopic_{{ $topic->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Popular Topic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.popular.update_topic', $topic->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="catalog"><span class="text-danger">*</span> Name</label>
                        <input id="catalog" type="text" class="form-control" name="name" value="{{ $topic->name }}"
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
