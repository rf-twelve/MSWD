<?php

namespace App\Http\Livewire\Mswd;

use App\Models\Client;
use Livewire\Component;

class PageViewClient extends Component
{
    public $data;
    public $images;

    public function mount($user_id, $id){
        $this->data = Client::find($id);
        $this->images = $this->data->image_files->where('imageable_type','client');
        // dd($this->data);
    }
    public function render()
    {
        return view('livewire.mswd.page-view-client');
    }
}
