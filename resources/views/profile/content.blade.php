<div class="py-[60px] w-full max-w-[600px] mx-4 rounded-2xl flex flex-col items-center relative z-10 profile-card">
    @if ($user->profile_settings?->avatar)
        <img src="{{ asset('storage/' . $user->profile_settings->avatar) }}" alt="Avatar" class="w-[90px] md:w-[120px] h-[90px] md:h-[120px] rounded-full mb-4 object-cover">
    @endif
    <h1 class="text-white text-2xl md:text-3xl font-bold {{ $user->profile_settings?->username_effect }}">{{ $user->name }}</h1>
    @if ($user->profile_settings?->description)
        <p class="text-white/50 text-center px-4">{{ $user->profile_settings->description }}</p>
    @endif
    @if ($user->profile_settings?->show_uid)
        <p class="text-white/50 my-4">UID: {{ $user->id }}</p>
    @endif

    @if ($user->links->count() > 0)
        <div class="flex justify-center flex-wrap gap-2 mt-6 links px-4">
            @foreach ($user->links as $link)
                <a href="/redirect/{{ $user->name }}/{{ $link->id }}" class="text-white hover:scale-110 transition duration-200" target="_blank">
                    <i class="fa-brands fa-{{ $link->linkType->icon }} text-3xl md:text-4xl"></i>
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