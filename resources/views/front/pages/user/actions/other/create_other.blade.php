@extends('front.layouts.main')
@section('user-content')
<div class="card">
    <div class="card-header d-flex">
        <h5>Tulisan Baru -> Pilih Template ( 1/2 )</h5>
    </div>
    <form method="post" action="{{ route('user.other_store') }}">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label>Beri nama tulisanmu</label>
                        <input name="name" type="text" class="form-control" required>
                        <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">

                    </div>
                    <div class="form-group">
                        <label>Pilih katalog tulisanmu</label>
                        <select class="form-control" name="catalog_id" id="catalog_id" onchange="catalog()" required>
                            <option selected>Pilih katalog tulisanmu</option>
                            @foreach ($catalogs as $catalog)
                            <option value="{{ $catalog->id }}">{{ $catalog->catalog }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pilih tema tulisanmu</label>
                        <select class="form-control" name="template_id" id="template_data" onchange="template()"
                            required>
                            <option disabled selected>Pilih tema tulisanmu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h5>Perkenalan Tema</h5>

                        <label id="template_intro"></label>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Berikutnya</button>
        </div>
    </form>
</div>

<div id="block_data"></div>

<script type="text/javascript">
    function catalog()
    {
    // console.clear();
    document.getElementById("block_data").innerHTML = "";
    document.getElementById("template_data").innerHTML = "";

    var value = document.getElementById("catalog_id").value;

    var sites = {!! json_encode($templates->toArray()) !!};
    const template = sites.filter(sites => sites.catalog_id == value);



    document.getElementById("template_data").innerHTML +=
        "<option hidden selected>Pilih tema tulisanmu</option>";

    for (let index = 0; index < template.length; index++) {

        document.getElementById("template_data").innerHTML +=
        "<option value="+template[index].id +">"+template[index].template_name+"</option>";



    }

}
    function template() {



    document.getElementById("block_data").innerHTML = "";

    var template_id = document.getElementById("template_data").value;
    var sites = {!! json_encode($templates->toArray()) !!};
    const template = sites.filter(sites => sites.id == template_id);

    // console.log(template);
    var intro = document.getElementById("template_intro").innerHTML = template[0].template_intro;


    var blocks = {!! json_encode($blocks->toArray()) !!};
    const block = blocks.filter(blocks => blocks.template_id == template_id);


    for (let index2 = 0; index2 < block.length; index2++) {


        document.getElementById("block_data").innerHTML +=
        "<div class='card mt-3'><div class='card-header d-flex'><h5>"+ block[index2].block_name +"</h5></div><div class='card-body'><div class='row'><div class='form-group p-3'>"+ block[index2].block_body +"</div></div></div></div>";
    }


}

</script>
@endsection
