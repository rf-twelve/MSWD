<?php

namespace App\Http\Livewire\Mto;
use App\Models\MaoAssmtRoll;
use App\Models\MtoRptAccount;
use Illuminate\Support\Str;

use Livewire\Component;

class LedgerEntry extends Component
{
    public $account_id;
    public $assessment_roll_id;
    public $payment_record_id;
    public $rpt_account;
    public $assessed_values_key = '';
    public $payment_records_key = '';
    public $assessed_values_array = [];
    public $payment_records_array = [];
    public $assessment_roll_array = [];
    public $account_selected;
    public $assessment_roll_selected;
    public $assessment_roll_search = '';
    ## ASSESSMENT ROLL VARIABLES
    // public $assmt_td_arp_no, $assmt_pin, $assmt_owner, $assmt_address, $assmt_lot_blk_no, $assmt_barangay, $assmt_municity, $assmt_province, $assmt_kind, $assmt_class, $assmt_av, $assmt_effectivity, $assmt_prev_td_arp_no, $assmt_prev_av, $assmt_remarks;
    public $rpt_pin, $rpt_kind, $rpt_class, $rpt_td_no, $rpt_arp_no, $ro_name, $ro_address, $assmt_av, $assmt_effective, $assmt_td_arp_no_prev, $assmt_av_prev, $lp_lot_blk_no, $lp_street, $lp_brgy, $lp_municity, $lp_province, $rtdp_td_basic, $rtdp_td_sef, $rtdp_td_penalty, $rtdp_td_total, $rtdp_tc_basic, $rtdp_tc_sef, $rtdp_tc_penalty, $rtdp_tc_total, $rtdp_payment_date, $rtdp_or_no, $rtdp_payment_covered, $rtdp_payment_covered_fr, $rtdp_payment_covered_to, $rtdp_payment_quarter_fr, $rtdp_payment_quarter_to, $rtdp_remarks, $rtdp_directory, $rtdp_payment_start, $rtdp_status;
    public $assmt_roll_td_arp_no,$assmt_roll_pin,$assmt_roll_owner,$assmt_roll_address,$assmt_roll_lot_blk_no,$assmt_roll_brgy,$assmt_roll_municity,$assmt_roll_province,$assmt_roll_kind,$assmt_roll_class,$assmt_roll_av,$assmt_roll_effective,$assmt_roll_td_arp_no_prev,$assmt_roll_av_prev,$assmt_roll_remarks,$assmt_roll_status;
    ## Assessed Value Component
    public $av_year_from, $av_year_to, $av_value;
    ## Pament Record Component
    public $pay_date,$pay_serial_no,$pay_teller,$pay_payee,$pay_fund,$pay_type,$pay_year_from,$pay_year_to,$pay_basic,$pay_sef,$pay_penalty,$pay_quarter_from,$pay_quarter_to,$pay_covered_year,$pay_amount_due,$pay_cash,$pay_change,$pay_directory,$pay_remarks;

    public $account_form_modal = false;
    public $assessed_value_modal = false;
    public $payment_record_modal = false;
    public $showDeleteSelectedRecordModal = false;

    public function UpdatedAssessmentRollSearch(){
        $this->searchAssessmentRoll();
    }

    public function searchAssessmentRoll(){
        $this->assessment_roll_array = MaoAssmtRoll::query()
            ->where('assmt_roll_pin','LIKE','%'.$this->assessment_roll_search.'%')
            ->limit(10)->get();
    }

    public function mount($id)
    {
        $data = MtoRptAccount::with('assessed_values','payment_records')->find($id);
        $assmt_roll = MaoAssmtRoll::where('assmt_roll_pin',$data->rpt_pin)->first();
        $this->account_id = $id;
        $this->assessment_roll_id = $assmt_roll->id ?? '';
        $this->setRptAccount($data);
        $this->setAssessedValues($data);
        $this->setPaymentRecord($data);
        $this->assessment_roll_search = $data->rpt_pin;
        $this->searchAssessmentRoll();
        // $this->setDataToField($id);
    }


