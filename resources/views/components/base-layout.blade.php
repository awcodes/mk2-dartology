@props([
    'title' => null,
    'description' => 'Dartology is a collection of tools to learn more about darts and become more proficient in your game.',
    'robots' => 'index, follow'
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <title>{{ $title ? $title . ' | ' : '' }}{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#111828">
    <meta name="description" content="{{ $description }}">
    <meta name="robots" content="{{ $robots }}">

    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <x-fonts />

    @vite(['resources/css/app.css', 'resources/js/app.js'], 'build/frontend')

    @stack('head')

    @if (app()->environment() === 'production')
    <!-- Fathom - beautiful, simple website analytics -->
    <script src="https://cdn.usefathom.com/script.js" data-site="FAACOLRH" defer></script>
    <!-- / Fathom -->
    @endif
</head>

<body class="flex flex-col h-full font-sans leading-7 text-gray-200 bg-gray-900">
    <x-site-header>
        <x-site-navigation />
    </x-site-header>

    <main class="flex-1">
        @yield('hero')
        <x-container class="py-8 lg:py-12">
            {{ $slot }}
        </x-container>
    </main>

    <x-site-footer />

    @stack('foot')

    {{-- @auth
    <form id="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>
    @endauth --}}
</body>

</html>