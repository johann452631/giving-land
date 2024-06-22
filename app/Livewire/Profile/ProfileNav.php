<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class ProfileNav extends Component
{
    public function render()
    {
        return view('livewire.profile.profile-nav', [
            'user' => auth()->user()
        ]);
    }
}
