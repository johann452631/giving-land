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

    public $socialMedia;
    public $item;

    #[Validate('required')]
    public $editUrl;

    // #[Validate(
    //     'required|numeric|digits:10',
    //     message: [
    //         'required' => 'El :attribute es requerido.',
    //         'numeric' => 'Todo el campo debe ser numérico.',
    //         'digits:10' => 'El :attribute debe contener :value dígitos.',
    //     ],
    //     attribute: [
    //         'editNumber' => 'número',
    //     ]
    // )]
    public $editNumber;

    public $editIsWhatsapp;
    public $initEditInput;
    public $editInputChanged;
    public $editDisplayed;
    public $createDisplayed;
    public $deleteDisplayed;
    public $createSelectedSocialMedia;
    public $createUrls;

    public function mount()
    {
        $this->profile = Auth::user()->profile;
        $this->socialMedia = ModelsSocialMedia::all();
        $this->item;
        $this->editUrl = '';
        $this->editNumber = '';
        $this->editIsWhatsapp = false;
        $this->initEditInput = '';
        $this->editInputChanged = false;
        $this->editDisplayed = false;
        $this->createDisplayed = false;
        $this->deleteDisplayed = false;
        $this->createSelectedSocialMedia = [];
        $this->createUrls = [];
        $this->resetValidation();
    }

    public function create()
    {
        $this->editDisplayed = false;
        $this->deleteDisplayed = false;
        //codigo
        $this->createDisplayed = true;
    }

    public function edit(ModelsSocialMedia $item)
    {
        $this->mount();
        $this->item = $this->profile->socialMedia()->find($item->id);
        $this->initEditInput = $this->item->pivot->url;
        $this->editIsWhatsapp = ($this->item->id == 1);
        if ($this->editIsWhatsapp) {
            $this->editNumber = str_replace('https://wa.me/57', '', $this->initEditInput);
        } else {
            $this->editUrl = $this->item->pivot->url;
        }
        $this->editDisplayed = true;
    }

    public function onEditInputChanged()
    {
        $this->editInputChanged = ($this->editIsWhatsapp) ? (str_replace('https://wa.me/57', '', $this->initEditInput) != $this->editNumber) : ($this->initEditInput != $this->editUrl);
        $this->resetValidation();
    }

    public function update(ModelsSocialMedia $item)
    {
        if ($this->editIsWhatsapp) {
            $this->validate(
                [
                    'editNumber' => 'required|numeric|digits:10'
                ],
                [
                    'required' => 'El :attribute es requerido.',
                    'numeric' => 'Todo el campo debe ser numérico.',
                    'digits:10' => 'El :attribute debe contener :value dígitos.',
                ],
                [
                    'editNumber' => 'número',
                ]
            );
        }
        $this->profile->socialMedia()->updateExistingPivot($item->id, [
            'url' => ($this->editIsWhatsapp) ? 'https://wa.me/57' . $this->editNumber : $this->editUrl
        ]);
        $this->editDisplayed = false;
        $this->dispatch('alert-sent', type: 'success', message: 'Se actualizó la red social');
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
        // $this->editOrCreateDisplayed = false;
        $this->mount();
        $this->deleteDisplayed = true;
        $this->item = $item;
    }

    public function destroy(ModelsSocialMedia $item)
    {
        $this->profile->socialMedia()->detach($item->id);
        $this->deleteDisplayed = false;
        // $this->mount();
        // $this->render();
    }

    public function render()
    {
        return view('livewire.profile.edit.social-media');
    }
}
