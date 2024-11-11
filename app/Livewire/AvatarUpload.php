<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AvatarUpload extends Component
{
    use WithFileUploads;

    public $avatar;
    public $existingAvatar;

    public function mount()
    {
        $this->existingAvatar = auth()->user()->profile_settings?->avatar;
    }

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => [
                'required',
                'image',
                'max:1024',
                'mimes:jpeg,png,jpg,gif',
                'mimetypes:image/jpeg,image/png,image/jpg,image/gif'
            ]
        ]);

        $filename = time() . '_' . hash('sha256', $this->avatar->getClientOriginalName());
        $path = $this->avatar->storeAs('avatars', $filename, 'public');
        
        if (!getimagesize(Storage::disk('public')->path($path))) {
            Storage::disk('public')->delete($path);
            throw ValidationException::withMessages(['avatar' => 'Invalid image file']);
        }

        if ($this->existingAvatar) {
            Storage::disk('public')->delete($this->existingAvatar);
        }

        auth()->user()->profile_settings()->updateOrCreate(
            [], // empty array means match by user_id
            ['avatar' => $path]
        );

        $this->existingAvatar = $path;
        $this->reset('avatar');
    }

    public function deleteAvatar()
    {
        if ($this->existingAvatar) {
            Storage::disk('public')->delete($this->existingAvatar);
            auth()->user()->profile_settings()->update(['avatar' => null]);
            $this->existingAvatar = null;
        }
    }

    public function render()
    {
        return view('livewire.avatar-upload');
    }
}