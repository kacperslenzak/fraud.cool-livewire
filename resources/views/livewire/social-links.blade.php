<div class="inline-block space-y-6">
    {{-- Social Icons --}}
    <div class="inline-flex flex-col space-y-4 mt-4 bg-transparent border border-white/20 rounded-xl p-4">
        <div>
            <h1 class="text-white font-bold text-lg">Link your social media platforms</h1>
            <p class="text-white/50 text-sm">Pick a social media platform to link to your profile</p>
        </div>

        <div class="space-x-2">
            @foreach($platforms as $key => $platform)
            <button 
                wire:click="addSocialLink('{{ $key }}')"
                class="px-3 py-2 bg-transparent border border-white/20 rounded-xl hover:bg-white/10 transition">
                <i class="{{ $platform['icon'] }} text-white text-xl"></i>
                </button>
            @endforeach
        </div>
    </div>

    {{-- Add Link Form --}}
    @if($selectedPlatform)
        <div class="bg-transparent border border-white/20 p-4 rounded-lg">
            <form wire:submit.prevent="saveLink" class="space-y-4">
                <div>
                    <label class="block text-white mb-2">
                        Add {{ $platforms[$selectedPlatform]['name'] }} URL
                    </label>
                    <input 
                        type="url" 
                        wire:model="newUrl"
                        class="w-full p-2 rounded bg-transparent border border-white/20 text-white"
                        placeholder="{{ $platforms[$selectedPlatform]['placeholder'] }}"
                        value="{{ $platforms[$selectedPlatform]['placeholder'] }}"
                        x-data="{}"
                        x-init="$el.value = $el.getAttribute('value')"
                        oninput="if (!this.value.startsWith(this.getAttribute('value'))) this.value = this.getAttribute('value')"
                        wire:key="{{ $selectedPlatform }}"
                    >
                    @error('newUrl') 
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button 
                    type="submit"
                    class="bg-zinc-800 text-white px-4 py-2 rounded hover:bg-zinc-700"
                >
                    Save Link
                </button>
            </form>
        </div>
    @endif

    {{-- Links List --}}
    @if(count($links) > 0)
        <div class="space-y-3">
            <h2 class="text-white text-xl font-semibold">Your Links</h2>
            @foreach($links as $index => $link)
                <div class="flex items-center justify-between bg-transparent border border-white/20 p-3 rounded">
                    <div class="flex items-center space-x-3">
                        <i class="{{ $this->getLinkInfo($link)['icon'] }} text-white"></i>
                        <a href="{{ $link['url'] }}" target="_blank" class="text-blue-400 hover:underline">
                            {{ $link['url'] }}
                        </a>
                    </div>
                    <button 
                        wire:click="removeLink({{ $index }})"
                        class="text-red-400 hover:text-red-500"
                    >
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            @endforeach
        </div>
    @endif
</div>
