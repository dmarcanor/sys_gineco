<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
{{--        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

        <!-- Styles -->
        <link rel="stylesheet" href="{!! asset('assert/css/style.css') !!}" />
        <link rel="shortcut icon" href="{!! asset('assert/img/favicon.png') !!}">

        <!-- Scripts -->
        @routes
{{--        <script src="{!! asset('script/jquery/jquery-3.1.1.min.js') !!}" type="text/javascript"></script>--}}
        <script src="{!! asset('assert/js/scripts.js') !!}" type="text/javascript"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden" >
        @inertia

        @env ('local')
{{--            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>--}}
        @endenv
    </body>
</html>
