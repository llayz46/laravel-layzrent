<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data="{darkMode: false, mobileMenu: false}" :class="{'dark': darkMode === true }" class="antialiased bg-background h-full">
    <x-nav.header />

    @if(session()->has('success'))
        <x-banner precontent="Congratulation !" content="Welcome on LayzRent : {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}"/>
    @endif

    @if(session()->has('successMessage'))
        <x-toast>test</x-toast>
    @endif

    {{ $slot }}
</body>
</html>
