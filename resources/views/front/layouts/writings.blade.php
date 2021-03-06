@foreach ($writings as $writing)
<div class="grid-item" onmousedown='return false;' onselectstart='return false;'>
    <div class="card card-quote">
        <div class="card-body">
            <div class="quote-text mb-3">
                @if($writing->category == 'Quote')
                " {{ $writing->text }} "
                @else
                @if(request()->is('user/save'))
                {!! substr($writing->text, 0,50) !!}... <a href="{{ route('writing.detail', $writing->id) }}">read
                    more</a>
                @else
                {!! substr($writing->text, 0,50) !!}... <a href="#" data-toggle="modal"
                    data-target="#modal_writing_{{ $writing->id }}">read
                    more</a>
                @endif
                @endif
            </div>
            <div class="quote-author row mb-4">
                @if($writing->category == 'Quote')
                <div class="col-auto">
                    <label class="d-block mb-0"><small>Author</small></label>
                    <div><a href="{{ route('author.writing', $writing->author) }}"
                            class="text-danger font-weight-bold">{{ $writing->author }}</a></div>
                </div>
                @endif
                <div class="col-auto">
                    <label class="d-block mb-0"><small>Publish by</small></label>
                    <div class="text-dark font-weight-bold">SiCEPI</div>
                </div>
            </div>
            <div class="quote-author row">

                <div class="col-auto align-left ml-2">
                    <label class="d-block mb-0"><small>Tools</small></label>

                    @guest
                    <div class="row">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-info btn-sm btn-rounded" data-toggle="modal"
                                data-target="#modalGuest"><i
                                    class="mdi mdi-content-save-all-outline align-middle"></i></button>
                            <button type="submit" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal"
                                data-target="#modalGuest"><i class="mdi mdi-heart-outline align-middle"></i></button>
                        </div>
                    </div>
                    @endguest

                    @auth
                    <div class="row">
                        <div class="">

                            {{-- Save --}}
                            @if(!request()->is('user/save'))
                            @if ($User_Saves->count() >= 1)
                            @if ($User_Saves->where('writing_id', $writing->id)->count() >= 1)
                            <a href="{{ route('user.save') }}" class="btn btn-info btn-sm btn-rounded mb-1"><i
                                    class="mdi mdi-content-save-all"></i></a>
                            @else
                            <form action="{{ route('user.save_store' , $writing->id) }}" method="post" class="mb-1">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm btn-rounded"><i
                                        class="mdi mdi-content-save-all-outline align-middle"></i></button>
                            </form>
                            @endif
                            @else
                            <form action="{{ route('user.save_store' , $writing->id) }}" method="post" class="mb-1">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm btn-rounded"><i
                                        class="mdi mdi-content-save-all-outline align-middle"></i></button>
                            </form>
                            @endif
                            @endif


                            {{-- Favorite --}}
                            @if(request()->segment(2) != 'favorite')
                            @if ($User_Favorites->count() >= 1)
                            @if ($User_Favorites->where('writing_id', $writing->id)->count() >= 1)
                            <a href="{{ route('user.favorite') }}" class="btn btn-primary btn-sm btn-rounded mb-1"><i
                                    class="mdi mdi-heart"></i></a>
                            @else
                            <form action="{{ route('user.favorite_store' , $writing->id) }}" method="post" class="mb-1">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm btn-rounded"><i
                                        class="mdi mdi-heart-outline align-middle"></i></button>
                            </form>
                            @endif
                            @else
                            <form action="{{ route('user.favorite_store' , $writing->id) }}" method="post" class="mb-1">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm btn-rounded"><i
                                        class="mdi mdi-heart-outline align-middle"></i></button>
                            </form>
                            @endif
                            @endif
                        </div>

                        <div class="ml-1">

                            @if (request()->segment(2) == 'writing')
                            <a href="{{ route('user.writing_edit' , $writing->id) }}"
                                class="btn btn-warning btn-sm btn-rounded mb-1"><i
                                    class="mdi mdi-pencil-outline align-middle"></i></a>

                            <form action="{{ route('user.writing_destroy' , $writing->id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm btn-rounded"><i
                                        class="mdi mdi-delete-forever align-middle"></i></button>
                            </form>
                            @elseif(request()->segment(2) == 'save')

                            <a href="{{ route('user.writing_edit' , $writing->id) }}"
                                class="btn btn-warning btn-sm btn-rounded mb-1"><i
                                    class="mdi mdi-pencil-outline align-middle"></i></a>

                            <form action="{{ route('user.save_destroy' , $writing->save_id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm btn-rounded"><i
                                        class="mdi mdi-delete-forever align-middle"></i></button>
                            </form>

                            @elseif(request()->segment(2) == 'favorite')

                            <form action="{{ route('user.favorite_destroy' , $writing->favorite_id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm btn-rounded"><i
                                        class="mdi mdi-delete-forever align-middle"></i></button>
                            </form>
                            @endif
                        </div>

                    </div>

                    @endauth



                </div>
                <div class="col-auto ml-auto">
                    <label class="d-block mb-0"><small>Kategori</small></label>
                    <a href="{{ route('category.category', $writing->category) }}"
                        class="badge badge-primary badge-pill">{{ $writing->category }}</a>
                </div>
            </div>
        </div>
        <div class="card-footer">
            @foreach (explode(',',$writing->topics) as $item)
            <a href="{{ route('topics.writing', $item) }}" class="badge badge-primary badge-pill">{{ $item }}</a>
            @endforeach
        </div>
    </div>
