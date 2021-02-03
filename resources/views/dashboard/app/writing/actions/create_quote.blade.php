@extends('dashboard.layouts.app')

@section('title', 'Kutipan Baru')


@section('content')
<section class="section">
    <div class="section-header">
        <h1>Kutipan Baru</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-8 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Kutipan Baru -> Quote</h4>
                    </div>
                    <form method="post" action="{{ route('dashboard.writing.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Beri nama kutipanmu</label>
                                        <input name="name" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="topics" id="" class="form-control" data-placeholder="Pilih Topik"
                                            data-width="100%" required>
                                            <option value="" hidden>Pilih Topik</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Author</label>
                                        <select name="topics" id="" class="form-control" data-placeholder="Pilih Author"
                                            data-width="100%" required>
                                            <option value="" hidden>Pilih Author</option>
                                            @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quote</label>
                                        <textarea class="form-control" name="quote" id="" cols="30" rows="10"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Topik</label>
                                        {{-- <input name="name" type="text" class="form-control" required> --}}
                                        <select class="form-control selectric" multiple="" tabindex="-1"
                                            aria-hidden="true">
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                            <option>Option 4</option>
                                            <option>Option 5</option>
                                            <option>Option 6</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Berikutnya</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection

@push('javascript')
<script src="{{ asset('js') }}/page/forms-advanced-forms.js"></script>
@endpush
