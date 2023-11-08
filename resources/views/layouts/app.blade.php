<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>

    <!-- Styles -->
    <link  rel="stylesheet" href="{{ asset('css/count.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
    <script src="https://kit.fontawesome.com/0ae735fbca.js" crossorigin="anonymous"></script>

</head>
<body style="padding: 60px 0">
    <div id="app">
        <div>
            @yield('header')
        </div>
        <div class="d-flex">
            <div>
                @yield('sidebar')
            </div>
            <main class="w-full">
                @yield('content')
            </main>
        </div>
        <div>
            @yield('footer')
        </div>
    </div>
</body>
</html>
