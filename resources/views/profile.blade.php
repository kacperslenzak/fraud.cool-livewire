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

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
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

            <div class="py-[60px] min-w-[600px] rounded-2xl flex flex-col items-center relative z-10 profile-card">
                @if ($user->profile_settings?->avatar)
                    <img src="{{ asset('storage/' . $user->profile_settings->avatar) }}" alt="Avatar" class="w-[120px] h-[120px] rounded-full mb-4 object-cover">
                @endif
                <h1 class="text-white text-3xl font-bold {{ $user->profile_settings?->username_effect }}">{{ $user->name }}</h1>
                @if ($user->profile_settings?->description)
                    <p class="text-white/50 ">{{ $user->profile_settings->description }}</p>
                @endif
                @if ($user->profile_settings?->show_uid)
                    <p class="text-white/50 my-4">UID: {{ $user->id }}</p>
                @endif

                @if ($user->links->count() > 0)
                    <div class="flex justify-center flex-wrap gap-2 mt-6 links">
                        @foreach ($user->links as $link)
                            <a href="/redirect/{{ $user->name }}/{{ $link->id }}" class="text-white hover:scale-110 transition duration-200" target="_blank">
                                <i class="fa-brands fa-{{ $link->linkType->icon }} text-4xl"></i>
                            </a>
                        @endforeach
                    </div>
                @endif

                @if ($user->profile_settings?->show_views)
                    <div class="absolute bottom-4 left-4 flex items-center gap-2">
                        <i class="fa-solid fa-eye text-white"></i>
                        <p class="text-white">{{ $user->profileViews->count() }}</p>
                    </div>
                @endif
            </div>

        </div>

        @if(@isset($user->profile_settings->background_effect))
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

        <div id="particles" class="absolute top-0 left-0 w-full"></div>

        <script>
            (function() {
                particlesJS.load('particles', 'particles/{{$user->profile_settings->background_effect}}.json', function() {
                });
            })();
        </script>
        @endif

        <style>
            .wrapper {
                @if($user->profile_settings?->background_image)
                    background-image: url('{{ asset('storage/' . $user->profile_settings->background_image) }}');
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                @endif

                @if($user->profile_settings?->background_color)
                    background-color: rgb({{ $user->profile_settings->backgroundColorToRGB() }});
                @endif
            }

            .profile-card {
                background-color: rgba(39, 39, 42, {{ ($user->profile_settings?->card_opacity) ?? 100 }}%);
            }
        </style>

        @if(auth()?->user()?->is_admin)
            <div class="absolute left-4 right-4 bottom-4 bg-white rounded-full w-10 h-10 flex items-center justify-center text-center">
                <form action="{{ route('users.toggle-banned', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="text-zinc-800 text-xl mx-auto block">
                        <i class="fa-solid fa-gavel"></i>
                    </button>
                </form>
            </div>
        @endif

    </body>
</html>
