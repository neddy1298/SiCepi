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
                                    <input name="user_id" type="text" class="form-control" hidden
                                        value="{{ Auth()->user()->id }}">
                                    <div class="form-group">
                                        <label>Beri nama kutipanmu</label>
                                        <input name="name" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="category" id="category" onchange="Category()" class="form-control"
                                            data-placeholder="Pilih Topik" data-width="100%" required>
                                            <option value="" hidden>Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Author</label>
                                        <select name="author" id="author" class="form-control"
                                            data-placeholder="Pilih Author" data-width="100%" required>
                                            <option value="" hidden>Pilih Author</option>
                                            @foreach ($authors as $author)
                                            <option value="{{ $author->name }}">{{ $author->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quote</label>
                                        <textarea class="form-control" name="text" id="" cols="30" rows="10"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Topik</label>
                                        <select class="form-control selectric" multiple="" tabindex="-1"
                                            aria-hidden="true" name="topics[]">
                                            @foreach ($topics as $topic)
                                            <option value="{{ $topic->name }}">{{ $topic->name }}</option>
                                            @endforeach
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

<script>
    function Category() {
        var category = document.getElementById("category").value;
        if(category != 'Quote'){
            document.getElementById("author").disabled = true;
        }else{

            document.getElementById("author").disabled = false;
        }
    }

</script>

@endsection

@push('javascript')
<script src="{{ asset('js') }}/page/forms-advanced-forms.js"></script>
@endpush
