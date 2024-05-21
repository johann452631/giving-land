<?php

namespace App\Livewire\Profile\Edit;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ContactInformation extends Component
{
    public $profile;
    public $isLink;
    public $inputInfo;
    public $createDisplayed;
    public $editDisplayed;
    public $deleteDisplayed;

    public function mount(){
        $this->profile = Auth::user()->profile;
        $this->isLink = false;
        $this->inputInfo = '';
        $this->createDisplayed = false;
        $this->editDisplayed = false;
        $this->deleteDisplayed = false;
    }

    public function create(){
        $this->mount();
        $this->createDisplayed = true;
    }

    public function render()
    {
        return view('livewire.profile.edit.contact-information');
    }
}
