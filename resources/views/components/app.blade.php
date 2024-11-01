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
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            @include('layout.sidebar')
            <main class="home-section">
                <div class="home-content">
                    <i class='bx bx-menu'></i>
                    @include('layout.navigation')
                </div>
                <div class="mt-8 px-4 sm:rounded-lg container mx-auto" id="app">
                    <section>
                        {{ $slot }}
                    </section>
                </div>
            </main>
        </div>
        <script src="{{ asset('/assets/js/utils.js') }}"></script>
    </body>
</html>
