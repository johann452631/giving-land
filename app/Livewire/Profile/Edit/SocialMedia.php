<?php

namespace App\Livewire\Profile\Edit;

use App\Models\Profile;
use App\Models\SocialMedia as ModelsSocialMedia;
use App\MyOwn\classes\Utility;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;

class SocialMedia extends Component
{
    public $profile, $socialMedia, $item, $editOrCreateDisplayed, $deleteDisplayed, $divInputDisplayed, $whatsappSelected, $id;

    #[Validate('required')]
    public $url;

    #[Validate('required|numeric')]
    public $number;


    public function mount()
    {
        $this->socialMedia = ModelsSocialMedia::all();
        $this->item = null;
        $this->editOrCreateDisplayed = $this->deleteDisplayed = $this->divInputDisplayed = $this->whatsappSelected = false;
        $this->id = '0';
        $this->url = $this->number = '';
    }

    public function onChangeSelect()
    {
        $this->divInputDisplayed = true;
        $this->url = '';
        $this->number = '';
        $this->resetValidation();
        // $this->render();
    }

    public function editOrCreate($item = null)
    {
        // dd($item);
        $this->item = $item;
        $this->deleteDisplayed = false;
        if ($item !== null) {
            $this->divInputDisplayed = true;
            $this->id = $item['id'];
            $this->url = $item['pivot']['url'];
        }
        $this->editOrCreateDisplayed = true;
    }


    public function updateOrStore()
    {
        $this->validate([
            // 'url' => 'required',
        ]);
        if ($this->item !== null) {
            $item = ModelsSocialMedia::find($this->id);
            $this->authorize('updateOrStore', $item);
            $item->profiles()->updateExistingPivot($this->profile->id, [
                'url' => (empty($this->number)) ? $this->url : $this->number
            ]);
        } else {
            try {
                $this->profile->socialMedia()->attach($this->id, [
                    'url' => (empty($this->number)) ? $this->url : "https://wa.me/57". $this->number
                ]);
            } catch (\Illuminate\Database\UniqueConstraintViolationException $th) {
                $this->render();
                // dd($this->editOrCreateDisplayed);
            }
        }
        $this->editOrCreateDisplayed = false;
    }


    public function dialogDestroy($item)
    {
        $this->editOrCreateDisplayed = false;
        $this->deleteDisplayed = true;
        $this->item = $item;
    }

    public function destroy($id)
    {
        $this->profile->socialMedia()->detach($id);
        $this->deleteDisplayed = false;
        // $this->mount();
        // $this->render();
    }

    public function render()
    {
        return view('livewire.profile.edit.social-media');
    }
}
