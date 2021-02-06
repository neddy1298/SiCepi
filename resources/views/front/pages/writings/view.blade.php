@extends('front.layouts.main')
@section('user-content')

<div class="d-flex align-items-center mb-3">
    <h4 class="my-0"><strong>{{ $writing->name }}</strong> </h4>
    <div class="ml-auto">
        <div class="row">
            @if ($writing->user_id == auth()->user()->id)

            <form action="{{ route('user.save_store' , $writing->id) }}" method="post" class="mr-1">
                @csrf
                <button class="btn btn-warning btn-sm btn-rounded">
                    <i class="mdi mdi-pencil-outline align-middle"></i>
                </button>
            </form>
            @endif
            <form action="{{ route('user.save_store' , $writing->id) }}" method="post" class="mr-1">
                @csrf
                <button type="submit" class="btn btn-info btn-sm btn-rounded"><i
                        class="mdi mdi-content-save-all-outline align-middle"></i></button>
            </form>
            <form action="{{ route('user.favorite_store' , $writing->id) }}" method="post" class="mr-1">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm btn-rounded"><i
                        class="mdi mdi-heart-outline align-middle"></i></button>
            </form>
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
