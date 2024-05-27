<?php

namespace App\Livewire\Profile\Edit;

use App\Models\ContactInformation as ModelsContactInformation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ContactInformation extends Component
{
    public $profile;
    public $item;
    public $isLink;
    public $name;
    public $info;
    public $submitDisabled;
    public $createDisplayed;
    public $editDisplayed;
    public $deleteDisplayed;

    public function mount()
    {
        $this->profile = Auth::user()->profile;
        $this->item = null;
        $this->isLink = false;
        $this->name = '';
        $this->info = '';
        $this->submitDisabled = true;
        $this->createDisplayed = false;
        $this->editDisplayed = false;
        $this->deleteDisplayed = false;
    }

    public function create()
    {
        $this->mount();
        $this->createDisplayed = true;
    }

    public function cancelCreate(){
        $this->createDisplayed = false;
    }

    public function store()
    {
        $this->validate(
            [
                'name' => 'required',
                'info' => 'required'
            ],
            [
                'info.required' => 'La :attribute es requerida.',
            ],
            [
                'info' => 'información',
            ]
        );
        $this->profile->contactInformation()->save(ModelsContactInformation::create($this->only(['name', 'info'])));
    }

    public function render()
    {
        return view('livewire.profile.edit.contact-information');
    }
}
