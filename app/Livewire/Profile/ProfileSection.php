<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;

class ProfileSection extends Component
{
    public $user;

    #[Url]
    public $section = 'profile';

    public function mount(){
        $this->user = Auth::user();
    }

    #[On('section-changed')]
    public function change($section){
        $this->section = $section;
        $this->render();
    }

    public function render()
    {
        return view('livewire.profile.profile-section',($this->section != 'profile')?[
            'section' => $this->section,
            'user' => $this->user,
        ]:[
            'section' => $this->section,
            'profile' => $this->user->profile,
            'socialMedia' => $this->user->profile->socialMedia,
            'posts' => $this->user->posts,
        ]);
    }
}
