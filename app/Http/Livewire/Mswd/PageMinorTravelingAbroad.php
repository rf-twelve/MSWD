<?php

namespace App\Http\Livewire\Mswd;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;

use App\Models\FileImage;
use App\Models\ImageFile;
use App\Models\MinorTravelingAbroad;

class PageMinorTravelingAbroad extends Component
{
    use WithFileUploads, WithPerPagePagination, WithBulkActions, WithCachedRows;

    public $mta_no;
    public $date;
    public $name;
    public $birthdate;
    public $destination;
    public $traveling_companion;
    public $address;
    public $parents;
    public $status;
    public $remarks;

    ## Deafault variable
    public $data_id;
    public $exist_image;
    public $exist_item;
    public $temp_image;
    public $form_type;
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
        $this->data_id = null;
        $this->exist_image = null;
        $this->temp_image = null;
        $this->form_type = 'mta';
    }

    public function getRowsQueryProperty()
    {
        return MinorTravelingAbroad::query()
            ->when($this->filters['search'], fn($query, $search) => $query->where($this->filters['sort-field'], 'like','%'.$search.'%'))
            ->orderBy($this->filters['sort-field'], $this->filters['sort-direction']);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
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
        $data = MinorTravelingAbroad::find($id);
        $this->setFields($data);
        $this->showFormModal = true;
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'mta_no' => 'required',
            'date' => 'required',
            'name' => 'required',
            'birthdate' => 'nullable',
            'destination' => 'required',
            'traveling_companion' => 'required',
            'address' => 'required',
            'parents' => 'required',
            'remarks' => 'nullable',
            'status' => 'nullable',
        ]);

        $valid['mta_no'] = $this->getLatestMtaNo();
        $valid['encoder_id'] = auth()->user()->id;

        if (isset($this->data_id)) {
            $model = MinorTravelingAbroad::find($this->data_id);
            $model->update($valid);
        } else {
            $model = MinorTravelingAbroad::create($valid);
        }

        ## IF IMAGES EXIST
        if (isset($this->temp_image)) {
            foreach ($this->temp_image as $key => $value) {
                $filename = $value->store('/','images');
                $model->file_images()->create([
                    'name' => $filename,
                    'imageable_type' => $this->form_type,
                ]);
            }
        }

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
        return to_route('minor-traveling-abroad-view',['user_id'=>auth()->user()->id, 'id'=> $id]);
    }

    public function toggleDeleteSingleRecordModal($id)
    {
        $this->data_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        MinorTravelingAbroad::destroy($this->data_id);

        $this->showDeleteSingleRecordModal = false;

        $this->resetFields();

        $this->notify('You\'ve deleted record successfully.');
    }

    public function removeImage($id,$key)
    {
        ImageFile::destroy($id);

        $this->exist_image->forget($key);

        $this->notify('You\'ve removed image successfully.');
    }

    public function setFields($data)
    {
        $this->mta_no = $data['mta_no'];
        $this->date = $data['date'];
        $this->name = $data['name'];
        $this->birthdate = $data['birthdate'];
        $this->destination = $data['destination'];
        $this->traveling_companion = $data['traveling_companion'];
        $this->address = $data['address'];
        $this->parents = $data['parents'];
        $this->status = $data['status'];
        $this->remarks = $data['remarks'];

        ## Constant
        $this->data_id = $data['id'];
        $this->exist_item = $data->charge_slip_items;
        // $this->exist_image = $data->file_images->where('imageable_type',$this->form_type);
        $this->temp_image = null;
    }

    public function resetFields()
    {
        $this->mta_no = $this->getLatestMtaNo();
        $this->date = '';
        $this->name = '';
        $this->birthdate = '';
        $this->destination = '';
        $this->traveling_companion = '';
        $this->address = '';
        $this->parents = '';
        $this->status = '';
        $this->remarks = '';
        ## Default
        $this->data_id = null;
        $this->exist_item = null;
        $this->exist_image = null;
        $this->temp_image = null;
    }

    public function render()
    {
        return view('livewire.mswd.page-minor-traveling-abroad',[
            'records' => $this->rows
        ]);
    }

    public function getLatestMtaNo(){
        // return ($this->rows->sortByDesc('aics_no')->first())['aics_no'] + 1;
        $number = MinorTravelingAbroad::select('mta_no')->orderBy('mta_no','desc')->first();
        return is_null($number) ? 1 : $number['mta_no'] + 1;
    }
}
