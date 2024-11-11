<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'fraud.cool') }}</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-black/[.975]">

            <!-- Page Content -->
            <main class="px-36 py-12">
                <div class="flex">
                    <!-- Sidebar -->
                    <div class="w-64 min-h-[600px] bg-transparent text-white flex flex-col">
                        <nav class="mt-10 px-6">
                            <div class="space-y-4">
                                <!-- Dashboard Link -->
                                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('dashboard') ? 'bg-white/10' : 'hover:bg-white/10' }} rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    <span>Dashboard</span>
                                </a>

                                <!-- Dashboard Link -->
                                <a href="{{ route('links') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('links') ? 'bg-white/10' : 'hover:bg-white/10' }} rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                    </svg>
                                    <span>Links</span>
                                </a>

                                <!-- Dashboard Link -->
                                <a href="{{ route('analytics') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('analytics') ? 'bg-white/10' : 'hover:bg-white/10' }} rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                    <span>Analytics</span>
                                </a>
                                
                                @if (auth()->user()->is_admin)
                                <!-- Dashboard Link -->
                                <a href="{{ route('link-types') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('link-types') ? 'bg-white/10' : 'hover:bg-white/10' }} rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                    </svg>
                                    <span>Link Types</span>
                                </a>
                                @endif

                                @if (auth()->user()->is_admin)
                                <!-- Dashboard Link -->
                                <a href="{{ route('users') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('users') ? 'bg-white/10' : 'hover:bg-white/10' }} rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                    </svg>
                                    <span>Users</span>
                                </a>
                                @endif
                                                                
                                

                            </div>

                        </nav>

                        <div class="mt-auto">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center px-4 py-2 {{ request()->routeIs('logout') ? 'bg-white/10' : 'hover:bg-white/10' }} rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    {{ $slot }}
                </div>
            </main>

        </div>
    </body>
</html>
