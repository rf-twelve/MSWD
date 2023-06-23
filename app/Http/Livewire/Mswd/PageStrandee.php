<?php

namespace App\Http\Livewire\Mswd;

use Livewire\Component;

use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\Strandee;
use Livewire\WithFileUploads;

## Manage booklets only(Amounts and payee not necessary)
class PageStrandee extends Component
{
    use WithPerPagePagination, WithBulkActions, WithCachedRows, WithFileUploads;

    public $strandee_id;
    public $date;
    public $name;
    public $address;
    public $age;
    public $birthday;
    public $problem_presented;
    public $intervention;
    public $temp_image;
    public $image;
    public $image_filename;

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

    public function mount(){
        $this->strandee_id = null;
        $this->temp_image = null;
    }

    public function getRowsQueryProperty()
    {
        return Strandee::query()
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
        return view('livewire.mswd.page-strandee',[
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
        $data = Strandee::find($id);
        $this->setFields($data);
        $this->showFormModal = true;
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'date' => 'required',
            'name' => 'required',
            'address' => 'required',
            'age' => 'required',
            'birthday' => 'required',
            'problem_presented' => 'required',
            'intervention' => 'required',
        ]);

        if (isset($this->temp_image)) {
            $filename = $this->temp_image->store('/','images');
        }

        $data = [
            'date' => $valid['date'],
            'name' => $valid['name'],
            'address' => $valid['address'],
            'age' => $valid['age'],
            'birthday' => $valid['birthday'],
            'problem_presented' => $valid['problem_presented'],
            'intervention' => $valid['intervention'],
            'image' => isset($this->temp_image)
                ? $this->temp_image->store('/','images')
                : $this->image_filename,
        ];

        // dd($data);

        isset($this->strandee_id)
            ? Strandee::find($this->strandee_id)->update($data)
            : Strandee::create($data);

        $this->notify('You\'ve save record successfully.');
        $this->resetFields();
        $this->showFormModal = false;
    }

    public function closeRecord()
    {
        $this->showFormModal = false;
        $this->resetFields();

    }

    public function toggleView($id)
    {
        $this->redirect(route('strandee-view',['user_id'=>auth()->user()->id,'id'=>$id]));
    }

    public function toggleDeleteSingleRecordModal($id)
    {
        $this->strandee_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        Strandee::destroy($this->strandee_id);

        $this->showDeleteSingleRecordModal = false;

        $this->resetFields();

        $this->notify('You\'ve deleted record successfully.');
    }

    public function setFields($data)
    {
        $this->strandee_id = $data['id'];
        $this->date = $data['date'];
        $this->name = $data['name'];
        $this->address = $data['address'];
        $this->age = $data['age'];
        $this->birthday = $data['birthday'];
        $this->problem_presented = $data['problem_presented'];
        $this->intervention = $data['intervention'];
        $this->temp_image = null;
        $this->image = $data->imageUrl();
        $this->image_filename = $data['image'];
    }

    public function resetFields()
    {
        $this->strandee_id = null;
        $this->date = '';
        $this->name = '';
        $this->address = '';
        $this->age = '';
        $this->birthday = '';
        $this->problem_presented = '';
        $this->intervention = '';
        $this->temp_image = null;
        $this->image = null;
        $this->image_filename = null;
    }

}
