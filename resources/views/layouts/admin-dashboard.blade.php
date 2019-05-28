<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">      
        @if( !Request::is('login') && !Request::is('/') ) 
            @include('includes.navbar')
        @endif
        
        <div class="section dashboard__section">
            <div class="container is-clearfix">
                <div class="sidebar__container">
                        @include('includes.admin-sidebar')
                </div> 
                @yield('content')   
            </div>
        </div>
        
    </div>  
    @if( Request::is('routes/*') )
        <?php   
            $form_action = ( isset($route) && $route ? '/routes/update/' . $route[0]->id : '/routes/new/submit');
        ?>

        <form method="POST" action="{{ $form_action }}" id="waypoints-form">
            @if( isset($route) && $route )
                @method('PATCH')
            @endif
            @csrf
        </form>

        <script src="https://api.mapbox.com/mapbox.js/v3.2.0/mapbox.js"></script>
        <script src="https://api.mapbox.com/mapbox.js/plugins/mapbox-directions.js/v0.4.0/mapbox.directions.js"></script>
    @endif
</body>
</html>