    // SET RPT ACCOUNT
    public function setRptAccount($data)
    {
        $this->rpt_pin = $data['rpt_pin'];
        $this->rpt_kind = $data['rpt_kind'];
        $this->rpt_class = $data['rpt_class'];
        $this->rpt_td_no = $data['rpt_td_no'];
        $this->rpt_arp_no = $data['rpt_arp_no'];
        $this->ro_name = $data['ro_name'];
        $this->ro_address = $data['ro_address'];
        $this->lp_lot_blk_no = $data['lp_lot_blk_no'];
        $this->lp_street = $data['lp_street'];
        $this->lp_brgy = $data['lp_brgy'];
        $this->lp_municity = $data['lp_municity'];
        $this->lp_province = $data['lp_province'];
        $this->assmt_av = $data['assmt_av'];
        $this->assmt_effective = $data['assmt_effective'];
        $this->assmt_td_arp_no_prev = $data['assmt_td_arp_no_prev'];
        $this->assmt_av_prev = $data['assmt_av_prev'];
        $this->rtdp_td_basic = $data['rtdp_td_basic'];
        $this->rtdp_td_sef = $data['rtdp_td_sef'];
        $this->rtdp_td_penalty = $data['rtdp_td_penalty'];
        $this->rtdp_td_total = $data['rtdp_td_total'];
        $this->rtdp_tc_basic = $data['rtdp_tc_basic'];
        $this->rtdp_tc_sef = $data['rtdp_tc_sef'];
        $this->rtdp_tc_penalty = $data['rtdp_tc_penalty'];
        $this->rtdp_tc_total = $data['rtdp_tc_total'];
        $this->rtdp_payment_date = $data['rtdp_payment_date'];
        $this->rtdp_or_no = $data['rtdp_or_no'];
        $this->rtdp_payment_covered = $data['rtdp_payment_covered_year'];
        $this->rtdp_payment_covered_fr = $data['rtdp_payment_covered_fr'];
        $this->rtdp_payment_covered_to = $data['rtdp_payment_covered_to'];
        $this->rtdp_payment_quarter_fr = is_null($data['rtdp_payment_quarter_fr']) ? 1 : $data['rtdp_payment_quarter_fr'];
        $this->rtdp_payment_quarter_to = is_null($data['rtdp_payment_quarter_to']) ? 1 : $data['rtdp_payment_quarter_to'];
        $this->rtdp_remarks = $data['rtdp_remarks'];
        $this->rtdp_directory = $data['rtdp_directory'];
        $this->rtdp_payment_start = $data['rtdp_payment_start'];
    }

    public function selectSetAssessmentRoll($ar_array){
        $this->assessment_roll_id = $ar_array['id'] ?? '';
        $this->setAssessmentRoll();
    }

    ## RPT ACCOUNT - edit
    public function editAccountForm()
    {
        $this->account_form_modal = true;
    }

    ## RPT ACCOUNT - close
    public function closeAccountForm()
    {
        $this->account_form_modal = false;
    }

    ## RPT ACCOUNT - close
    public function saveAccountForm()
    {
    MtoRptAccount::find($this->account_id)
        ->update([
            'rpt_pin' => $this->rpt_pin,
            'rpt_kind' => $this->rpt_kind,
            'rpt_class' => $this->rpt_class,
            'rpt_td_no' => $this->rpt_td_no,
            'ro_name' => $this->ro_name,
            'ro_address' => $this->ro_address,
            'lp_lot_blk_no' => $this->lp_lot_blk_no,
            'lp_street' => $this->lp_street,
            'lp_brgy' => $this->lp_brgy,
            'lp_municity' => $this->lp_municity,
            'lp_province' => $this->lp_province,
            'rtdp_payment_date' => $this->rtdp_payment_date,
            'rtdp_or_no' => $this->rtdp_or_no,
            'rtdp_payment_covered_fr' => $this->rtdp_payment_covered_fr,
            'rtdp_payment_quarter_fr' => $this->rtdp_payment_quarter_fr,
            'rtdp_payment_covered_to' => $this->rtdp_payment_covered_to,
            'rtdp_payment_quarter_to' => $this->rtdp_payment_quarter_to,
            'rtdp_directory' => $this->rtdp_directory,
            'rtdp_remarks' => $this->rtdp_remarks,
            'rtdp_payment_start' => $this->rtdp_payment_start,
        ]);
        $this->account_form_modal = false;
        $this->notify('Rpt account updated, Successfully!');
    }

