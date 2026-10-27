@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#123C52">
        <title>{{ $title ? $title.' · ' : '' }}{{ config('app.name', 'TALIMA') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-ivory font-sans text-teal-deep antialiased">
        {{ $slot }}
    </body>
</html>
