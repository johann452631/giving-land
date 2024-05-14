<?php

namespace App\Livewire\Profile\Edit;

use App\Models\SocialMedia as ModelsSocialMedia;
use Livewire\Component;
use Livewire\Attributes\Validate;

class SocialMedia extends Component
{
    public $profile;

    public $socialMedia;

    
    // #[Validate('required')]
    public $inputUrl;
    
    public $redSocialId;
    
    public bool $popupEditDisplayed;

    public function mount()
    {
        $this->socialMedia = ModelsSocialMedia::all();
        $this->inputUrl = '';
        $this->redSocialId = -1;
        $this->popupEditDisplayed = false;
    }

    public function store()
    {
        try {
            $this->inputUrl = ($this->redSocialId == 4) ? "https://wa.me/" . $this->inputUrl : $this->inputUrl;
            $this->profile->socialMedia()->attach($this->redSocialId, ['url' => $this->inputUrl]);
            $this->js("alert('¡Se agregó la red social!')");
        } catch (\Illuminate\Database\UniqueConstraintViolationException $th) {
            //throw $th;
            $this->js("alert('¡UPs! Solo puedes tener un solo tipo de red social')");
            $this->mount();
        }
    }

    public function prueba(){
        $this->popupEditDisplayed = false;
    }

    public function edit($item){
        // $this->render();
        $this->popupEditDisplayed = true;
        $this->inputUrl = $item['pivot']['url'];
        $this->redSocialId = $item['id'];
    }

    public function update(){}

    public function render()
    {
        return view('livewire.profile.edit.social-media');
    }
}
