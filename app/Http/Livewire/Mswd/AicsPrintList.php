<?php

namespace App\Http\Livewire\Mswd;

use App\Models\Assistance;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class AicsPrintList extends Component
{
    public function print()
    {
        $model = Assistance::with('claimant','beneficiary','worker')->get();

        foreach ($model as $key => $value) {
            $arr[$key]['date'] = $value['date'];
            $arr[$key]['claimant'] = $value->claimant['first_name'].' '.$value->claimant['last_name'];
            $arr[$key]['barangay'] = $value->claimant['barangay'];
            $arr[$key]['beneficiary'] =  $value->beneficiary['first_name'].' '.$value->beneficiary['last_name'];;
            $arr[$key]['relation'] = $value['relation'];
            $arr[$key]['assistance_type'] = $value['assistance_type'];
            $arr[$key]['amount'] = number_format($value['amount'],2,'.',',');
            $arr[$key]['amount_type'] = $value['amount_type'];
            $arr[$key]['contact'] = $value->claimant['contact'];
            $arr[$key]['worker'] = $value->worker['fullname'];
            $arr[$key]['date_released'] = $value['date_released'];
            $arr[$key]['charges'] = $value['charges'];
            $arr[$key]['remarks'] = $value['remarks'];
        }

        $data_arr = [
            'data' => $arr,
        ];

        $pdf = Pdf::loadView('pdf.aics-form-list', $data_arr);

        return $pdf->stream('aics-form-list.pdf');
    }
    public function render()
    {
        return view('livewire.mswd.aics-print-list');
    }
}
