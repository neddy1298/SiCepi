<form action="{{ route('writing.search') }}" method="get">
    @csrf
    <div class="input-group ">
        <div class="input-group-prepend">
            <select name="key" id="" class="form-control ">
                <option value="Semua">Semua</option>
                <option value="Topik">Topik</option>
                <option value="Author">Author</option>
                <option value="Category">Kategori</option>
            </select>
        </div>
        <input type="text" class="form-control input-search-quote" placeholder="Cari kutipan atau dengan Hashtag #"
            name="search">
        <!-- <div class="icon-group">
        <div class="icon">
            <a href="#" class="icon-group-link"><i class="eva eva-search-outline align-middle"></i></a>
        </div>
    </div> -->
    </div>
</form>
