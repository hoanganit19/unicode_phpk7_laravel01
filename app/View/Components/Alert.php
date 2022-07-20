<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $typeError;
    public $message;
    public $align;

    public function __construct($typeAlert='success', $message, $align="left")
    {
        $this->typeError = $typeAlert;
        $this->message = $message;
        $this->align = $align;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
