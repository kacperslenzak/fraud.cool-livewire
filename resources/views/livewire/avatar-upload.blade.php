<div class="space-y-2">
    <label class="text-white font-medium">Avatar</label>
    <div class="relative">
        @if ($existingAvatar)
            <div class="relative inline-block">
                <img src="{{ Storage::url($existingAvatar) }}" alt="Avatar" class="w-32 h-32 border border-1 border-white/50 object-cover">
                <button 
                    wire:click="deleteAvatar"
                    class="absolute top-0 right-0 bg-red-500 rounded-full p-1 transform translate-x-1/3 -translate-y-1/3 hover:bg-red-600 transition-colors"
                >
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif
        
        <div class="mt-4">
            <input
                type="file"
                wire:model="avatar"
                class="hidden"
                id="avatar-upload"
                accept="image/*"
            >
            @if(!$existingAvatar)
            <label
                for="avatar-upload"
                class="cursor-pointer inline-flex items-center px-4 py-2 bg-zinc-900 text-white rounded-md font-medium hover:bg-zinc-800 transition-colors"
            >
                {{ 'Upload Avatar' }}
            </label>
            @endif
        </div>

        <div wire:loading wire:target="avatar" class="mt-2 text-white">
            Uploading...
        </div>

        @error('avatar')
            <span class="mt-2 text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
</div>