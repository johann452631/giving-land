<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;

class ProfileSection extends Component
{
    public $profile;

    // #[Url]
    public $section = 'profile';

    #[On('section-changed')]
    public function change($section){
        // $this->profile = Auth::user()->profile;
        $this->section = $section;
        // $this->render();
    }

    public function render()
    {
        return view('livewire.profile.profile-section',[
            'section' => $this->section,
        ]);
    }
}
