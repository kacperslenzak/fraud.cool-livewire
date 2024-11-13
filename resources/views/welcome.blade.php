<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>fraud.cool</title>

        <!-- Styles -->
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans bg-black">

        <div class="h-screen flex items-center justify-center z-20 relative">
            <div class="content text-center max-w-screen-sm space-y-8">
                <h1 class="text-6xl font-bold text-white">fraud.cool</h1>
                <h2 class="text-4xl text-white">Your one stop shop for biolink sites!</h2>
                <p class="text-white text-xl">Lets get started!</p>
                <div class="button-row space-x-2">
                    @if(Auth::check())
                        <a href="/dashboard" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Dashboard</a>
                    @else
                        <a href="/register" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</a>
                        <a href="/login" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Log in</a>
                    @endif
                    <a href="{{ config('services.discord.invite') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Discord</a>
                </div>
            </div>
        </div>

        <div class="background-wrapper z-10">
            <div class="background-blur-filter"></div>
            <div class="background-gradient"></div>
        </div>

    </body>
</html>
