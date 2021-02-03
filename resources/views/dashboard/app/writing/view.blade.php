@extends('dashboard.layouts.app')

@section('title', 'Template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Kutipan Saya</h1>
    </div>

    <div class="section-body">

        <h2 class="section-title">Kutipan Saya
            ( {{ $writings->count() }} / {{ auth()->user()->limit }} )</h2>
        <div class="row">
            @foreach ($writings as $writing)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Category -> {{ $writing->category }}</h4>
                        <div class="card-header-action">
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('dashboard.writing.edit', $writing->id) }}"
                                        class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item has-icon text-danger"
                                        data-confirm="Hapus Kutipan?|Kamu yakin ingin menghapus {{ $writing->name }}"
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
