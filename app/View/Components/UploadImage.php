<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UploadImage extends Component
{
    public $photo;

    /**
     * Create a new component instance.
     *
     * @param $photo
     */
    public function __construct($photo)
    {
        $this->photo = $photo;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.form.upload');
    }
}
