<!DOCTYPE html>
<html lang="uk">
    <head>
        {{-- str_replace('_', '-', app()->getLocale()) --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ __("essential.meta_desc") }}">
        <meta name="theme-color" content="#4CB9C1">

        <title>@yield('title')</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            
            @yield('above-fold')

            <div id="top-nav">
                <nav>
                    <a href="/">
                        <img src="{{ asset("storage/icons/pomegranate.png")}}" alt="{{ __('essential.favicon_alt') }}">
                        <h1>{{ __("essential.main_header") }}</h1>
                    </a>
                </nav>
            </div>

            @yield('content')
            @yield('contact')
            
            <footer>
                <img src="{{ asset('storage/icons/pomegranate.png') }}" alt="{{ __('essential.favicon_alt') }}">
                <span>&copy; {{ __("essential.footer.copyright") }}</span>
            </footer>
            
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
