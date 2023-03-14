<?php

namespace App\Http\Livewire\Mao;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\AuditTrail;
use App\Models\Doc;
use App\Models\MaoAssmtRoll;
use App\Models\MtoRptAccount;
use App\Models\Office;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\SimpleExcel\SimpleExcelReader;

class AssessmentRoll extends Component
{
    use WithPerPagePagination, WithBulkActions, WithCachedRows;


    public $assmt_roll_id = null;
    public $assmt_roll_td_arp_no;
    public $assmt_roll_pin;
    public $assmt_roll_lot_blk_no;
    public $assmt_roll_owner;
    public $assmt_roll_address;
    public $assmt_roll_brgy;
    public $assmt_roll_municity;
    public $assmt_roll_province;
    public $assmt_roll_kind;
    public $assmt_roll_class;
    public $assmt_roll_av;
    public $assmt_roll_effective;
    public $assmt_roll_td_arp_no_prev;
    public $assmt_roll_av_prev;
    public $assmt_roll_remarks;
    public $show_assmt_roll_modal = false;
    public $showDeleteSingleRecordModal = false;

    public $filters = [
        'search' => '',
        'status' => '',
        'sort-field' => 'form',
        'sort-direction' => 'asc',
        'amount-min' => null,
        'amount-max' => null,
        'date-min' => null,
        'date-max' => null,
    ];

    public function mount(){
        $this->filters['sort-direction'] = 'asc';
    }

    protected $queryString = ['sortField','sortDirection'];

    public function sortBy($field){

        if($this->filters['sort-field'] === $field) {
            $this->filters['sort-direction'] = $this->filters['sort-direction'] === 'asc' ? 'desc' : 'asc';
        } else {
            $this->filters['sort-direction'] = 'asc';
        }
        $this->filters['sort-field'] = $field;
    }

    public function toggleCreateAssmtRollModal()
    {
        $this->resetFields();
        $this->show_assmt_roll_modal = true;
    }

    public function toggleEditAssmtRollModal($id)
    {
        $data = MaoAssmtRoll::find($id);
        $this->setFields($data);
        $this->show_assmt_roll_modal = true;
    }

    public function closeAssmtRollForm()
    {
        $this->show_assmt_roll_modal = false;
        $this->resetFields();
    }

    public function saveAssmtRollForm()
    {
        if (isset($this->assmt_roll_id)) {
            MaoAssmtRoll::find($this->assmt_roll_id)->update([
                'assmt_roll_td_arp_no' => $this->assmt_roll_td_arp_no,
                'assmt_roll_pin' => $this->assmt_roll_pin,
                'assmt_roll_lot_blk_no' => $this->assmt_roll_lot_blk_no,
                'assmt_roll_owner' => $this->assmt_roll_owner,
                'assmt_roll_address' => $this->assmt_roll_address,
                'assmt_roll_brgy' => $this->assmt_roll_brgy,
                'assmt_roll_municity' => $this->assmt_roll_municity,
                'assmt_roll_province' => $this->assmt_roll_province,
                'assmt_roll_kind' => $this->assmt_roll_kind,
                'assmt_roll_class' => $this->assmt_roll_class,
                'assmt_roll_av' => $this->assmt_roll_av,
                'assmt_roll_effective' => $this->assmt_roll_effective,
                'assmt_roll_td_arp_no_prev' => $this->assmt_roll_td_arp_no_prev,
                'assmt_roll_av_prev' => $this->assmt_roll_av_prev,
                'assmt_roll_remarks' => $this->assmt_roll_remarks,
            ]);
            $this->notify('You\'ve update record successfully.');
        } else {
            MaoAssmtRoll::create([
                'assmt_roll_td_arp_no' => $this->assmt_roll_td_arp_no,
                'assmt_roll_pin' => $this->assmt_roll_pin,
                'assmt_roll_lot_blk_no' => $this->assmt_roll_lot_blk_no,
                'assmt_roll_owner' => $this->assmt_roll_owner,
                'assmt_roll_address' => $this->assmt_roll_address,
                'assmt_roll_brgy' => $this->assmt_roll_brgy,
                'assmt_roll_municity' => $this->assmt_roll_municity,
                'assmt_roll_province' => $this->assmt_roll_province,
                'assmt_roll_kind' => $this->assmt_roll_kind,
                'assmt_roll_class' => $this->assmt_roll_class,
                'assmt_roll_av' => $this->assmt_roll_av,
                'assmt_roll_effective' => $this->assmt_roll_effective,
                'assmt_roll_td_arp_no_prev' => $this->assmt_roll_td_arp_no_prev,
                'assmt_roll_av_prev' => $this->assmt_roll_av_prev,
                'assmt_roll_remarks' => $this->assmt_roll_remarks,
            ]);
            $this->notify('You\'ve save record successfully.');
        }
        $this->closeAssmtRollForm();
    }

