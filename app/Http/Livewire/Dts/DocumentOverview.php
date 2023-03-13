<?php

namespace App\Http\Livewire\Dts;

use App\Models\AuditTrail;
use App\Models\Doc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DocumentOverview extends Component
{
    public $doc_id;
    public $showDeleteSelectedRecordModal = false;

    public function mount($id){ $this->doc_id = $id; }

    public function deleteSingleRecord()
    {
        Doc::destroy($this->doc_id);

        $this->showDeleteSingleRecordModal = false;

        return redirect()->route('Documents');
    }

    ## Edit Document
    function edit()
    {
        return redirect()->route('Edit Document', ['id' => $this->doc_id]);
    }
     ## Release Document
    function release()
    {
        AuditTrail::create([
            "trail" => 'released',
            "office_id" => Auth::user()->office_id,
            "user_id" => Auth::user()->id,
            "date_time" => date("Y-m-d h:i:s"),
            "start" => null,
            "end" => null,
            "elapse" => '',
            "is_open" => 1,
            "doc_id" => $this->doc_id,
        ]);
        $this->notify('Document released successfully.');
        return redirect()->route('Documents');
    }

     ## Terminal Document
    function receive()
    {


        AuditTrail::create([
            "trail" => 'transit',
            "office_id" => '(N/A)',
            "user_id" => '(N/A)',
            "date_time" => '(N/A)',
            "start" => null,
            "end" => null,
            "elapse" => 'date("Y-m-d h:i:s")',
            "is_open" => 1,
            "doc_id" => $this->doc_id,
        ]);

        AuditTrail::create([
            "trail" => 'received',
            "office_id" => Auth::user()->office_id,
            "user_id" => Auth::user()->id,
            "date_time" => date("Y-m-d h:i:s"),
            "start" => null,
            "end" => null,
            "elapse" => '',
            "is_open" => 1,
            "doc_id" => $this->doc_id,
        ]);
        $this->notify('Document Received successfully.');
        return redirect()->route('Documents');
    }

     ## Terminal Document
    function terminal()
    {
        # code...
    }
     ## Transfer Document
    function transfer()
    {
        # code...
    }
     ## Unlock Document
    function unlock()
    {
        # code...
    }

    public function render()
    {
        return view('livewire.dts.document-overview',[
            'document' => Doc::with('audit_trails', 'action_takens')
                ->where('id',$this->doc_id)
                ->first(),
        ]);
    }
}
