@props([
    'title' => null,
    'dir' => 'ltr',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ $dir }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token"
          content="{{ csrf_token() }}">
    @stack('meta')

    <!-- Favicon -->
    <link rel="shortcut icon"
          href="{{ asset('favicon.ico') }}">

    <!-- Title -->
    @if ($title)
        <title>{{ $title . ' - ' . config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Fonts -->
    @googlefonts
    @stack('fonts')

    <!-- Styles -->
    @livewireStyles
    @stack('styles')

    <!-- Head Scripts -->
    @stack('headScripts')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    {{ $slot }}

    <!-- Body Scripts -->
    @livewireScripts
    @stack('bodyScripts')
</body>

</html>
