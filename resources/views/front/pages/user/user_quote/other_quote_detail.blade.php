@extends('front.layouts.main')
@section('user-content')

<div class="d-flex align-items-center mb-3">
    <h4 class="my-0"><strong>{{ $writing->name }}</strong> </h4>
    <div class="ml-auto">
        <a href="{{ route('user.edit_other' , $writing->id) }}" class="btn btn-light btn-sm btn-rounded">
            <button class="btn btn-warning">
                <i class="mdi mdi-pencil-outline align-middle"></i>
                Edit
            </button>
        </a>
    </div>
</div>

@foreach ($blocks as $block)
<div class='card mt-3'>
    <div class='card-header d-flex'>
        <h5>{{ $block->writing_name }}</h5>
    </div>

    <div class='p-3'>
        <div class='form-group'>{!! $block->writing_text !!}</div>
    </div>
</div>
@endforeach

@endsection
