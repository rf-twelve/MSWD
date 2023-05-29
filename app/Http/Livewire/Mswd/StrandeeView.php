<?php

namespace App\Http\Livewire\Mswd;

use App\Models\Strandee;
use Livewire\Component;

class StrandeeView extends Component
{
    public $strandee;

    public function mount($id)
    {
        $this->strandee = Strandee::find($id);
    }

    public function render()
    {
        return view('livewire.mswd.strandee-view');
    }
}
