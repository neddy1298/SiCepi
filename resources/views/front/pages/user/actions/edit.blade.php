@extends('front.layouts.main')
@section('user-content')
<div class="card" onload="edit()">
    <form action="{{ route('user.writing_update', $writing->id) }}" method="post">
        @csrf
        <div class="card-header d-flex">
            <h5>Ubah Kutipan</h5>
            <div class="ml-auto">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <div class="card-body">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="">Beri Nama Kutipanmu</label>
                <input type="text" name="name" class="form-control" data-width="100%" required
                    value="{{ $writing->name }}">
            </div>
            <div class="form-group">
                <label for="">Pilih Kategori</label>
                <select name="category" id="category" class="form-control" data-width="100%" onchange="change()"
                    disabled>
                    <option value="{{ $writing->category }}">{{ $writing->category }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Author</label>
                <select name="author" id="author" class="form-control" data-width="100%" disabled>
                    <option hidden>{{ $writing->author }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Isi Kutipan</label>
                <textarea name="text" id="" cols="30" rows="10" class="form-control"
                    required>{{ $writing->text }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Pilih Topik</label>
                <select name="topics[]" id="" class="select2" multiple="multiple" data-width="100%">
                    <option selected>{{ $writing->topics }}</option>
                    @foreach ($Topics as $topic)
                    <option value="{{ $topic->name }}">{{ $topic->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
</div>

<script>
    function change() {
        var category = document.getElementById("category").value;

        if (category != "Quote") {
            document.getElementById("author").disabled = true;
        }else{
            document.getElementById("author").disabled = false;
        }
    }
</script>

@endsection
