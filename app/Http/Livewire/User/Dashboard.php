<?php

namespace App\Http\Livewire\User;

use App\Models\AuditTrail;
use App\Models\Doc;
use DateTimeImmutable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $tn_track = '';
    public $tn_received = '';
    public $tn_released = '';
    public $tn_terminal = '';

    public function create()
    {
        return redirect(route('Create Document',[
            'user_id'=>Auth()->user()->id,
            'tn'=>date('Y-md-hms').'-'.rand(1000,date('Y'))
            ]));
    }

    function receive()
    {
        $document = Doc::with('audit_trails')
        ->where('tn', $this->tn_received)->first();
        if (is_null($document)) {
            dd('Document not found');
        } else {
            $latest_datetime = '';
            if (count($document->audit_trails)) {

                $latest_datetime = $document->audit_trails->last()->date_time;
                $current_datetime = date("Y-m-d h:i:s");
                ## Formula to get elapse time
                $originalTime = new DateTimeImmutable($latest_datetime);
                $targedTime = new DateTimeImmutable($current_datetime);
                $interval = $originalTime->diff($targedTime);
                $interval->format("%a day(s) %H hr(s) %I min(s) %S sec(s) ");

                AuditTrail::create([
                    "trail" => 'transit',
                    "office_id" =>  $document->audit_trails->last()->office_id,
                    "user_id" =>  $document->audit_trails->last()->user_id,
                    "date_time" => $current_datetime,
                    "start" => $latest_datetime,
                    "end" => $current_datetime,
                    "elapse" => $interval->format("%a day(s) %H hr(s) %I min(s) %S sec(s) "),
                    "is_open" => 1,
                    "doc_id" => $document->id,
                ]);

                AuditTrail::create([
                    "trail" => 'received',
                    "office_id" => Auth::user()->office_id,
                    "user_id" => Auth::user()->id,
                    "date_time" => $current_datetime,
                    "start" => null,
                    "end" => null,
                    "elapse" => '',
                    "is_open" => 1,
                    "doc_id" => $document->id,
                ]);
            }

        }

        $this->notify('Document Received successfully.');
        return redirect()->route('Documents');
    }

    public function terminal()
    {
        # code...
    }
    public function render()
    {
        // dd(date("Y-m-d-His") ); // Generate Tracking Number
        return view('livewire.user.dashboard',[
        ]);
    }

    public function logout() {
        auth()->logout(); return redirect('/');
    }
}
