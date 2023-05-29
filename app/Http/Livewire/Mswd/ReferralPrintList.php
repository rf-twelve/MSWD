<?php

namespace App\Http\Livewire\Mswd;

use App\Models\Referral;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class ReferralPrintList extends Component
{
    public function print()
    {
        $model = Referral::get();

        foreach ($model as $key => $value) {
            $arr[$key]['date'] = $value['date'];
            $arr[$key]['client'] = $value->client['first_name'].' '.$value->client['last_name'];
            $arr[$key]['beneficiary'] =  $value->beneficiary['first_name'].' '.$value->beneficiary['last_name'];;
            $arr[$key]['relation'] = $value['relation'];
            $arr[$key]['address'] = $value['address'];
            $arr[$key]['contact'] = $value['contact'];
            $arr[$key]['assistance'] = $value['assistance'];
            $arr[$key]['referral'] = $value['referral'];
            $arr[$key]['welfare_agency'] = $value['welfare_agency'];
            $arr[$key]['remarks'] = $value['remarks'];
            $arr[$key]['worker'] = $value->worker['fullname'];
        }

        $data_arr = [
            'data' => $arr,
        ];

        $pdf = Pdf::loadView('pdf.referral-form-list', $data_arr);

        return $pdf->stream('referral-form-list.pdf');
    }
    public function render()
    {
        return view('livewire.mswd.referral-print-list');
    }
}
