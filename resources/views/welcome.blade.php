<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>fraud.cool | Home</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-black/[.98]">

        <div class="pointer-events-none absolute h-[500px] w-full bg-cover bg-center bg-no-repeat opacity-25 sm:h-[750px]" style="background-image:linear-gradient(rgb(255 255 255 / 0%), #090909) , url(https://r2.fakecrime.bio/assets/images/background.webp)"></div>

        <header class="mx-auto flex max-w-7xl items-center flex-col  space-y-2 sm:space-y-0 sm:flex-row justify-between px-8 py-[19px]">
            <a class="text-2xl text-white font-bold" href="/">fraud.cool</a>
            <a class="rounded-xl border-2 border-white bg-white px-6 py-1.5 text-md text-black duration-300 hover:bg-black hover:text-white" href="{{ auth()->check() ? route('dashboard') : route('register') }}">{{ auth()->check() ? 'Dashboard' : 'Get Started' }}</a>
        </header>

        <main class="mx-auto h-auto w-full">
            <section class="relative my-36 animate-slide-up px-8 sm:mb-52 sm:mt-64">
                <h1 class="mx-auto mb-8 max-w-4xl text-center text-3xl font-extrabold text-white sm:text-5xl">Empower Your Digital Presence Easy &amp; Fast</h1>
                <p class="mx-auto mb-10 max-w-3xl text-center font-light text-stone-500 text-lg">Transform your story into an online masterpiece. Fakecrime makes it easy to create personal, stunning bio-pages, that reflect your unique personality &amp; creativity.</p>
                <div class="flex justify-center gap-4">
                    <a class="rounded-xl border border-white/25 px-6 py-3 text-center text-lg text-white duration-300 hover:border-transparent hover:bg-white hover:text-black sm:w-52" href="{{ route('login') }}">Login</a>
                    <a class="rounded-xl border-[1px] border-white-400 px-6 py-3 text-center text-lg text-white duration-300 hover:border-transparent hover:bg-white hover:text-black sm:w-52" href="{{ route('register') }}">Get Started</a>
                </div>
            </section>

            <section class="relative px-8 sm:px-0 py-8">
                <h1 class="text-white text-3xl font-bold mx-auto max-w-4xl">👋 Simple & Intuitive</h1>
                <p class="mx-auto max-w-4xl my-8 font-light text-stone-500 text-lg">Our user-friendly interface ensures that anyone, regardless of technical expertise, can effortlessly build & customize their bio-pages easily. Showcase your creativity, experiences & interests in minutes.</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 max-w-4xl mx-auto gap-6">
                    <x-card>
                        <div class="flex size-[75px] items-center justify-center rounded-xl bg-white text-4xl">🖼️</div>
                        <p class="max-w-sm text-2xl font-bold text-white">— <!-- -->Avatars &amp; Backgrounds</p>
                        <p class="text-md font-light text-white/50">Share your favorite tunes or original compositions effortlessly. Bring your page to life with the magic of music!</p>
                    </x-card>
                
                    <x-card>
                        <div class="flex size-[75px] items-center justify-center rounded-xl bg-white text-4xl">🎨</div>
                        <p class="max-w-sm text-2xl font-bold text-white">— <!-- -->Colors, Fonts &amp; Cursors</p>
                        <p class="text-md font-light text-white/50">Customize your page with a wide range of colors, fonts, and cursors to make it truly unique.</p>
                    </x-card>

                    <x-card>
                        <div class="flex size-[75px] items-center justify-center rounded-xl bg-white text-4xl">🔗</div>
                        <p class="max-w-sm text-2xl font-bold text-white">— <!-- -->Many Social Platforms</p>
                        <p class="text-md font-light text-white/50">Connect your bio-page to your favorite social platforms for seamless sharing.</p>
                    </x-card>

                    <x-card>
                        <div class="flex size-[75px] items-center justify-center rounded-xl bg-white text-4xl">🎮</div>
                        <p class="max-w-sm text-2xl font-bold text-white">— <!-- -->Discord Presence</p>
                        <p class="text-md font-light text-white/50">Show your Discord status on your bio-page for easy access to your friends.</p>
                    </x-card>
                </div>

            </section>

            <section class="px-8 py-36 sm:py-72" style="background:radial-gradient(circle at 50% bottom, #012044, #050505, #050505)">
                <div class="animate-slide-up">
                    <p class="mb-6 text-center text-lg text-white/50 sm:mb-10">fraud.cool</p>
                    <h3 class="mx-auto mb-6 max-w-4xl text-center text-4xl font-extrabold text-white sm:mb-10 sm:text-5xl">Ready to Start Crafting Your Digital Story? 🪁</h3>
                    <div class="flex justify-center">
                        <a class="rounded-xl border bg-white px-6 py-3 text-center text-lg text-black duration-300 hover:bg-black hover:text-white sm:text-lg" draggable="false" href="{{ route('register') }}">Claim Your Bio</a>
                    </div>
                </div>
            </section>

        </main>

        <footer class="border-t border-stone-400/10 text-white">
            <div class="mx-auto flex max-w-7xl select-none flex-col items-center justify-start gap-6 px-8 py-10 lg:flex-row lg:justify-between lg:gap-0 lg:py-0">
                <div class="flex w-full lg:w-auto">
                    <p class="font-light sm:text-md">{{ config('app.name') }} — All Rights reserved</p>
                </div>
                <ul class="flex w-full flex-col justify-center gap-1 lg:w-auto lg:flex-row lg:items-center lg:gap-10">
                    <li>
                        <a class="block w-full font-light sm:text-lg lg:w-auto lg:py-10 hover:lg:underline hover:lg:underline-offset-[-49.5px]" target="_blank" rel="noopener noreferrer nofollow" draggable="false" href="{{ config('services.discord.invite') }}">Discord</a>
                    </li>
                </ul>
            </div>
        </footer>
        
    </body>
</html>
