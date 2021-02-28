@extends('front.layouts.main')
@section('user-content')

<div class="d-flex align-items-center mb-3">
    <a href="{{ url()->previous() }}"><strong>
            <i class="mdi mdi-arrow-left"></i> Kembali</strong> </a>
    <div class="ml-auto">
        <div class="row">
            @if ($writing->user_id == auth()->user()->id)

            <a href="{{ route('user.writing_edit' , $writing->id) }}" class="mr-1">
                @csrf
                <button class="btn btn-warning btn-sm btn-rounded">edit
                    <i class="mdi mdi-pencil-outline align-middle"></i>
                </button>
            </a>
            @endif
        </div>
    </div>
</div>

<div class='card mt-3'>
    <div class='card-header d-flex'>
        <h5>{{ $writing->name }}</h5>
    </div>

    <div class='p-3'>
        <div class='form-group'>{!! $writing->text !!}</div>
    </div>
</div>


@endsection
