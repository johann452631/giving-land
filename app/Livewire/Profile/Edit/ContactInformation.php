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
    public $inputName;
    public $inputInfo;
    public $submitDisabled;
    public $createDisplayed;
    public $editDisplayed;
    public $deleteDisplayed;

    public function mount(){
        $this->profile = Auth::user()->profile;
        $this->isLink = false;
        $this->inputName = '';
        $this->inputInfo = '';
        $this->submitDisabled = true;
        $this->createDisplayed = false;
        $this->editDisplayed = false;
        $this->deleteDisplayed = false;
    }

    public function create(){
        $this->mount();
        $this->createDisplayed = true;
    }

    public function store(ModelsContactInformation $item){
        dd($item);
    }

    public function render()
    {
        return view('livewire.profile.edit.contact-information');
    }
}
