<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class ProfileNav extends Component
{
    public function render()
    {
        $user = auth()->user();
        $visitedProfile = User::where('username',request('username'))->first()->profile;
        return view('livewire.profile.profile-nav', compact('user','visitedProfile'));
    }
}
