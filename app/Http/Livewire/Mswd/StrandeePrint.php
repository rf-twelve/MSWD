<?php

namespace App\Http\Livewire\Mswd;

use App\Models\Strandee;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class StrandeePrint extends Component
{
    public function print($user_id,$id)
    {
        $model = Strandee::find($id);

        $data = [
         'strandee_id' => $model['id'],
         'name' => $model['name'],
         'address' => $model['address'],
         'age' => $model['age'],
         'birthday' => $model['birthday'],
         'problem_presented' => $model['problem_presented'],
         'intervention' => $model['intervention'],
         'image' => $model->imageUrl(),
        ];

        $pdf = Pdf::loadView('pdf.strandee-form', $data);

        return $pdf->stream('strandee-form.pdf');
    }
    public function render()
    {
        return view('livewire.mswd.strandee-print');
    }
}
