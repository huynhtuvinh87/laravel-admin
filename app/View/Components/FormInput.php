<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    public $lable;
    public $name;

    public function __construct($lable, $name)
    {
        $this->lable = $lable;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.form.input');
    }
}
