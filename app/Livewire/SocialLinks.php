<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LinkTypes;
use App\Models\Links;

class SocialLinks extends Component
{
    public $links = [];
    public $newUrl = '';
    public $selectedPlatform = '';
    
    public $platforms = [];

    public function mount()
    {
        $this->platforms = LinkTypes::all()->mapWithKeys(function($linkType) {
            return [$linkType->name => $linkType];
        })->toArray();

        $this->links = Links::where('user_id', auth()->id())->get()->toArray();

    }

    public function addSocialLink($platform)
    {
        $this->selectedPlatform = $platform;
    }

    public function saveLink()
    {
        $this->validate([
            'newUrl' => [
                'required',
                'url',
                function ($attribute, $value, $fail) {
                    // Check if URL already exists for this user
                    $exists = Links::where('user_id', auth()->id())
                                 ->where('url', $value)
                                 ->exists();
                                 
                    if ($exists) {
                        $fail('You already have a link with this URL.');
                    }
                }
            ],
            'selectedPlatform' => 'required'
        ]);

        // Get the LinkType model based on the selected platform name
        $linkType = LinkTypes::where('name', $this->selectedPlatform)->first();

        // Create the new link
        Links::create([
            'user_id' => auth()->id(),
            'link_type_id' => $linkType->id,
            'url' => $this->newUrl
        ]);

        // Refresh the links array with all user's links
        $this->links = Links::where('user_id', auth()->id())->get()->toArray();

        $this->reset(['newUrl', 'selectedPlatform']);
    }

    public function removeLink($index)
    {
        // Get the link ID from the array
        $linkId = $this->links[$index]['id'];
        
        // Delete from database
        Links::where('id', $linkId)->delete();
        
        // Remove from local array
        unset($this->links[$index]);
        $this->links = array_values($this->links);
    }

    public function getLinkInfo($link){
        return LinkTypes::where('id', $link['link_type_id'])->first();
    }

    public function render()
    {
        return view('livewire.social-links', [
            'platforms' => $this->platforms
        ]);
    }
}
