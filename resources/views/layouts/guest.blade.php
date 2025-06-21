<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        @if (!request()->routeIs('password.request'))
            @include('components.navbar')
        @endif
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">
            <div class="mb-6">
                <a href="/">
                    <img class="h-12 w-auto transition-transform duration-300 hover:scale-110" src="{{ asset('images/Frame.png') }}" alt="Logo">
                </a>
            </div>
            <div class="w-full sm:max-w-md mt-0 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-xl">
                <div class="mb-6">
                    <a href="/" class="inline-flex items-center text-gray-600 hover:text-green-600 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
                @yield('content')
            </div>
        </div>
    </body>
</html>