</div>


<!-- ModalGuest -->
<div class="modal fade" id="modalGuest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title text-primary" id="exampleModalLongTitle">Uppss.. <br> sepertinya kamu belum
                    memiliki akun</h4>
                <div class="mt-5 mb-4">
                    <small class="font-weight-bold text-secondary">Untuk dapat menyimpan dan mengedit Kutipan kamu perlu
                        masuk akun kamu..</small>
                </div>
                <div class="mb-2">
                    <a href="{{ route('login') }}" class="btn btn-primary" style="width:200px">LOGIN</a>
                </div>

                <div class="mt-3 mb-2">
                    <small class="font-weight-bold text-secondary">daftar bila belum memiliki akun</small>
                </div>
                <div class="mt-3 mb-2">
                    <a href="{{ route('register') }}" class="btn btn-primary-outline" style="width:200px">DAFTAR</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_writing_{{ $writing->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="row">
                    <div class="col-auto">

                        {{-- Save / Saved --}}
                        @if ($User_Saves->count() >= 1)
                        @if ($User_Saves->where('writing_id', $writing->id)->count() >= 1)
                        <a href="{{ route('user.save') }}" class="btn btn-info btn-sm btn-rounded mb-1"><i
                                class="mdi mdi-content-save-all"></i>
                            Tersimpan</a>
                        @else
                        <form action="{{ route('user.save_store' , $writing->id) }}" method="post" class="mb-1">
                            @csrf
                            <button type="submit" class="btn btn-info btn-sm btn-rounded"><i
                                    class="mdi mdi-content-save-all-outline align-middle"></i></button>
                        </form>
                        @endif
                        @else
                        <form action="{{ route('user.save_store' , $writing->id) }}" method="post" class="mb-1">
                            @csrf
                            <button type="submit" class="btn btn-info btn-sm btn-rounded"><i
                                    class="mdi mdi-content-save-all-outline align-middle"></i></button>
                        </form>
                        @endif




                        {{-- Favorite / Favorited --}}
                        @if ($User_Favorites->count() >= 1)
                        @if ($User_Favorites->where('writing_id', $writing->id)->count() >= 1)
                        <a href="{{ route('user.favorite') }}" class="btn btn-primary btn-sm btn-rounded mb-1"><i
                                class="mdi mdi-heart"></i></a>
                        @else
                        <form action="{{ route('user.favorite_store' , $writing->id) }}" method="post" class="mb-1">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm btn-rounded"><i
                                    class="mdi mdi-heart-outline align-middle"></i></button>
                        </form>
                        @endif
                        @else
                        <form action="{{ route('user.favorite_store' , $writing->id) }}" method="post" class="mb-1">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm btn-rounded"><i
                                    class="mdi mdi-heart-outline align-middle"></i></button>
                        </form>
                        @endif
                        @if (Auth::user()->id ?? '0' == $writing->user_id)

                        <a href="{{ route('user.writing_edit', $writing->id) }}"
                            class="btn btn-warning btn-sm btn-rounded mb-1"><i class="mdi mdi-pencil-outline"></i></a>
                        @endif

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
            </div>
        </div>
    </div>
</div>

@endforeach
