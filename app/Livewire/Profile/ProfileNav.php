<?php

namespace App\Livewire\Profile;
use Livewire\Attributes\Url;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileNav extends Component
{
    public $profile;

    public function mount(){
        $this->profile = Auth::user()->profile;
    }

    #[Url]
    public $section = 'profile';

    public function navigate(){
        $this->dispatch('section-changed',section: $this->section);
        $this->dispatch('resetScroll');
    }

    public function render()
    {
        return view('livewire.profile.profile-nav');
    }
}
