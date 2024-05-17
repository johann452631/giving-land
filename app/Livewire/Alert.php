<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;


class Alert extends Component
{
    public $displayed = false;

    public string $type,$message,$bg , $borderColor, $textColor;

    public function mount(){
        $this->type = $this->message = $this->bg = $this->borderColor = $this->textColor = '';

        switch ($this->type) {
            case 'success':
                $this->bg = 'bg-green-200';
                $this->borderColor = 'border-green-500';
                $this->textColor = 'text-green-800';
                break;

            case 'warning':
                $this->bg = 'bg-yellow-100';
                $this->borderColor = 'border-yellow-400';
                $this->textColor = 'text-yellow-700';
                break;

            case 'danger':
                $this->bg = 'bg-red-200';
                $this->borderColor = 'border-red-500';
                $this->textColor = 'text-red-900';
                break;
            default:
                # code...
                break;
        }
    }

    #[On('alert-sent')]
    public function show(){
        $this->displayed = true;
    }

    public function render()
    {
        // return <<<'blade'
        // <div @class(['fixed top-14 left-14 border-l-4 p-4 z-50 rounded {{$bg}} {{$borderColor}}', 'hidden' => !$displayed]) id="alert_livewire">
        //     <p class="{{$textColor}}">{{$message}}</p>
        // </div>
        // blade;
        return <<<'blade'
        <div @class(['fixed top-14 left-14 border-l-4 p-4 z-50 rounded', 'hidden' => !$displayed]) id="alert_livewire">
            <p>junch</p>
        </div>
        blade;
    }
}
