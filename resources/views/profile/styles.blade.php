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