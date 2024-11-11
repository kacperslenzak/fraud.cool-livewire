<x-app-layout>

    <!-- Main Content Area -->
    <div class="flex-1 p-10 flex-col">
        <h1 class="text-white font-bold text-2xl">Welcome back</h1>
        <p class="text-white/50">Here you can customize your biolink</p>
        <hr class="my-4 border-white/10" />

        <form action="{{ route('dashboard.update') }}" method="POST">
            @csrf
            <div class="grid grid-rows-1 grid-cols-2 gap-12">
                <div class="group space-y-8">

                    <div class="space-y-2">
                        <label for="link" class="text-white font-medium">Link</label>
                        <div class="flex">
                            <div class="bg-zinc-900 rounded-md py-2 px-4">
                                <p class="text-white/50 font-medium">fraud.cool/</p>
                            </div>
                            <input type="text" class="bg-transparent outline-none border-white/20 text-white/50 rounded-md mx-2" value="hex" disabled />
                        </div>
                    </div>
            
                    <div class="space-y-2 flex flex-col">
                        <label for="description" class="text-white font-medium">Description</label>
                        <textarea class="bg-transparent outline-none border-white/20 text-white rounded-md w-full h-16 p-3 resize-none" name="description" placeholder="Enter your description..." maxlength="255">{{ auth()->user()->profile_settings?->description }}</textarea>
                    </div>

                    <livewire:avatar-upload />

                    <livewire:background-image-upload />

                </div>

                <div class="group space-y-8">
                    <div class="space-y-2">
                        <label for="card_opacity" class="text-white font-medium">Card Opacity (<span id="opacity_value">{{ auth()->user()->profile_settings?->card_opacity ?? 100 }}%</span>)</label>
                        <div class="flex items-center gap-4">
                            <input 
                                type="range" 
                                id="card_opacity" 
                                name="card_opacity" 
                                min="0" 
                                max="100"
                                value="{{ auth()->user()->profile_settings?->card_opacity ?? 100 }}"
                                class="w-full h-2 rounded-lg appearance-none cursor-pointer [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:h-4 [&::-webkit-slider-thumb]:w-4 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-black [&::-webkit-slider-thumb]:ring-2 [&::-webkit-slider-thumb]:ring-gray-800"
                                style="background: linear-gradient(to right, white 0%, white var(--value, 50%), rgba(255,255,255,0.2) var(--value, 50%), rgba(255,255,255,0.2) 100%)"
                            >
                        </div>
                    </div>

                    <script>
                        const slider = document.getElementById('card_opacity');
                        const output = document.getElementById('opacity_value');
                        slider.oninput = function() {
                            output.textContent = this.value + '%';
                            this.style.setProperty('--value', this.value + '%');
                        }
                        // Set initial value
                        slider.style.setProperty('--value', slider.value + '%');
                    </script>

                    <div class="space-y-2">
                        <label class="text-white font-medium">Display Options</label>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input type="hidden" name="show_uid" value="0">
                                <div class="relative">
                                    <input 
                                        type="checkbox" 
                                        id="show_uid" 
                                        name="show_uid"
                                        value="1"
                                        @checked(auth()->user()->profile_settings?->show_uid ?? true)
                                        class="peer appearance-none w-4 h-4 rounded border-2 border-white bg-black checked:bg-white focus:!bg-black hover:!bg-black"
                                    >
                                    <svg class="absolute w-3 h-3 inset-0 m-auto text-black pointer-events-none hidden peer-checked:block translate-y-[2px]" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.5 4.5L6.5 11.5L3 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <label for="show_uid" class="ml-2 text-white">Show UID</label>
                            </div>
                            <div class="flex items-center">
                                <input type="hidden" name="show_views" value="0">
                                <div class="relative">
                                    <input 
                                        type="checkbox" 
                                        id="show_views" 
                                        name="show_views"
                                        value="1"
                                        @checked(auth()->user()->profile_settings?->show_views ?? true)
                                        class="peer appearance-none w-4 h-4 rounded border-2 border-white bg-black checked:bg-white focus:!bg-black hover:!bg-black"
                                    >
                                    <svg class="absolute w-3 h-3 inset-0 m-auto text-black pointer-events-none hidden peer-checked:block translate-y-[2px]" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.5 4.5L6.5 11.5L3 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <label for="show_views" class="ml-2 text-white">Show Views</label>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label for="background_effect" class="text-white font-medium">Background Effect</label>
                            <select name="background_effect" id="background_effect" class="bg-black text-white rounded-md w-full mt-2">
                                <option value="none">None</option>
                                <option value="snow" @selected(auth()->user()->profile_settings?->background_effect === 'snow')>Snow</option>
                            </select>
                        </div>

                        <div>
                            <label for="username_effect" class="text-white font-medium">Username Effect</label>
                            <select name="username_effect" id="username_effect" class="bg-black text-white rounded-md w-full mt-2">
                                <option value="none">None</option>
                                <option value="rainbow-text" @selected(auth()->user()->profile_settings?->username_effect === 'rainbow-text')>Rainbow</option>
                                <option value="red-sparkles" @selected(auth()->user()->profile_settings?->username_effect === 'red-sparkles')>Red Sparkles</option>
                            </select>
                        </div>

                        <div class="flex flex-col justify-center">
                            <label for="background_color" class="text-white font-medium">Background Color</label>
                            <div class="flex items-center bg-zinc-900 rounded-md p-2 border border-white/10 mt-2 cursor-pointer" onclick="document.getElementById('background_color').click()">
                                <input type="color" name="background_color" id="background_color" class="absolute w-0 h-0" value="{{ auth()->user()->profile_settings?->background_color ?? '#060606' }}">
                                <span id="color-code" class="ml-2 text-white">{{ auth()->user()->profile_settings?->background_color ?? '#060606' }}</span>
                                <div class="ml-2 w-6 h-6 rounded-full ms-auto" id="color-preview" style="background-color: {{ auth()->user()->profile_settings?->background_color ?? '#060606' }}"></div>
                            </div>
                        </div>
                        <script>
                            const colorPicker = document.getElementById('background_color');
                            const colorCode = document.getElementById('color-code');
                            const colorPreview = document.getElementById('color-preview');

                            colorPicker.addEventListener('input', () => {
                                colorCode.innerText = colorPicker.value;
                                colorPreview.style.backgroundColor = colorPicker.value;
                            });
                        </script>

                    </div>
                    
                </div>
            </div>

            @if ($errors->any())
                <div class="mt-4 text-red-500">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button class="bg-white text-black px-12 py-2 rounded-md font-medium mt-8" type="submit">Save</button>
        </form>
    </div>

</x-app-layout>