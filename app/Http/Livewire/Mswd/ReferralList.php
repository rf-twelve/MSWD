<?php

namespace App\Http\Livewire\Mswd;

use Livewire\Component;

use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\Client;
use App\Models\Referral;
use App\Models\User;
use Livewire\WithFileUploads;

## Manage booklets only(Amounts and payee not necessary)
class ReferralList extends Component
{
    use WithPerPagePagination, WithBulkActions, WithCachedRows, WithFileUploads;

    public $referral_id = null;
    public $date;
    public $client_id;
    public $beneficiary_id;
    public $relation;
    public $address;
    public $contact;
    public $assistance;
    public $referral;
    public $welfare_agency;
    public $worker_id;
    public $remarks;
    public $clients;
    public $workers;

    ## Modal initialize
    public $showDeleteSingleRecordModal = false;
    public $showFormModal = false;
    public $filters = [
        'search' => '',
        'status' => '',
        'sort-field' => 'id',
        'sort-direction' => 'asc',
        'status' => '',
        'amount-min' => null,
        'amount-max' => null,
        'date-min' => null,
        'date-max' => null,
    ];

    public function mount(){
        $this->referral_id = null;
        $this->clients = Client::get();
        $this->workers = User::get();
    }

    public function getRowsQueryProperty()
    {
        return Referral::query()
            ->with('client','beneficiary','worker')
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
        return view('livewire.mswd.referral-list',[
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
        $data = Referral::find($id);
        $this->setFields($data);
        $this->showFormModal = true;
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'date' => 'required',
            'client_id' => 'required',
            'beneficiary_id' => 'required',
            'relation' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'assistance' => 'required',
            'referral' => 'required',
            'welfare_agency' => 'required',
            'remarks' => 'nullable',
            'worker_id' => 'required',
        ]);

        isset($this->referral_id)
            ? Referral::find($this->referral_id)->update($valid)
            : Referral::create($valid);

        $this->notify('You\'ve save record successfully.');
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
        $this->referral_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        Referral::destroy($this->referral_id);

        $this->showDeleteSingleRecordModal = false;

        $this->resetFields();

        $this->notify('You\'ve deleted record successfully.');
    }

    public function setFields($data)
    {
        $this->referral_id = $data['id'];
        $this->date = $data['date'];
        $this->client_id = $data['client_id'];
        $this->beneficiary_id = $data['beneficiary_id'];
        $this->relation = $data['relation'];
        $this->address = $data['address'];
        $this->contact = $data['contact'];
        $this->assistance = $data['assistance'];
        $this->referral = $data['referral'];
        $this->welfare_agency = $data['welfare_agency'];
        $this->worker_id = $data['worker_id'];
    }

    public function resetFields()
    {
        $this->referral_id  = null;
        $this->date  = '';
        $this->client_id  = '';
        $this->beneficiary_id  = '';
        $this->relation  = '';
        $this->address  = '';
        $this->contact  = '';
        $this->assistance  = '';
        $this->referral  = '';
        $this->welfare_agency  = '';
        $this->worker_id  = '';
    }

}