    ## SET ASSESSED VALUES
    public function setAssessedValues($data)
    {
        $av_filtered = collect($data)->only(
            "temp_1957_1966","temp_1967_1973","temp_1974_1979","temp_1980_1984","temp_1985_1993","temp_1994_1996",
            "temp_1997_2002","temp_2003_2018","temp_2019_2019","temp_2020_2020","temp_2021_2021","temp_2022_2022",
        );
        $av_count = 0;
        foreach ($av_filtered as $key => $value) {
            if ($value != '0') {
                $av_data_arr[$av_count]['av_year_from'] = Str::substr($key, -9, 4);
                $av_data_arr[$av_count]['av_year_to'] = Str::substr($key, -4, 4);
                $av_data_arr[$av_count]['av_value'] = $value;
            }
            $av_count++;
        }
        $this->assessed_values_array = $av_data_arr;
    }

    ## SET PAYMENT RECORDS
    public function setPaymentRecord($data)
    {
        for ($i=0; $i < 1; $i++) {
            $this->payment_records_array[$i]['pay_date'] = $data['rtdp_payment_date'];
            $this->payment_records_array[$i]['pay_year_from'] = $data['rtdp_payment_covered_fr'];
            $this->payment_records_array[$i]['pay_year_to'] = $data['rtdp_payment_covered_to'];
            $this->payment_records_array[$i]['pay_quarter_from'] = is_null($data['rtdp_payment_quarter_fr']) ? 1 : $data['rtdp_payment_quarter_fr'];
            $this->payment_records_array[$i]['pay_quarter_to'] = is_null($data['rtdp_payment_quarter_to']) ? 1 : $data['rtdp_payment_quarter_to'];
            $this->payment_records_array[$i]['pay_covered_year'] = $data['rtdp_payment_covered_year'];
            $this->payment_records_array[$i]['pay_basic'] = $data['rtdp_tc_basic'];
            $this->payment_records_array[$i]['pay_sef'] = $data['rtdp_tc_sef'];
            $this->payment_records_array[$i]['pay_penalty'] = $data['rtdp_tc_penalty'];
            $this->payment_records_array[$i]['pay_amount_due'] = $data['rtdp_td_total'] + $data['rtdp_tc_total'];
            $this->payment_records_array[$i]['pay_cash'] = $data['rtdp_td_total'] + $data['rtdp_tc_total'];
            $this->payment_records_array[$i]['pay_change'] = 0;
            $this->payment_records_array[$i]['pay_fund'] = 'general';
            $this->payment_records_array[$i]['pay_type'] = 'cash';
            $this->payment_records_array[$i]['pay_serial_no'] = $data['rtdp_or_no'];
            $this->payment_records_array[$i]['pay_directory'] = $data['rtdp_directory'];
            $this->payment_records_array[$i]['pay_remarks'] = $data['rtdp_remarks'];
            $this->payment_records_array[$i]['pay_teller'] = null;
            $this->payment_records_array[$i]['pay_payee'] = '';
        }
    }

