@extends('dashboard.layouts.app')

@section('title', 'Edit Kutipan')


@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Kutipan</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-8 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Kutipan -> {{ $writing->category }}</h4>
                    </div>
                    <form method="post" action="{{ route('dashboard.writing.update', $writing->id ) }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <input name="user_id" type="text" class="form-control" hidden
                                        value="{{ Auth()->user()->id }}">
                                    <div class="form-group">
                                        <label>Beri nama kutipanmu</label>
                                        <input name="name" type="text" class="form-control" required
                                            value="{{ $writing->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="category" id="category" onchange="Category()" class="form-control"
                                            data-placeholder="Pilih Topik" data-width="100%" disabled>
                                            <option>{{ $writing->category }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Author</label>
                                        <select name="author" id="author" class="form-control"
                                            data-placeholder="Pilih Author" data-width="100%"
                                            {{ ($writing->category == 'quote')? 'required' : 'disabled' }}>
                                            <option value="" hidden>Pilih Author</option>
                                            @foreach ($authors as $author)
                                            <option value="{{ $author->name }}"
                                                {{ ($author->name == $writing->author)? 'selected' : '' }}>
                                                {{ $author->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Text</label>
                                        <textarea class="form-control" name="text" id="" cols="30" rows="10"
                                            required>{{ $writing->text }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Topik</label>
                                        <select class="form-control selectric" multiple="" tabindex="-1"
                                            aria-hidden="true" name="topics[]">
                                            <option>{{ $writing->topics }}</option>
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
