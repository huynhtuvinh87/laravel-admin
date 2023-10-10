<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Lists extends Component
{
    public function render()
    {
        $users = User::orderBy('created_at', 'DESC')->where('role', 'user')->where('id', '!=', auth()->user()->id)->paginate(10);

        return view('livewire.user.list', compact('users'));
    }
}
