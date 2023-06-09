<?php

namespace App\Http\Livewire\Mswd;

use Livewire\Component;

use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\Client;
use Livewire\WithFileUploads;

## Manage booklets only(Amounts and payee not necessary)
class PageClient extends Component
{
    use WithPerPagePagination, WithBulkActions, WithCachedRows, WithFileUploads;

    ## Client variables
    public $clients = [];
    public $client_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $birthdate;
    public $gender;
    public $photo;
    public $category;
    public $lot_blk_no;
    public $street;
    public $barangay;
    public $contact;
    public $email;
    public $remarks_client;


    ## Modal initialize
    public $showDeleteSingleRecordModal = false;
    public $showFormModal = false;
    public $filters = [
        'search' => '',
        'status' => '',
        'sort-field' => 'last_name',
        'sort-direction' => 'asc',
        'status' => '',
        'amount-min' => null,
        'amount-max' => null,
        'date-min' => null,
        'date-max' => null,
    ];

    public function getRowsQueryProperty()
    {
        return Client::query()
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
        return view('livewire.mswd.page-client',[
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

    public function toggleView($id)
    {
        return to_route('client-view',['user_id'=>auth()->user()->id, 'id'=> $id]);
    }

    public function toggleEditRecordModal($id)
    {
        $data = Client::find($id);
        $this->setFields($data);
        $this->showFormModal = true;
    }

    public function saveRecord()
    {
        $data = [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'photo' => $this->photo,
            'category' => $this->category,
            'lot_blk_no' => $this->lot_blk_no,
            'street' => $this->street,
            'barangay' => $this->barangay,
            'contact' => $this->contact,
            'email' => $this->email,
            'remarks' => $this->remarks_client,
            'is_active' => 1,
            'encoder_id' => auth()->user()->id,
        ];

        isset($this->client_id)
            ? Client::find($this->client_id)->update($data)
            : Client::create($data);

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
        $this->client_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        Client::destroy($this->client_id);

        $this->showDeleteSingleRecordModal = false;

        $this->resetFields();

        $this->notify('You\'ve deleted record successfully.');
    }

    public function setFields($data)
    {
        $this->client_id = $data['id'];
        $this->first_name = $data['first_name'];
        $this->middle_name = $data['middle_name'];
        $this->last_name = $data['last_name'];
        $this->birthdate = $data['birthdate'];
        $this->gender = $data['gender'];
        $this->photo = $data['photo'];
        $this->category = $data['category'];
        $this->lot_blk_no = $data['lot_blk_no'];
        $this->street = $data['street'];
        $this->barangay = $data['barangay'];
        $this->contact = $data['contact'];
        $this->email = $data['email'];
        $this->remarks_client = $data['remarks'];
    }

    public function resetFields()
    {
        $this->client_id = null;
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->birthdate = '';
        $this->gender = '';
        $this->photo = '';
        $this->category = '';
        $this->lot_blk_no = '';
        $this->street = '';
        $this->barangay = '';
        $this->contact = '';
        $this->email = '';
        $this->remarks_client = '';
    }

}
