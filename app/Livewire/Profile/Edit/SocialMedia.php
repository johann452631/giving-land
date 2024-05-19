<?php

namespace App\Livewire\Profile\Edit;

use App\Models\Profile;
use App\Models\SocialMedia as ModelsSocialMedia;
use App\MyOwn\classes\Utility;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;

class SocialMedia extends Component
{
    public $profile, $socialMedia, $item, $editUrl, $editDisplayed, $createDisplayed, $deleteDisplayed, $whatsappSelected, $id;

    #[Validate('required')]
    public $url;

    #[Validate('required|numeric')]
    public $number;


    public function mount()
    {
        $this->profile = Auth::user()->profile;
        $this->socialMedia = ModelsSocialMedia::all();
        // dd(count($this->profile->socialMedia));
        $this->item = null;
        $this->editDisplayed = $this->createDisplayed = $this->deleteDisplayed = $this->whatsappSelected = false;
        $this->id = '0';
        $this->url = $this->number = '';
    }

    public function create(){
        $this->editDisplayed = false;
        $this->deleteDisplayed = false;
        $this->createDisplayed = true;
    }

    public function edit($item)
    {
        // dd($item);
        $this->createDisplayed = false;
        $this->deleteDisplayed = false;
        $this->id = $item['id'];
        $this->url = $item['pivot']['url'];
        $this->editDisplayed = true;
    }

    public function update(){

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
