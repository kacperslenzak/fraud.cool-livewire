<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LinkTypes;

class LinkTypeManager extends Component
{
    public $linkTypes = [];
    public $newLinkType = false;
    public $label = '';
    public $icon = '';
    public $placeholder = '';
    public function mount()
    {
        $this->loadLinkTypes();
    }

    public function loadLinkTypes()
    {
        $this->linkTypes = LinkTypes::latest()->get();
    }

    public function addNew()
    {
        $this->newLinkType = true;
    }

    public function save()
    {
        $this->validate([
            'label' => 'required|min:2',
            'icon' => 'required',
            'placeholder' => 'nullable',
        ]);

        $name = str_replace(' ', '-', strtolower($this->label));

        LinkTypes::create([
            'name' => $name,
            'label' => $this->label,
            'icon' => $this->icon,
            'placeholder' => $this->placeholder,
        ]);

        $this->reset(['label', 'icon', 'placeholder', 'newLinkType']);
        $this->loadLinkTypes();
    }

    public function cancel()
    {
        $this->reset(['label', 'icon', 'placeholder', 'newLinkType']);
    }

    public function delete($id)
    {
        LinkTypes::find($id)->delete();
        $this->loadLinkTypes();
    }

    public function render()
    {
        return view('livewire.link-type-manager');
    }
}
