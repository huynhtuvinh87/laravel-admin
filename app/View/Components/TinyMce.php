<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TinyMce extends Component
{
    public $content;

    /**
     * Create a new component instance.
     *
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.tinymce');
    }
}
