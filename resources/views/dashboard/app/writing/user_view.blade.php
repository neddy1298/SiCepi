@extends('dashboard.app.table')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User</h1>
        <div class="section-header-breadcrumb">
            {{ request()->path() }}
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List User</h4>
                        <div class="card-header-form">
                            <a href="{{ route('dashboard.user.create') }}" class="btn btn-primary">Tambah
                                User</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="user-table">
                                <thead>
                                    <tr>

                                        <th>Update Time</th>
                                        <th>Category & Template</th>
                                        <th>Writing Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($writings as $writing)
                                    <tr>

                                        <td>{{ $writing->updated_at }}</td>
                                        <td>{{ $writing->catalog }} -> {{ $writing->template_name }}</td>
                                        <td>{{ $writing->name }}</td>
                                        <td>
                                            <div class="dropdown dropright">
                                                <a href="#" data-toggle="dropdown"
                                                    class="btn btn-warning dropdown-toggle">Options</a>
                                                <div class="dropdown-menu">
                                                    <a href="{{ route('dashboard.admin.user_writing_detail', $writing->id) }}"
                                                        class="dropdown-item has-icon"><i
                                                            class="fas fa-eye"></i>View</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item has-icon text-danger"
                                                        data-confirm="Hapus Tulisan?|Kamu yakin ingin menghapus {{ $writing->name }}"
                                                        data-confirm-yes="window.location.href='{{ route('dashboard.writing.delete', $writing->id) }}'">
                                                        <i class="far fa-trash-alt"></i> Delete</a>
                                                </div>
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
    $('#user-table').DataTable();
} );
</script>
@endpush