    ## VERIFY AND SAVE RECORD
    public function verifyAndUpdate(){
        $account = MtoRptAccount::find($this->account_id);
        $account->update([
                'rpt_pin' => $this->rpt_pin,
                'rpt_kind' => $this->rpt_kind,
                'rpt_class' => $this->rpt_class,
                'rpt_td_no' => $this->rpt_td_no,
                'rpt_arp_no' => $this->rpt_arp_no,
                'ro_name' => $this->ro_name,
                'ro_address' => $this->ro_address,
                'lp_lot_blk_no' => $this->lp_lot_blk_no,
                'lp_street' => $this->lp_street,
                'lp_brgy' => $this->lp_brgy,
                'lp_municity' => $this->lp_municity,
                'lp_province' => $this->lp_province,
                'assmt_av' => $this->assmt_av,
                'assmt_effective' => $this->assmt_effective,
                'assmt_td_arp_no_prev' => $this->assmt_td_arp_no_prev,
                'assmt_av_prev' => $this->assmt_av_prev,
                'rtdp_td_basic' => $this->rtdp_td_basic,
                'rtdp_td_sef' => $this->rtdp_td_sef,
                'rtdp_td_penalty' => $this->rtdp_td_penalty,
                'rtdp_td_total' => $this->rtdp_td_total,
                'rtdp_tc_basic' => $this->rtdp_tc_basic,
                'rtdp_tc_sef' => $this->rtdp_tc_sef,
                'rtdp_tc_penalty' => $this->rtdp_tc_penalty,
                'rtdp_tc_total' => $this->rtdp_tc_total,
                'rtdp_payment_date' => $this->rtdp_payment_date,
                'rtdp_or_no' => $this->rtdp_or_no,
                'rtdp_payment_covered' => $this->rtdp_payment_covered,
                'rtdp_payment_covered_fr' => $this->rtdp_payment_covered_fr,
                'rtdp_payment_covered_to' => $this->rtdp_payment_covered_to,
                'rtdp_payment_quarter_fr' => $this->rtdp_payment_quarter_fr,
                'rtdp_payment_quarter_to' => $this->rtdp_payment_quarter_to,
                'rtdp_remarks' => $this->rtdp_remarks,
                'rtdp_directory' => $this->rtdp_directory,
                'rtdp_payment_start' => $this->rtdp_payment_start,
                'is_verified' => 1,
            ]);

        ## SAVING ASSESSED VALUES
        $account->assessed_values()->delete();
        foreach ($this->assessed_values_array as $key => $av) {
            $account->assessed_values()->create([
                "av_year_from" => $av['av_year_from'],
                "av_year_to" => $av['av_year_to'],
                "av_value" => $av['av_value'],
            ]);
        }

        ## SAVING PAYMENT RECORDS
        $account->payment_records()->delete();
        foreach ($this->payment_records_array as $key => $pr) {
            $account->payment_records()->create([
                "pay_date" =>$pr['pay_date'],
                "pay_year_from" =>$pr['pay_year_from'],
                "pay_year_to" =>$pr['pay_year_to'],
                "pay_quarter_from" =>$pr['pay_quarter_from'],
                "pay_quarter_to" =>$pr['pay_quarter_to'],
                "pay_covered_year" =>$pr['pay_covered_year'],
                "pay_basic" =>$pr['pay_basic'],
                "pay_sef" =>$pr['pay_sef'],
                "pay_penalty" =>$pr['pay_penalty'],
                "pay_amount_due" =>$pr['pay_amount_due'],
                "pay_cash" =>$pr['pay_cash'],
                "pay_change" =>$pr['pay_change'],
                "pay_fund" =>$pr['pay_fund'],
                "pay_type" =>$pr['pay_type'],
                "pay_serial_no" =>$pr['pay_serial_no'],
                "pay_directory" =>$pr['pay_directory'],
                "pay_remarks" =>$pr['pay_remarks'],
                "pay_teller" =>$pr['pay_teller'],
                "pay_payee" =>$pr['pay_payee'],
            ]);
        }
        $this->notify('Record updated, successfully.');
        return redirect()->route('account-list',['user_id'=>auth()->user()->id]);
    }

