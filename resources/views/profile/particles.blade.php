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