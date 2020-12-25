@extends('app.table')

@section('header', 'User')

@section('card-header')
<h4>List User</h4>
<div class="card-header-form">
    <a href="{{ route('dashboard.user.create') }}" class="btn btn-primary">Tambah User</a>
</div>
@endsection

@section('table')
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
                    <a href="{{ route('dashboard.user.edit', $user->id) }}" class="btn btn-warning"><i
                            class="fas fa-pencil-alt"></i>
                        Edit</a>
                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i>
                        Hapus</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@push('js')
<script>
    $(document).ready( function () {
    $('#user-table').DataTable();
} );
</script>
@endpush