    ## ASSESSED VALUES - create
    public function createAssessedValue()
    {
        $this->clearAssessedValueFields();
        $this->assessed_value_modal = true;
    }
    ## ASSESSED VALUES - edit
    public function editAssessedValue($key_selected)
    {
        $this->assessed_values_key = $key_selected;
        foreach ($this->assessed_values_array as $key => $value) {
            if ($key == $key_selected) {
                $this->av_year_from = $value['av_year_from'];
                $this->av_year_to = $value['av_year_to'];
                $this->av_value = $value['av_value'];
            }
        }
        $this->assessed_value_modal = true;
    }
    ## ASSESSED VALUES - delete
    public function deleteAssessedValue($key_selected)
    {
        unset($this->assessed_values_array[$key_selected]);
        $this->notify('Assessed value removed, Successfully!');

    }
    ## ASSESSED VALUES - close
    public function closeAssessedValue()
    {
        $this->clearAssessedValueFields();
        $this->assessed_value_modal = false;
    }
    ## ASSESSED VALUES - clear
    public function clearAssessedValueFields()
    {
        $this->assessed_values_key = '';
        $this->av_year_from = '';
        $this->av_year_to = '';
        $this->av_value = '';
    }
    ## ASSESSED VALUES - save
    public function saveAssessedValue()
    {
        $new_key = ($this->assessed_values_key == '')
            ? array_key_last($this->assessed_values_array) + 1
            : $new_key = $this->assessed_values_key;

        data_set($this->assessed_values_array, $new_key.'.av_year_from',$this->av_year_from);
        data_set($this->assessed_values_array, $new_key.'.av_year_to',$this->av_year_to);
        data_set($this->assessed_values_array, $new_key.'.av_value',$this->av_value);

        $account = MtoRptAccount::find($this->account_id);
        $account->assessed_values()->delete();
        foreach ($this->assessed_values_array as $key => $av) {
            $account->assessed_values()->create([
                "av_year_from" => $av['av_year_from'],
                "av_year_to" => $av['av_year_to'],
                "av_value" => $av['av_value'],
            ]);
        }

        $this->clearAssessedValueFields();
        $this->assessed_value_modal = false;
        $this->notify('Assessed value added, Successfully!');
    }

    ## PAYMENT RECORDS - create
    public function createPaymentRecord()
    {
        $this->clearPaymentRecord();
        $this->payment_record_modal = true;
    }
    ## PAYMENT RECORDS - edit
    public function editPaymentRecord($key_selected)
    {
        $this->payment_records_key = $key_selected;
        foreach ($this->payment_records_array as $key => $value) {
            if ($key == $key_selected) {
                $this->pay_date = $value['pay_date'];
                $this->pay_serial_no = $value['pay_serial_no'];
                $this->pay_teller = $value['pay_teller'];
                $this->pay_payee = $value['pay_payee'];
                $this->pay_fund = $value['pay_fund'];
                $this->pay_type = $value['pay_type'];
                $this->pay_year_from = $value['pay_year_from'];
                $this->pay_year_to = $value['pay_year_to'];
                $this->pay_basic = $value['pay_basic'];
                $this->pay_sef = $value['pay_sef'];
                $this->pay_penalty = $value['pay_penalty'];
                $this->pay_quarter_from = $value['pay_quarter_from'];
                $this->pay_quarter_to = $value['pay_quarter_to'];
                $this->pay_covered_year = $value['pay_covered_year'];
                $this->pay_amount_due = $value['pay_amount_due'];
                $this->pay_cash = $value['pay_cash'];
                $this->pay_change = $value['pay_change'];
                $this->pay_directory = $value['pay_directory'];
                $this->pay_remarks = $value['pay_remarks'];
            }
        }
        $this->payment_record_modal = true;
    }
    ## PAYMENT RECORDS - delete
    public function deletePaymentRecord($key_selected)
    {
        unset($this->payment_records_array[$key_selected]);
        $this->notify('Payment record deleted, Successfully!');
    }
    ## PAYMENT RECORDS - close
    public function closePaymentRecord()
    {
        $this->payment_record_modal = false;
        $this->clearPaymentRecord();
    }
    ## PAYMENT RECORDS - clear
    public function clearPaymentRecord()
    {
        $this->payment_records_key = '';
        $this->pay_date = '';
        $this->pay_serial_no = '';
        $this->pay_teller = '';
        $this->pay_payee = '';
        $this->pay_fund = '';
        $this->pay_type = '';
        $this->pay_year_from = '';
        $this->pay_year_to = '';
        $this->pay_basic = '';
        $this->pay_sef = '';
        $this->pay_penalty = '';
        $this->pay_quarter_from = '';
        $this->pay_quarter_to = '';
        $this->pay_covered_year = '';
        $this->pay_amount_due = '';
        $this->pay_cash = '';
        $this->pay_change = '';
        $this->pay_directory = '';
        $this->pay_remarks = '';
    }
    ## PAYMENT RECORDS - save

