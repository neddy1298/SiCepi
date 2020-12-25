@extends('app.table')

@section('header', 'Tags')

@section('card-header')
<h4>List Tag</h4>
<div class="card-header-form">
    <a href="{{ route('dashboard.user.create') }}" class="btn btn-primary">Tambah User</a>
</div>
@endsection

@section('table')
<table class="table table-striped" id="user-table">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Tag</th>
            <th>Body</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)
        <tr>
            <td class="text-center" width="10%">1</td>
            <td>{{ $tag->name }}</td>
            <td>{{ $tag->role }}</td>
            <td width="20%">
                <div>
                    <a href="{{ route('dashboard.user.edit', $tag->id) }}" class="btn btn-warning"><i
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
