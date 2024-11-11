<div class="space-y-2">
    <label class="text-white font-medium">Background Image</label>
    <div class="relative">
        @if ($existingBackgroundImage)
            <div class="relative inline-block">
                <img src="{{ Storage::url($existingBackgroundImage) }}" alt="Background" class="w-64 h-36 border border-1 border-white/50 object-cover">
                <button 
                    wire:click="deleteBackground"
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
                wire:model="backgroundImage"
                class="hidden"
                id="background-upload"
                accept="image/*"
            >
            @if(!$existingBackgroundImage)
            <label
                for="background-upload"
                class="cursor-pointer inline-flex items-center px-4 py-2 bg-zinc-900 text-white rounded-md font-medium hover:bg-zinc-800 transition-colors"
            >
                {{ 'Upload Background' }}
            </label>
            @endif
        </div>

        <div wire:loading wire:target="backgroundImage" class="mt-2 text-white">
            Uploading...
        </div>

        @error('backgroundImage')
            <span class="mt-2 text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
</div>