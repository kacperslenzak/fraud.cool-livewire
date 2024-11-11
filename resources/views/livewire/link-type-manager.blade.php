<div class="mt-4">
    <div class="mb-8">
        <button 
            wire:click="addNew"
            class="px-4 py-2 bg-zinc-900 text-white font-medium rounded hover:bg-zinc-800 mb-6"
            @if($newLinkType) disabled @endif
        >
            Add New Link Type
        </button>
    </div>

    <h1 class="text-white font-bold text-2xl">Links</h1>

    @if($newLinkType)
        <div class="mt-4 mb-6 mt-20 p-4 border rounded-lg bg-transparent">
            <div class="mb-4">
                <label class="block text-sm font-medium text-white">Label</label>
                <input type="text" wire:model="label" class="mt-1 block w-full rounded-md bg-transparent text-white border-white/20 shadow-sm">
                @error('label') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Icon</label>
                <input type="text" wire:model="icon" class="mt-1 block w-full rounded-md bg-transparent text-white border-white/20 shadow-sm">
                @error('icon') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Placeholder</label>
                <input type="text" wire:model="placeholder" class="mt-1 block w-full rounded-md bg-transparent text-white border-white/20 shadow-sm">
                @error('placeholder') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-2">
                <button 
                    wire:click="save"
                    class="px-4 py-2 bg-zinc-900 text-white rounded hover:bg-zinc-800 font-medium"
                >
                    Save
                </button>
                <button 
                    wire:click="cancel"
                    class="px-4 py-2 bg-white text-black rounded font-medium hover:bg-gray-100"
                >
                    Cancel
                </button>
            </div>
        </div>
    @endif

    <div class="space-y-4 mt-4">
        @foreach($linkTypes as $linkType)
            <div class="p-4 border rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-medium text-white text-2xl font-bold">label: {{ $linkType->label }}</p>
                        <p class="text-white/50">name: {{ $linkType->name }}</p>
                        <p class="text-white/50">placeholder: {{ $linkType->placeholder }}</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div><i class="text-white text-4xl {{ $linkType->icon }}"></i></div>
                        <button 
                            wire:click="delete({{ $linkType->id }})"
                            class="text-red-500 hover:text-red-700"
                            onclick="return confirm('Are you sure you want to delete this link type?')"
                        >
                            ×
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
