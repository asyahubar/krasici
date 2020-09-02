<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ __("essential.meta_desc") }}">
        <meta name="theme-color" content="#4CB9C1">

        <title>{{__('essential.title')}}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            
            @yield('above-fold')

            <div id="top-nav">
                <nav>
                    <a class="homepage-link" href="/">
                        <img class="favicon" src="{{ asset("storage/icons/pomegranate.png")}}" alt="{{ __('essential.alt.favicon') }}">
                        <h1>{{ __("essential.title") }}</h1>
                    </a>

                    {{-- TODO: lang switch --}}
                    <div class="lang-switch">
                        <div class="lang-current">
                            <a>
                                <img title="{{LaravelLocalization::getCurrentLocaleName()}}" src="{{ asset('storage/icons/' . App::getLocale() . '.png') }}">
                            </a>
                        </div>
                        <div class="lang-options">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if($localeCode !== App::getLocale())
                                    <div class="lang-option">
                                        <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true)}}" rel="alternate" >
                                            <img src="{{ asset('storage/icons/' . $localeCode . '.png') }}" title="{{ $properties['name'] }}" alt="{{ __('essential.alt.lang_switch', [ 'lang' => __('essential.langs.' . $localeCode)])}}">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </nav>
            </div>

            @yield('content')
            @yield('contact')
            
            <footer>
                <img src="{{ asset('storage/icons/pomegranate.png') }}" alt="{{ __('essential.favicon_alt') }}">
                <span>
                    <?php echo date('Y'); ?> 
                    &copy; 
                    {{ __("essential.footer.dev_by") }} 
                    <a href="http://silvercinnamon.me">Silver Cinnamon</a>
                </span>
            </footer>
            
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
