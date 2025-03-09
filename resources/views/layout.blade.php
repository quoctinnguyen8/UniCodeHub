<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UniCodeHub')</title>
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-icon/font/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    @yield('css')
</head>
<body>
    @include('navmenu')
    <div class="container mt-4">
        @section('content')
        @show
    </div>

    <script src="{{ asset('lib/alpinejs/alpine.min.js') }}" defer></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app-script.js')}}"></script>
    @yield('js')
</body>
</html>