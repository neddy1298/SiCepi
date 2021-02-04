<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiCEPI</title>
    <link rel="stylesheet" href="{{ asset('front/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin') }}/summernote/dist/summernote-bs4.css">

    @stack('css')


</head>

<body>
    @include('sweetalert::alert')

    <div id="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="menunav">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('front/images/logo.svg') }}" alt="" width="100">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ request()->segment(1) == "" ? "active" : "" }}">
                            <a class="nav-link" href="{{ route('index') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ request()->segment(1) == "topics" ? "active" : "" }}">
                            <a class="nav-link" href="{{ route('topics.view') }}">Topik</a>
                        </li>
                        <li class="nav-item {{ request()->segment(1) == "author" ? "active" : "" }}">
                            <a class="nav-link" href="{{ route('author.view') }}">Author</a>
                        </li>
                        <li class="nav-item dropdown {{ request()->segment(1) == "category" ? "active" : "" }}">

                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Kategori
                            </a>
                            <div class="dropdown-menu" x-placement="bottom-start">
                                @foreach ($Categories as $category)
                                <a class="dropdown-item has-icon"
                                    href="{{ route('category.category', $category->name) }}">{{$category->name}}</a>
                                @endforeach
                            </div>

                        </li>
                    </ul>
                    <ul class="ml-md-auto navbar-nav navbar-right align-items-center">

                        @auth
                        <div class="dropdown d-inline">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" x-placement="bottom-start">
                                @if (Auth::user()->is_admin)

                                <a class="dropdown-item has-icon text-primary" href="{{ route('dashboard.index') }}"><i
                                        class="mdi mdi-home"></i> Dashboard</a>
                                @endif
                                <a class="dropdown-item has-icon text-info" href="{{ route('user.create') }}"><i
                                        class="mdi mdi-pencil"></i> Buat
                                    Kutipan</a>
                                <hr>
                                <a class="dropdown-item has-icon text-danger" href=" {{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i
                                        class="mdi mdi-logout"></i>
                                    Logout</a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        @endauth

                        @guest
                        <li class="nav-item">
                            <a href="{{ route('user.login') }}" class="nav-link btn btn-primary text-white">Login</a>
                        </li>
                        @endguest


                    </ul>
                </div>
            </div>
        </nav>
        <div id="wrapper-content">
            @yield('content')
            <footer class="bg-primary py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-6 text-white">
                            © Copyright 2020 SiCepi, Inc. All Rights Reserved <br>
                            <strong>Bagian dari Sininis</strong>
                        </div>
                        <div class="col-sm-6 text-right text-white font-weight-bold">
                            <a href="#" class="text-white">Privacy</a> | <a href="#" class="text-white">Terms</a> | <a
                                href="#" class="text-white">Disclosure Policy</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>




    </div>
    <script src="{{ asset('front/js/app.js') }}"></script>
    <script src="{{ asset('plugin') }}/summernote/dist/summernote-bs4.js"></script>

    @stack('js')
    @yield('script')
</body>

</html>
