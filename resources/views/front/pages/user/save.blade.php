@extends('front.pages.user.main')
@section('user-content')
<div class="d-flex align-items-center mb-3">
    <h4 class="my-0"><strong>Kutipan Tersimpan:</strong> </h4>
    <div class="ml-auto">
        <select name="" id="" class="form-control border-0" style="box-shadow: none">
            <option value="">Terbaru</option>
            <option value="">Terlama</option>
        </select>
    </div>
</div>

<div class="masonry-quote mb-3 grid grid-3">

    @include('front.layouts.quotes');

</div>
@endsection
