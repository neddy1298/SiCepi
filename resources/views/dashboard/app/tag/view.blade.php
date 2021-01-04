@extends('dashboard.app.table')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tag</h1>
        <div class="section-header-breadcrumb">
            {{ request()->path() }}
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Tag</h4>
                        <div class="card-header-form">
                            <a href="{{ route('dashboard.admin.tag_create') }}" class="btn btn-primary">Buat Tag
                                Baru</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tag-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Name</th>
                                        <th>Body</th>
                                        <th>Default Replace</th>
                                        <th>Promp Text</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                    <tr>
                                        <td class="text-center" width="10%">1</td>
                                        <td>{{ $tag->tag_name }}</td>
                                        <td>{{ $tag->tag_body }}</td>
                                        <td>{{ $tag->default_replace }}</td>
                                        <td>{{ $tag->promp_text }}</td>
                                        <td width="20%">
                                            <div>
                                                <a href="{{ route('dashboard.admin.tag_edit', $tag->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                <button class="btn btn-danger"
                                                    data-confirm="Hapus User?|Kamu yakin ingin menghapus {{ $tag->name }}"
                                                    data-confirm-yes="window.location.href='{{ route('dashboard.admin.tag_delete', $tag->id) }}'">
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


@endsection

@push('js')
<script>
    $(document).ready( function () {
    $('#tag-table').DataTable();
} );
</script>
@endpush
