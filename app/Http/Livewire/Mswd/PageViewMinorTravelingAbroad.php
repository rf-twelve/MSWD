<?php

namespace App\Http\Livewire\Mswd;

use App\Models\MinorTravelingAbroad;
use Livewire\Component;

class PageViewMinorTravelingAbroad extends Component
{
    public $data;
    public $images;

    public function mount($user_id, $id){
        $this->data = MinorTravelingAbroad::find($id);
        $this->images = $this->data->image_files->where('imageable_type','mta');
        // dd($this->data);
    }
    public function render()
    {
        return view('livewire.mswd.page-view-minor-traveling-abroad');
    }
}
