<?php

namespace App\Http\Livewire\Settings;

use App\Models\User;
use Livewire\Component;

class ProfileSettings extends Component
{
    public $uid;
    public $profile = [
        'fullname' => '',
        'username' => '',
        'email' => '',
        'avatar' => '',
    ];

    public function render()
    {
        return view('livewire.settings.profile-settings');
    }

    public function mount(){
        $user = auth()->user();
        $this->profile = [
            'fullname' => $user->fullname,
            'username' => $user->username,
            'email' => $user->email,
            'avatar' => $user->avatar,
        ];
    }


}
