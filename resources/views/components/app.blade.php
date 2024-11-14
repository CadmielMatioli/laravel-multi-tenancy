<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.bunny.net">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{asset('assets/fontAwesome/all.min.css')}}"/>
        <script src="{{asset('assets/fontAwesome/all.min.js')}}"></script>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        @include('partials.sweet-alerts')
        <x-nav-bar></x-nav-bar>
        <x-side-bar></x-side-bar>
        <x-content>{{$slot}}</x-content>
        <script src="{{ asset('/assets/js/utils.js') }}"></script>
    </body>
</html>
