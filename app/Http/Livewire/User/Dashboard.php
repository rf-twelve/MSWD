<?php

namespace App\Http\Livewire\User;

use App\Models\AuditTrail;
use App\Models\Doc;
use DateTimeImmutable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function terminal()
    {
        # code...
    }
    public function render()
    {
        // dd(date("Y-m-d-His") ); // Generate Tracking Number
        return view('livewire.user.dashboard',[
        ]);
    }

    public function logout() {
        auth()->logout(); return redirect('/');
    }
}
