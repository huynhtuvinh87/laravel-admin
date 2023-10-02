<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class Create extends Component
{
    public $name;
    public $slug;
    
    public function render()
    {
        return view('livewire.category.create');
    }
}
