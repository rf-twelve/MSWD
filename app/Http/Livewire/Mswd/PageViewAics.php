<?php

namespace App\Http\Livewire\Mswd;

use App\Models\Assistance;
use Livewire\Component;

class PageViewAics extends Component
{
    public $data;
    public $images;

    public function mount($user_id, $id){
        $this->data = Assistance::with('claimant','beneficiary','image_files')->find($id);
        $this->images = $this->data->image_files->where('imageable_type','aics');
        // dd($this->data);
    }
    public function render()
    {
        return view('livewire.mswd.page-view-aics');
    }
}