    public function savePaymentRecord()
    {
        $new_key = ($this->payment_records_key == '')
        ? array_key_last($this->payment_records_array) + 1
        : $new_key = $this->payment_records_key;

        data_set($this->payment_records_array, $new_key.'.pay_date',$this->pay_date);
        data_set($this->payment_records_array, $new_key.'.pay_serial_no',$this->pay_serial_no);
        data_set($this->payment_records_array, $new_key.'.pay_teller',$this->pay_teller);
        data_set($this->payment_records_array, $new_key.'.pay_payee',$this->pay_payee);
        data_set($this->payment_records_array, $new_key.'.pay_fund',$this->pay_fund);
        data_set($this->payment_records_array, $new_key.'.pay_type',$this->pay_type);
        data_set($this->payment_records_array, $new_key.'.pay_year_from',$this->pay_year_from);
        data_set($this->payment_records_array, $new_key.'.pay_year_to',$this->pay_year_to);
        data_set($this->payment_records_array, $new_key.'.pay_basic',$this->pay_basic);
        data_set($this->payment_records_array, $new_key.'.pay_sef',$this->pay_sef);
        data_set($this->payment_records_array, $new_key.'.pay_penalty',$this->pay_penalty);
        data_set($this->payment_records_array, $new_key.'.pay_quarter_from',$this->pay_quarter_from);
        data_set($this->payment_records_array, $new_key.'.pay_quarter_to',$this->pay_quarter_to);
        data_set($this->payment_records_array, $new_key.'.pay_covered_year',$this->pay_covered_year);
        data_set($this->payment_records_array, $new_key.'.pay_amount_due',$this->pay_amount_due);
        data_set($this->payment_records_array, $new_key.'.pay_cash',$this->pay_cash);
        data_set($this->payment_records_array, $new_key.'.pay_change',$this->pay_change);
        data_set($this->payment_records_array, $new_key.'.pay_directory',$this->pay_directory);
        data_set($this->payment_records_array, $new_key.'.pay_remarks',$this->pay_remarks);

        $account = MtoRptAccount::find($this->account_id);
        $account->payment_records()->delete();
        foreach ($this->payment_records_array as $key => $pr) {
            $account->payment_records()->create([
                "pay_date" =>$pr['pay_date'],
                "pay_year_from" =>$pr['pay_year_from'],
                "pay_year_to" =>$pr['pay_year_to'],
                "pay_quarter_from" =>$pr['pay_quarter_from'],
                "pay_quarter_to" =>$pr['pay_quarter_to'],
                "pay_covered_year" =>$pr['pay_covered_year'],
                "pay_basic" =>$pr['pay_basic'],
                "pay_sef" =>$pr['pay_sef'],
                "pay_penalty" =>$pr['pay_penalty'],
                "pay_amount_due" =>$pr['pay_amount_due'],
                "pay_cash" =>$pr['pay_cash'],
                "pay_change" =>$pr['pay_change'],
                "pay_fund" =>$pr['pay_fund'],
                "pay_type" =>$pr['pay_type'],
                "pay_serial_no" =>$pr['pay_serial_no'],
                "pay_directory" =>$pr['pay_directory'],
                "pay_remarks" =>$pr['pay_remarks'],
                "pay_teller" =>$pr['pay_teller'],
                "pay_payee" =>$pr['pay_payee'],
            ]);
        }

        $this->payment_record_modal = false;
        $this->clearPaymentRecord();
        $this->notify('Payment record added, Successfully!');

    }

    public function render()
    {
        return view('livewire.mto.ledger-entry',[
            // 'document' => MtoRptAccount::with('assessed_values', 'payment_records')
            //     ->where('id',$this->account_id)
            //     ->first(),
        ]);
    }
}
