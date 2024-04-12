<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public string $hidden;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type,
        public string $name,
        public string $labelText,
        public bool $isRequired = false
    )
    {
        $this->hidden = ($isRequired) ? '' : 'hidden';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.forms.input');
    }
}
