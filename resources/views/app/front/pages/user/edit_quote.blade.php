@extends('app.front.pages.user.main')
@section('user-content')
<div class="card">
    <form action="{{ route('user.quote_update', $quote->id) }}" method="post">
        @csrf
        <div class="card-header d-flex">
            <h5>Buat Kutipan</h5>
            <div class="ml-auto">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <div class="card-body">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="">Pilih Topik</label>
                <select name="topics[]" id="topics" class="select2" multiple="multiple" data-width="100%">
                    {{-- @foreach (explode(',',$quote->topics) as $item)
                    <option value="{{ $item }}" selected>{{ $item }}</option>
                    @endforeach --}}
                    <option value="Age">Age</option>
                    <option value="Alone">Alone</option>
                    <option value="Amazing">Amazing</option>
                    <option value="Anger">Anger</option>
                    <option value="Anniversary">Anniversary</option>
                    <option value="Architecture">Architecture</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Author</label>
                <input type="text" class="form-control" name="author" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <label for="">Isi Kutipan / Quote</label>
                <textarea name="quote" id="" cols="30" rows="10" class="form-control"
                    required>{{ $quote->quote }}</textarea>
            </div>
        </div>
    </form>
</div>
<script>
    $( document ).ready(function() {
        var topics = {!! json_encode($quote->toArray()) !!}
        // console.log(topics);
        $('#topics').val().trigger('change');

    });
</script>
@endsection
