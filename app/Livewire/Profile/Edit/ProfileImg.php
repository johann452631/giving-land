<?php

namespace App\Livewire\Profile\Edit;

use App\MyOwn\classes\Utility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileImg extends Component
{
    use WithFileUploads;
    public $profile;
    public $photo;
    public $editDisplayed;
    public $deleteDisplayed;
    public $submitDisabled;

    public function mount()
    {
        $this->profile = Auth::user()->profile;
        $this->photo = null;
        $this->editDisplayed = false;
        $this->deleteDisplayed = false;
        $this->submitDisabled = true;
    }

    public function edit()
    {
        $this->editDisplayed = true;
    }

    public function photoLoaded(){
        $this->submitDisabled = false;
    }

    public function cancel()
    {
        $this->mount();
    }

    public function update()
    {
        // dd($this->photo);
        if ($this->profile->image->url != 'default.svg') {
            Storage::delete('public/users_profile_images/' . $this->profile->image->url);
        }
        $imgName = time() . "_" . str_replace(" ", "_", $this->photo->getClientOriginalName());
        $this->profile->image->update([
            'url' => $imgName
        ]);
        $this->photo->storeAs('public/users_profile_images', $imgName);
        Utility::sendAlert('success', 'Se actualizó la foto de perfil');
        return to_route('profile.edit');
    }

    public function dialogDeletePhoto()
    {
        $this->deleteDisplayed = true;
    }

    public function delete()
    {
        Storage::delete('public/users_profile_images/' . $this->profile->image->url);
        $this->profile->image->update([
            'url' => 'default.svg'
        ]);

        Utility::sendAlert('warning', 'Se eliminó tu foto de perfil');

        return to_route('profile.edit');
    }

    public function render()
    {
        // $this->editDisplayed = false;
        return view('livewire.profile.edit.profile-img');
    }
}
