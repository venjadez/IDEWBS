<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <meta name="desciptions" content="@yield('meta_description')">
        <meta name="keywords" content="@yield('meta_keyword')">
        <meta name="author" content="Systematic">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Style -->
        <link href ="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Owl Carousel css-->
        <link href ="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href ="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
        <!-- exzoom css-->
        <link href ="{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel="stylesheet">
        <!-- Custom css -->
        <link href ="{{ asset('assets/css/onstyle.css') }}" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
        @livewireStyles
    </head>

    <body>
        <div id="app">
            @include('layouts.inc.frontend.navbar')
            <main class="py-4">
                @yield('content')
            </main>

            @include('layouts.inc.frontend.footer')
        </div>
        <!-- Scripts -->
        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script>
            window.addEventListener('message', event => {
                alertify.set('notifier', 'position', 'top-center');
                alertify.notify(event.detail.text, event.detail.type);
            });
        </script>

        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

        <script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>
        @yield('script')

        @livewireScripts
        @stack('scripts')
    </body>

</html>
