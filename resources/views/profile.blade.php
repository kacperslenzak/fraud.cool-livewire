<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $user->name }} | {{ config('app.name', 'fraud.cool') }}</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&display=swap" rel="stylesheet">

        <meta name="description" content="fraud.cool #1 bio link">
        <meta content="website" property="og:type">
        <meta content="{{'@'}}{{ $user->name }} | fraud.cool" property="og:title">
        <meta content="" property="og:description">
        <meta content="{{'@'}}{{ $user->name }} | fraud.cool" name="author">
        <meta content="#FFFFFF" name="theme-color">
        <meta name="twitter:card" content="summary_large_image">
        <meta property="og:image" content="{{ url('image/'.$user->name) }}">

        <!-- Scripts -->
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased profile overflow-hidden">
        <div class="min-h-screen flex justify-center items-center bg-black/[.975] wrapper">

            @include('profile.content', ['user' => $user])

        </div>

        @include('profile.particles', ['user' => $user])

        @include('profile.styles', ['user' => $user])

        @include('profile.admin', ['user' => $user])

    </body>
</html>
