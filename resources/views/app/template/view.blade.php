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
                        <h4>List Template</h4>
                        <div class="card-header-form">
                            <a href="{{ route('dashboard.admin.template_create') }}" class="btn btn-primary">Buat
                                Template
                                Baru</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="template-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Template Catalog</th>
                                        <th>Template Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($templates as $template)
                                    <tr>
                                        <td class="text-center" width="5%">1</td>
                                        <td>{{ $template->catalog }}</td>
                                        <td>{{ $template->template_name }}</td>
                                        <td width="20%">
                                            <div>
                                                <a href="{{ route('dashboard.admin.template_edit', $template->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                <button class="btn btn-danger"
                                                    data-confirm="Hapus User?|Kamu yakin ingin menghapus {{ $template->template_name }}"
                                                    data-confirm-yes="window.location.href='{{ route('dashboard.admin.template_destroy', $template->id) }}'">
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
    $('#template-table').DataTable();
} );
</script>
@endpush
