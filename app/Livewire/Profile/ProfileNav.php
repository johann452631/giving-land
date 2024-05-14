<?php

namespace App\Livewire\Profile;
use Livewire\Attributes\Url;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileNav extends Component
{
    public $profile;

    #[Url]
    public $section;

    function mount(){
        $this->section = ($this->profile->user->id == Auth::user()->id)?'profile':null;
    }

    public function navigate(){
        $this->dispatch('section-changed',section: $this->section);
        $this->dispatch('resetScroll');
    }

    public function render()
    {
        return view('livewire.profile.profile-nav',[
            'user' => Auth::user()
        ]);
    }
}
