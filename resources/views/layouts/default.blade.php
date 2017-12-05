<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') - {{ config('app.name', 'phpmap.co') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.2.4/dist/instantsearch.min.css">
    @stack('styles')
    <style>
        .navbar {
            margin-bottom: 0px;
        }
        [v-cloak] {
            display: none;
        }
        .ais-highlight > em { background: yellow; font-style: normal; }
    </style>

    <!-- Scripts -->
    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check(),
            'search_id' => env('ALGOLIA_APP_ID'),
            'search_key' => env('ALGOLIA_SECRET')
        ]) !!};
    </script>
    @stack('header_scripts')
</head>

<body>
<div id="app" class="wrapper">
    @include('_includes.navigation')

    @yield('content')

    <flash message="{{ session('flash') }}"></flash>
    <div class="push"></div>
</div>

@include('_includes.footer')

<!-- Scripts -->
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="https://app.codesponsor.io/scripts/XqWHqOU6k8dW1JE5Ax3_1Q?theme=light"></script>
@stack('scripts')
@if(env('APP_ENV') == 'production')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-83274930-1', 'auto');
        ga('send', 'pageview');
    </script>
@endif
</body>
</html>