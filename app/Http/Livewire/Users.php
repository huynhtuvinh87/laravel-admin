<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public function render()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.user',compact('users'));
    }
}
