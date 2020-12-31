<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiCEPI</title>
    <link rel="stylesheet" href="{{ asset('front/css/app.css') }}">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="menunav">
            <div class="container">
                <a class="navbar-brand" href="#">
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

                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-white" href="{{ route('user.create_quote') }}">Buat
                                Kutipan</a>
                        </li>


                    </ul>
                    <ul class="ml-md-auto navbar-nav navbar-right align-items-center">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="eva eva-search-outline align-center"></i>
                            </a>
                        </li>

                    </ul>
                    <div class="form-inline">
                        @auth
                        <a href="#" class="btn btn-light btn-sm">{{ Auth::user()->name }}</a>
                        @endauth
                        @guest
                        <a href="{{ route('user.login') }}" class="btn btn-light btn-sm">Login</a>
                        @endguest
                    </div>
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
    @yield('script')
</body>

</html>
