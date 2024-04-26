<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert2 extends Component
{
    public string $color;
    /**
     * Create a new component instance.
     */
    public function __construct(public string $type)
    {
        switch ($type) {
            case 'exito':
                $this->color = 'green';
                break;

            case 'peligro':
                $this->color = 'red';
                break;

            default:
                # code...
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'blade'
<div class="fixed top-14 left-14 z-10 p-5 border-l-4 rounded-md border-s-red-700" {{$attributes}}>
    {{$slot}}
</div>
blade;
    }
}
