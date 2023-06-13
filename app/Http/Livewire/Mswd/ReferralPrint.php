<?php

namespace App\Http\Livewire\Mswd;

use App\Models\Referral;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class ReferralPrint extends Component
{
    public function print($user_id,$id)
    {
        $model = Referral::find($id);

        $data = [
'date' => $model['date'],
'client_id' => $model['client_id'],
'beneficiary_id' => $model['beneficiary_id'],
'relation' => $model['relation'],
'address' => $model['address'],
'contact' => $model['contact'],
'assistance' => $model['assistance'],
'referral' => $model['referral'],
'welfare_agency' => $model['welfare_agency'],
'worker_id' => $model['worker_id'],
'remarks' => $model['remarks'],
            'fullname' => $model['first_name'].' '.$model['last_name'],
            'birthdate' => $model['birthdate'],
            'gender' => $model['gender'],
            'photo' => $model->imageUrl(),
            'category' => $model['category'],
            'barangay' => $model['barangay'],
            'contact' => $model['contact'],
        ];

        $pdf = Pdf::loadView('pdf.referral-form', $data);

        return $pdf->stream('referral-form.pdf');
    }

    public function render()
    {
        return view('livewire.mswd.referral-print');
    }
}
