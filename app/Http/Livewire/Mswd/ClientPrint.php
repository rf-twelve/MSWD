<?php

namespace App\Http\Livewire\Mswd;

use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class ClientPrint extends Component
{
    public function print($user_id,$id)
    {
        $model = Client::find($id);

        $data = [
            'fullname' => $model['first_name'].' '.$model['last_name'],
            'birthdate' => $model['birthdate'],
            'gender' => $model['gender'],
            'photo' => $model->imageUrl(),
            'category' => $model['category'],
            'barangay' => $model['barangay'],
            'contact' => $model['contact'],
        ];

        $pdf = Pdf::loadView('pdf.client-form', $data);

        return $pdf->stream('client-form.pdf');
    }
    public function render()
    {
        return view('livewire.mswd.client-print');
    }
}
