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
    public $profile;
    public $createSocialMedia;
    public $createSelectedSocialMedia;
    public $item;
    public $inputUrl;
    public $inputNumber;
    public $inputIsNumber;
    public $initEditInput;
    public $editInputChanged;
    public $editDisplayed;
    public $createDisplayed;
    public $deleteDisplayed;
    public $submitDisabled;

    public function mount()
    {
        $this->profile = Auth::user()->profile;
        $this->createSocialMedia = ModelsSocialMedia::all()->diff($this->profile->socialMedia);
        $this->createSelectedSocialMedia = 0;
        $this->item = null;
        $this->inputUrl = '';
        $this->inputNumber = '';
        $this->inputIsNumber = false;
        $this->initEditInput = '';
        $this->editInputChanged = false;
        $this->editDisplayed = false;
        $this->createDisplayed = false;
        $this->deleteDisplayed = false;
        $this->submitDisabled = true;
        $this->resetValidation();
    }

    public function create()
    {
        $this->mount();
        // dd(count($this->createSocialMedia));
        $this->createDisplayed = true;
    }

    public function onCreateSelectChanged(){
        $this->inputIsNumber = ($this->createSelectedSocialMedia == 1);
        $this->submitDisabled = false;
        $this->resetValidation();
    }

    public function onCreateInputChanged()
    {
        $this->resetValidation();
    }

    public function store(ModelsSocialMedia $item){
        // dd($this->createSelectedSocialMedia);
        if ($this->inputIsNumber) {
            $this->validate(
                [
                    'inputNumber' => 'required|numeric|digits:10'
                ],
                [
                    'required' => 'El :attribute es requerido.',
                    'numeric' => 'Todo el campo debe ser numérico.',
                    'digits:10' => 'El :attribute debe contener :value dígitos.',
                ],
                [
                    'inputNumber' => 'número',
                ]
            );
        }else{
            $this->validate(
                [
                    'inputUrl' => 'required'
                ],
                [
                    'required' => 'El link es requerido.',
                ],
            );
        }
        $this->profile->socialMedia()->attach($this->createSelectedSocialMedia,[
            'url' => ($this->inputIsNumber) ? 'https://wa.me/57' . $this->inputNumber : $this->inputUrl
        ]);

        $this->dispatch('alert-sent', type: 'success', message: 'Se registró la red social');
        $this->mount();
    }

    public function edit(ModelsSocialMedia $item)
    {
        $this->mount();
        $this->item = $this->profile->socialMedia()->find($item->id);
        $this->initEditInput = $this->item->pivot->url;
        $this->inputIsNumber = ($this->item->id == 1);
        if ($this->inputIsNumber) {
            $this->inputNumber = str_replace('https://wa.me/57', '', $this->initEditInput);
        } else {
            $this->inputUrl = $this->item->pivot->url;
        }
        $this->editDisplayed = true;
    }

    public function onEditInputChanged()
    {
        $this->submitDisabled = ($this->inputIsNumber) ? (str_replace('https://wa.me/57', '', $this->initEditInput) == $this->inputNumber) : ($this->initEditInput == $this->inputUrl);
        $this->resetValidation();
    }

    public function update(ModelsSocialMedia $item)
    {
        if ($this->inputIsNumber) {
            $this->validate(
                [
                    'inputNumber' => 'required|numeric|digits:10'
                ],
                [
                    'required' => 'El :attribute es requerido.',
                    'numeric' => 'Todo el campo debe ser numérico.',
                    'digits:10' => 'El :attribute debe contener :value dígitos.',
                ],
                [
                    'inputNumber' => 'número',
                ]
            );
        }else{
            $this->validate(
                [
                    'inputUrl' => 'required'
                ],
                [
                    'required' => 'El link es requerido.',
                ],
            );
        }
        $this->profile->socialMedia()->updateExistingPivot($item->id, [
            'url' => ($this->inputIsNumber) ? 'https://wa.me/57' . $this->inputNumber : $this->inputUrl
        ]);
        $this->editDisplayed = false;
        $this->dispatch('alert-sent', type: 'success', message: 'Se actualizó la red social');
        $this->mount();
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
                    'url' => (empty($this->number)) ? $this->url : "https://wa.me/57" . $this->number
                ]);
            } catch (\Illuminate\Database\UniqueConstraintViolationException $th) {
                $this->render();
                // dd($this->editOrCreateDisplayed);
            }
        }
        // $this->editOrCreateDisplayed = false;
    }


    public function dialogDestroy(ModelsSocialMedia $item)
    {
        $this->mount();
        $this->deleteDisplayed = true;
        $this->item = $item;
    }

    public function destroy(ModelsSocialMedia $item)
    {
        $this->profile->socialMedia()->detach($item->id);
        $this->deleteDisplayed = false;
        $this->dispatch('alert-sent', type: 'warning', message: 'Se eliminó la red social');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.profile.edit.social-media');
    }
}
