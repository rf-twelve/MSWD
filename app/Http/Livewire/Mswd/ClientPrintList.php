<?php

namespace App\Http\Livewire\Mswd;

use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class ClientPrintList extends Component
{
    public function print()
    {
        $model = Client::get();

        foreach ($model as $key => $value) {
            $arr[$key]['fullname'] = $value['first_name'].' '.$value['last_name'];
            $arr[$key]['birthdate'] = $value['birthdate'];
            $arr[$key]['gender'] = $value['gender'];
            $arr[$key]['photo'] = $value->imageUrl();
            $arr[$key]['category'] = $value['category'];
            $arr[$key]['barangay'] = $value['barangay'];
            $arr[$key]['contact'] = $value['contact'];

        }

        $data_arr = [
            'data' => $arr,
        ];

        $pdf = Pdf::loadView('pdf.clients-form-list', $data_arr);

        return $pdf->stream('clients-form-list.pdf');
    }
    public function render()
    {
        return view('livewire.mswd.client-print-list');
    }
}
