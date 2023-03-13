<?php

namespace App\Http\Livewire\Dts;

use App\Models\ActionTaken;
use App\Models\AuditTrail;
use App\Models\Doc;
use DateTimeImmutable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DocumentEdit extends Component
{
    public $doc_id;
    public Doc $editing;
    public $action_taken = [
        'office_id' => '',
        'action' => '',
        'remarks' => '',
    ];
    public $is_draft = true;

    public function rules() { return [
        'editing.tn' => 'required',
        'editing.date' => 'required',
        'editing.received_by' => 'required',
        'editing.title' => 'nullable',
        'editing.origin' => 'nullable',
        'editing.nature' => 'nullable',
        'editing.class' => 'required',
        'editing.for' => 'required',
        'editing.remarks' => 'nullable',
        'editing.created_by' => 'nullable',
        'editing.updated_by' => 'nullable',
    ]; }

    public function mount($id){
         $this->doc_id = $id;
         ## Find and get the data
         $getData = Doc::find($id);
         ## Set data to variables
         $this->editing = $getData;
    }


    public function save()
    {
        $this->validate();
        if($this->is_draft){
            if(empty($this->editing['title'])){$this->editing['title'] = '(Empty Field)';}
            if(empty($this->editing['origin'])){$this->editing['origin'] = '(Empty Field)';}
            if(empty($this->editing['nature'])){$this->editing['nature'] = '(Empty Field)';}
            $this->editing['is_draft'] = 1;
            $this->editing->save();
            $this->notify('Record saved successfully.');
            return redirect()->route('Documents');
        }else{
            $this->validate([
                'action_taken.office_id' => 'required',
                'action_taken.action' => 'required',
                'action_taken.remarks' => 'nullable',
            ]);
            $action_taken = new ActionTaken([
                "office_id" => $this->action_taken['office_id'],
                "action" => $this->action_taken['action'],
                "remarks" => $this->action_taken['remarks'],
                "user_id" => Auth::user()->id,
            ]);
            ## Formula to get elapse time
            // $originalTime = new DateTimeImmutable($this->editing->created_at);
            // $targedTime = new DateTimeImmutable(date("Y-m-d h:i:s"));
            // $interval = $originalTime->diff($targedTime);
            // $interval->format("%a day(s) %H hr(s) %I min(s) %S sec(s) ");
            ## Setting data to audit trail
            $audit_trail = new AuditTrail([
                "trail" => 'origin',
                "office_id" => Auth::user()->office_id,
                "user_id" => Auth::user()->id,
                "date_time" => date("Y-m-d h:i:s"),
                "start" => null,
                "end" => null,
                "elapse" => '',
                "is_open" => 1,
            ]);
            ## Saving thru relationship
            $this->editing->action_takens()->save($action_taken);
            $this->editing->audit_trails()->save($audit_trail);
            $this->notify('Record saved successfully.');
            return redirect()->route('Documents');
        }
    }

    public function render()
    {
        return view('livewire.dts.document-edit');
    }
}
