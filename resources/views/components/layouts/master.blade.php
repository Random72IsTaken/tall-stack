@props([
    'title' => null,
    'dir' => 'ltr',
    'bodyClasses' => '',
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
    <link rel="preconnect"
          href="https://fonts.googleapis.com">
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>
    @stack('fonts')

    <!-- Styles -->
    @livewireStyles
    @stack('styles')

    <!-- Head Scripts -->
    @stack('headScripts')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="{{ $bodyClasses }} antialiased">
    @goodLoader
    @goodNight

    {{ $slot }}

    <!-- Body Scripts -->
    @stack('bodyScripts')
    @livewireScripts
</body>

</html>
