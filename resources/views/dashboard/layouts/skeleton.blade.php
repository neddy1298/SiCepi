<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title', 'Home') &mdash; {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('plugin') }}/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="{{ asset('plugin') }}/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('plugin') }}/selectric/public/selectric.css">


    @stack('stylesheet')
    @yield('css')
</head>

<body>
    @include('sweetalert::alert')
    <div id="app">

        @yield('app')
    </div>
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('javascript')
    @yield('js')

    <script src="{{ asset('plugin') }}/summernote/dist/summernote-bs4.js"></script>
    <script src="{{ asset('plugin') }}/jquery_upload_preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="{{ asset('plugin') }}/select2/dist/js/select2.full.min.js"></script>
    <script src="{{ asset('plugin') }}/selectric/public/jquery.selectric.min.js"></script>
    <script src="{{ asset('js') }}/page/features-post-create.js"></script>
</body>

</html>
