<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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
        try {
            $this->validate([
                'backgroundImage' => 'image|max:2048',
            ]);

            $path = $this->backgroundImage->store('backgrounds', 'public');
            if (!$path) {
                throw new \Exception('Failed to store image');
            }
            
            if ($this->existingBackgroundImage) {
                Storage::disk('public')->delete($this->existingBackgroundImage);
            }

            auth()->user()->profile_settings()->updateOrCreate(
                [],
                ['background_image' => $path]
            );

            $this->existingBackgroundImage = $path;
            $this->reset('backgroundImage');
        } catch (\Exception $e) {
            Log::error('Background upload failed: ' . $e->getMessage());
            session()->flash('error', 'Failed to upload background image');
        }
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