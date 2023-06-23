<?php

namespace App\Http\Livewire\Mswd;

use Livewire\Component;

use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\Assistance;
use App\Models\Client;
use App\Models\User;
use Livewire\WithFileUploads;

## Manage booklets only(Amounts and payee not necessary)
class PageAics extends Component
{
    use WithPerPagePagination, WithBulkActions, WithCachedRows, WithFileUploads;

    public $assistance_id = null;
    ## Assistance variables
    public $aics_no;
    public $date;
    public $claimant_id;
    public $beneficiary_id;
    public $relation;
    public $assistance_type;
    public $amount;
    public $amount_type;
    public $worker_id;
    public $prepared_by;
    public $remarks;
    public $clients;
    public $date_release;
    public $charges;
    public $users;

    ## Modal initialize
    public $showDeleteSingleRecordModal = false;
    public $showFormModal = false;
    public $filters = [
        'search' => '',
        'status' => '',
        'sort-field' => 'aics_no',
        'sort-direction' => 'asc',
        'per-page' => '10',
        'status' => '',
        'amount-min' => null,
        'amount-max' => null,
        'date-min' => null,
        'date-max' => null,
    ];
    public $claimant = [
        'first_name' => '',
        'last_name' => '',
    ];
    public $beneficiary = [
        'first_name' => '',
        'last_name' => '',
    ];

    public function mount(){
        $this->clients = Client::select('id','first_name','last_name')->get();
        $this->users = User::select('id','fullname')->get();
    }

    public function getRowsQueryProperty()
    {
        return Assistance::query()
            ->when($this->filters['search'], fn($query, $search) => $query->where($this->filters['sort-field'], 'like','%'.$search.'%'))
            ->whereHas('claimant', function($q){
                $q->where('first_name', 'like','%'.$this->claimant['first_name'].'%');
            })
            ->whereHas('claimant', function($q){
                $q->where('last_name', 'like','%'.$this->claimant['last_name'].'%');
            })
            ->whereHas('beneficiary', function($q){
                $q->where('first_name', 'like','%'.$this->beneficiary['first_name'].'%');
            })
            ->whereHas('beneficiary', function($q){
                $q->where('last_name', 'like','%'.$this->beneficiary['last_name'].'%');
            })
            // ->with('claimant','beneficiary')
            ->orderBy($this->filters['sort-field'], $this->filters['sort-direction']);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }


    public function render()
    {
        return view('livewire.mswd.page-aics',[
            'records' => $this->rows
        ]);
    }

    public function sortBy($field){

        if($this->filters['sort-field'] === $field) {
            $this->filters['sort-by'] = $this->filters['sort-by'] === 'asc' ? 'desc' : 'asc';
        } else {
            $this->filters['sort-by'] = 'asc';
        }
        $this->filters['sort-field'] = $field;
    }

    public function toggleCreateRecordModal()
    {
        $this->resetFields();
        $this->showFormModal = true;
    }

    public function toggleEditRecordModal($id)
    {
        $data = Assistance::find($id);
        $this->setFields($data);
        $this->showFormModal = true;
    }

    public function toggleView($id)
    {
        return to_route('aics-view',['user_id'=>auth()->user()->id, 'id'=> $id]);
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'date' => 'required',
            'claimant_id' => 'required',
            'beneficiary_id' => 'required',
            'relation' => 'required',
            'assistance_type' => 'required',
            'amount' => 'nullable',
            'amount_type' => 'nullable',
            'worker_id' => 'required',
            'date_release' => 'nullable',
            'charges' => 'nullable',
            'remarks' => 'nullable',
        ]);
        $valid['aics_no'] = $this->getLatestAicsNo();
        $valid['encoder_id'] = auth()->user()->id;

        isset($this->booklet_id)
            ? Assistance::find($this->assistance_id)->update($valid)
            : Assistance::create($valid);

        $this->notify('You\'ve save record successfully.');
        // $this->rows->refresh();
        $this->resetFields();
        $this->showFormModal = false;
    }

    public function closeRecord()
    {
        $this->showFormModal = false;
        $this->resetFields();

    }

    public function toggleDeleteSingleRecordModal($id)
    {
        $this->assistance_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        Assistance::destroy($this->assistance_id);

        $this->showDeleteSingleRecordModal = false;

        $this->resetFields();

        $this->notify('You\'ve deleted record successfully.');
    }

    public function setFields($data)
    {
        $this->assistance_id = $data['id'];
        $this->aics_no = $data['aics_no'];
        $this->date = $data['date'];
        $this->claimant_id = $data['claimant_id'];
        $this->beneficiary_id = $data['beneficiary_id'];
        $this->relation = $data['relation'];
        $this->assistance_type = $data['assistance_type'];
        $this->amount = $data['amount'];
        $this->amount_type = $data['amount_type'];
        $this->worker_id = $data['worker_id'];
        $this->prepared_by = $data['prepared_by'];
        $this->date_release = $data['date_release'];
        $this->charges = $data['charges'];
        $this->remarks = $data['remarks'];
    }

    public function resetFields()
    {
        $this->assistance_id = null;
        $this->aics_no = $this->getLatestAicsNo();
        $this->date = '';
        $this->claimant_id = '';
        $this->beneficiary_id = '';
        $this->relation = '';
        $this->assistance_type = '';
        $this->amount = '';
        $this->amount_type = '';
        $this->worker_id = '';
        $this->prepared_by = '';
        $this->date_release = '';
        $this->charges = '';
        $this->remarks = '';
    }

    public function getLatestAicsNo(){
        // return ($this->rows->sortByDesc('aics_no')->first())['aics_no'] + 1;
        $number = Assistance::orderBy('aics_no','desc')->first();
        return is_null($number['aics_no']) ? 1 : $number['aics_no'] + 1;
    }

}
