<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class BackgroundImageUpload extends Component
{
    use WithFileUploads;

    public $backgroundImage;
    public $existingBackgroundImage;

    public function mount()
    {
        $this->existingBackgroundImage = auth()->user()->profile_settings?->background_image;
    }

    public function updatedBackgroundImage()
    {
        $this->validate([
            'backgroundImage' => 'image|max:2048',
        ]);

        $path = $this->backgroundImage->store('backgrounds', 'public');
        
        if ($this->existingBackgroundImage) {
            Storage::disk('public')->delete($this->existingBackgroundImage);
        }

        auth()->user()->profile_settings()->updateOrCreate(
            [],
            ['background_image' => $path]
        );

        $this->existingBackgroundImage = $path;
        $this->reset('backgroundImage');
    }

    public function deleteBackground()
    {
        if ($this->existingBackgroundImage) {
            Storage::disk('public')->delete($this->existingBackgroundImage);
            auth()->user()->profile_settings()->update(['background_image' => null]);
            $this->existingBackgroundImage = null;
        }
    }

    public function render()
    {
        return view('livewire.background-image-upload');
    }
}