    public function setFields($data)
    {
        $this->assmt_roll_id = $data['id'];
        $this->assmt_roll_td_arp_no = $data['assmt_roll_td_arp_no'];
        $this->assmt_roll_pin = $data['assmt_roll_pin'];
        $this->assmt_roll_lot_blk_no = $data['assmt_roll_lot_blk_no'];
        $this->assmt_roll_owner = $data['assmt_roll_owner'];
        $this->assmt_roll_address = $data['assmt_roll_address'];
        $this->assmt_roll_brgy = $data['assmt_roll_brgy'];
        $this->assmt_roll_municity = $data['assmt_roll_municity'];
        $this->assmt_roll_province = $data['assmt_roll_province'];
        $this->assmt_roll_kind = $data['assmt_roll_kind'];
        $this->assmt_roll_class = $data['assmt_roll_class'];
        $this->assmt_roll_av = $data['assmt_roll_av'];
        $this->assmt_roll_effective = $data['assmt_roll_effective'];
        $this->assmt_roll_td_arp_no_prev = $data['assmt_roll_td_arp_no_prev'];
        $this->assmt_roll_av_prev = $data['assmt_roll_av_prev'];
        $this->assmt_roll_remarks = $data['assmt_roll_remarks'];
    }

    public function resetFields()
    {
        $this->assmt_roll_id = null;
        $this->assmt_roll_td_arp_no = '';
        $this->assmt_roll_pin = '';
        $this->assmt_roll_lot_blk_no = '';
        $this->assmt_roll_owner = '';
        $this->assmt_roll_address = '';
        $this->assmt_roll_brgy = '';
        $this->assmt_roll_municity = '';
        $this->assmt_roll_province = '';
        $this->assmt_roll_kind = '';
        $this->assmt_roll_class = '';
        $this->assmt_roll_av = '';
        $this->assmt_roll_effective = '';
        $this->assmt_roll_td_arp_no_prev = '';
        $this->assmt_roll_av_prev = '';
        $this->assmt_roll_remarks = '';
    }

    public function toggleDeleteSingleRecordModal($id)
    {
        $this->assmt_roll_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        MaoAssmtRoll::destroy($this->assmt_roll_id);

        $this->showDeleteSingleRecordModal = false;

        $this->resetFields();

        $this->notify('You\'ve deleted record successfully.');
    }

    public function print($id)
    {
        $dataArray = array(
            'id' => $id,
            'form' => 'incoming',
        );

        $query = http_build_query(array('aParam' => $dataArray));

        return redirect()->route('PDF', $query);

    }

    public function getRowsQueryProperty()
    {

        return MaoAssmtRoll::query()
            ->when($this->filters['search'], fn($query, $search) => $query->where($this->sortField, 'like','%'.$search.'%'))
            ->orderBy($this->sortField, $this->sortDirection);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function render()
    {
        // dd($this->rows);
        return view('livewire.mao.assessment-roll',[
            'assmt_rolls' => $this->rows,
        ]);
    }
}
