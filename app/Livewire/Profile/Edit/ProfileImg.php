<?php

namespace App\Livewire\Profile\Edit;

use App\MyOwn\classes\Utility;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProfileImg extends Component
{
    public $profile;

    public function deletePhoto(){
        Storage::delete('public/users_profile_images/' . $this->profile->image->url);
        $this->profile->image->update([
            'url' => 'default.svg'
        ]);

        Utility::sendAlert('warning', 'Se eliminó tu foto de perfil');

        return to_route('profile.edit');
    }

    public function render()
    {
        return view('livewire.profile.edit.profile-img');
    }
}
