<?php

namespace App\Http\Livewire\Mswd;

use App\Models\Strandee;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class StrandeePrintList extends Component
{
    public function print()
    {
        $model = Strandee::get();

        foreach ($model as $key => $value) {
            $arr[$key]['name'] = $value['name'];
            $arr[$key]['address'] = $value['address'];
            $arr[$key]['age'] = $value['age'];
            $arr[$key]['birthday'] = $value['birthday'];
            $arr[$key]['problem_presented'] = $value['problem_presented'];
            $arr[$key]['intervention'] = $value['intervention'];
            $arr[$key]['image'] = $value->imageUrl();
        }

        $data_arr = [
            'data' => $arr,
        ];

        $pdf = Pdf::loadView('pdf.strandee-form-list', $data_arr);

        return $pdf->stream('strandee-form-list.pdf');
    }
    public function render()
    {
        return view('livewire.mswd.strandee-print-list');
    }
}
