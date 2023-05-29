<?php

namespace App\Http\Livewire\Mswd;

use Livewire\Component;

use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\Assistance;
use Livewire\WithFileUploads;

## Manage booklets only(Amounts and payee not necessary)
class AicsList extends Component
{
    use WithPerPagePagination, WithBulkActions, WithCachedRows, WithFileUploads;

    public $assistance_id = null;
    ## Assistance variables
    public $date;
    public $claimant_id;
    public $beneficiary_id;
    public $relation;
    public $assistance_type;
    public $class;
    public $amount;
    public $amount_type;
    public $referral;
    public $welfare_agency;
    public $worker_id;
    public $remarks;

    ## Client variables
    // public $clients = [];
    // public $first_name;
    // public $middle_name;
    // public $last_name;
    // public $birthdate;
    // public $gender;
    // public $photo;
    // public $category;
    // public $lot_blk_no;
    // public $street;
    // public $barangay;
    // public $contact;
    // public $email;
    // public $remarks_client;


    ## Modal initialize
    public $showDeleteSingleRecordModal = false;
    public $showFormModal = false;
    public $filters = [
        'search' => '',
        'status' => '',
        'sort-field' => 'date',
        'sort-direction' => 'asc',
        'status' => '',
        'amount-min' => null,
        'amount-max' => null,
        'date-min' => null,
        'date-max' => null,
    ];

    // public function mount(){
    //     $this->clients = Client::get();
    // }

    public function getRowsQueryProperty()
    {
        return Assistance::query()
            ->with('claimant','beneficiary')
            ->when($this->filters['search'], fn($query, $search) => $query->where($this->filters['sort-field'], 'like','%'.$search.'%'))
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
        return view('livewire.mswd.aics-list',[
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

    public function saveRecord()
    {
        if (isset($this->booklet_id)) {
            Assistance::find($this->assistance_id)->update([
                'date' =>$this->date,
                'claimant_id' =>$this->claimant_id,
                'beneficiary_id' =>$this->beneficiary_id,
                'relation' =>$this->relation,
                'assistance_type' =>$this->assistance_type,
                'amount' =>$this->amount,
                'amount_type' =>$this->amount_type,
                // 'referral' =>$this->referral,
                // 'welfare_agency' =>$this->welfare_agency,
                'worker_id' =>$this->worker_id,
                'is_active' =>$this->is_active,
                'remarks' =>$this->remarks,
            ]);
            $this->notify('You\'ve update record successfully.');
        } else {
            Assistance::create([
                'date' =>$this->date,
                'class' => 'aics',
                'claimant_id' =>$this->claimant_id,
                'beneficiary_id' =>$this->beneficiary_id,
                'relation' =>$this->relation,
                'assistance_type' =>$this->assistance_type,
                'amount' =>$this->amount,
                'amount_type' =>$this->amount_type,
                // 'referral' =>$this->referral,
                // 'welfare_agency' =>$this->welfare_agency,
                'worker_id' =>$this->worker_id,
                'is_active' =>1,
                'remarks' =>$this->remarks,
            ]);
            $this->notify('You\'ve save record successfully.');
        }
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
        $this->date = $data['date'];
        $this->claimant_id = $data['claimant_id'];
        $this->beneficiary_id = $data['beneficiary_id'];
        $this->relation = $data['relation'];
        $this->assistance_type = $data['assistance_type'];
        $this->amount = $data['amount'];
        $this->amount_type = $data['amount_type'];
        $this->referral = $data['referral'];
        $this->welfare_agency = $data['welfare_agency'];
        $this->worker_id = $data['worker_id'];
        $this->remarks = $data['remarks'];
    }

    public function resetFields()
    {
        $this->assistance_id = null;
        $this->date = '';
        $this->claimant_id = '';
        $this->beneficiary_id = '';
        $this->relation = '';
        $this->assistance_type = '';
        $this->amount = '';
        $this->amount_type = '';
        $this->referral = '';
        $this->welfare_agency = '';
        $this->worker_id = '';
        $this->remarks = '';
    }

}
