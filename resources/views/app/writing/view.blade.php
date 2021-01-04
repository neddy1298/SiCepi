@extends('layouts.app')

@section('title', 'Template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tulisan Saya</h1>
    </div>

    <div class="section-body">

        <h2 class="section-title">Tulisan Saya
            ( {{ $writings->count() }} / {{ $writings->count() + auth()->user()->writing_limit }} )</h2>
        <div class="row">
            @foreach ($writings as $writing)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{ $writing->catalog }} -> {{ $writing->template_name }}</h4>
                        <div class="card-header-action">
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('dashboard.writing.edit', $writing->id) }}"
                                        class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                    <a href="{{ route('dashboard.writing.rebuild', $writing->id) }}"
                                        class="dropdown-item has-icon"><i class="fas fa-undo-alt"></i> Rebuild
                                        Tulisan</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item has-icon text-danger"
                                        data-confirm="Hapus Tulisan?|Kamu yakin ingin menghapus {{ $writing->name }}"
                                        data-confirm-yes="window.location.href='{{ route('dashboard.writing.delete', $writing->id) }}'">
                                        <i class="far fa-trash-alt"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3><a href="{{ route('dashboard.writing.edit', $writing->id) }}" class="btn-link"
                                underline>{{ $writing->name }}</a></h3>
                        <p class="pt-2">Update Time : {{ $writing->updated_at }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
