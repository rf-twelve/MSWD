<?php

namespace App\Http\Livewire\Settings;

use App\Models\Doc;
use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        return view('livewire.settings.users',[
            'users' => User::all()
        ]);
    }
}
