<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title'){{ config('app.name', 'fraud.cool') }}</title>

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
            <main class="px-4 xl:px-36 py-12">
                <div class="flex flex-col xl:flex-row">
                    <!-- Sidebar -->
                    <div class="w-full xl:w-64 min-h-[auto] xl:min-h-[600px] bg-transparent text-white flex flex-col mb-8 xl:mb-0">
                        <nav class="mt-4 xl:mt-10 px-2 xl:px-6">
                            <div class="flex xl:block overflow-x-auto xl:space-y-4 pb-4 xl:pb-0">
                                <!-- Dashboard Link -->
                                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 whitespace-nowrap xl:whitespace-normal {{ request()->routeIs('dashboard') ? 'bg-white/10' : 'hover:bg-white/10' }} rounded-lg transition-colors duration-200 mr-2 xl:mr-0">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    <span>Dashboard</span>
                                </a>

                                <!-- Dashboard Link -->
                                <a href="{{ route('links') }}" class="flex items-center px-4 py-2 whitespace-nowrap xl:whitespace-normal {{ request()->routeIs('links') ? 'bg-white/10' : 'hover:bg-white/10' }} rounded-lg transition-colors duration-200 mr-2 xl:mr-0">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                    </svg>
                                    <span>Links</span>
                                </a>

                                <!-- Dashboard Link -->
                                <a href="{{ route('analytics') }}" class="flex items-center px-4 py-2 whitespace-nowrap xl:whitespace-normal {{ request()->routeIs('analytics') ? 'bg-white/10' : 'hover:bg-white/10' }} rounded-lg transition-colors duration-200 mr-2 xl:mr-0">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                    <span>Analytics</span>
                                </a>
                                
                                @if (auth()->user()->is_admin)
                                <!-- Dashboard Link -->
                                <a href="{{ route('link-types') }}" class="flex items-center px-4 py-2 whitespace-nowrap xl:whitespace-normal {{ request()->routeIs('link-types') ? 'bg-white/10' : 'hover:bg-white/10' }} rounded-lg transition-colors duration-200 mr-2 xl:mr-0">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                    </svg>
                                    <span>Link Types</span>
                                </a>
                                @endif

                                @if (auth()->user()->is_admin)
                                <!-- Dashboard Link -->
                                <a href="{{ route('users') }}" class="flex items-center px-4 py-2 whitespace-nowrap xl:whitespace-normal {{ request()->routeIs('users') ? 'bg-white/10' : 'hover:bg-white/10' }} rounded-lg transition-colors duration-200 mr-2 xl:mr-0">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                    </svg>
                                    <span>Users</span>
                                </a>
                                @endif
                                                                
                                

                            </div>

                        </nav>

                        <div class="mt-4 xl:mt-auto">
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open" class="flex items-center px-4 py-2 hover:bg-white/10 rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                    <span>Account</span>
                                </button>

                                <div x-show="open" @click.away="open = false" class="absolute bottom-full left-0 mb-2 w-48 rounded-lg bg-zinc-900 shadow-lg">
                                    <a href="{{ route('index') . '/' . auth()->user()->name }}" class="flex items-center px-4 py-2 hover:bg-white/10 transition-colors duration-200" target="_blank">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span>Profile</span>
                                    </a>

                                    <a href="{{ config('services.discord.invite') }}" class="flex items-center px-4 py-2 hover:bg-white/10 transition-colors duration-200" target="_blank">
                                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z"/>
                                        </svg>
                                        <span>Discord</span>
                                    </a>

                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center px-4 py-2 hover:bg-white/10 transition-colors duration-200">
                                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>

                    {{ $slot }}
                </div>
            </main>

        </div>
    </body>
</html>
