<?php

namespace App\Livewire\Profile;

use App\Models\Profile;
use Livewire\Attributes\Url;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileNav extends Component
{
    // #[Url]
    // public $user;
    public $section;
    function mount($profile, $section)
    {
        $this->section = ($profile->user->id == Auth::user()->id) ? $section : null;
    }

    public function render()
    {
        return view('livewire.profile.profile-nav', [
            'user' => Auth::user()
        ]);
    }
}
