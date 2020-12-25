@extends('app.table')

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
                                        <th class="text-center">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center" width="10%">1</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td width="20%">
                                            <div>
                                                <a href="{{ route('dashboard.user.edit', $user->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button class="btn btn-danger"
                                                    data-confirm="Hapus User?|Kamu yakin ingin menghapus {{ $user->name }}"
                                                    data-confirm-yes="window.location.href='{{ route('dashboard.user.destroy', $user->id) }}'">
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
    $('#user-table').DataTable();
} );
</script>
@endpush
