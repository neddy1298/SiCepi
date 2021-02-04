@extends('front.layouts.main')
@section('user-content')
<div class="d-flex align-items-center mb-3">
    <h4 class="my-0"><strong>Kutipan Tersimpan:</strong> </h4>
    <div class="ml-auto">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kategori
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('user.save') }}">Semua Kategori</a>
                @foreach ($Categories as $category)
                <a class="dropdown-item"
                    href="{{ route('user.save_category', $category->name) }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="masonry-quote mb-3 grid grid-3">

    @include('front.layouts.writings');


</div>
@endsection
