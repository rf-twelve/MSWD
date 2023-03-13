<?php

namespace App\Http\Livewire\Mto\Reports;

use Carbon\Carbon;
use Livewire\Component;

class AssessmentRollReport extends Component
{
    public function render()
    {
        return view('livewire.mto.reports.assessment-roll-report');
    }

    public function mount(){
        $get_date = date('Y-m-d',strtotime(Carbon::now()));
        $this->generateAssessmentRoll($get_date);
    }


    public function generateAssessmentRoll($getdate){
        $newAvYear = date('Y',strtotime($getdate));
        $oldAvYear = $newAvYear - 1;
        $getData = $this->assessedValueWithBarangayAndKind();
        $newAV = $getData->where('av_year_from','<=',$newAvYear)
                ->where('av_year_to','>=',$newAvYear);
        $oldAV = $getData->where('av_year_from','<=',$oldAvYear)
                ->where('av_year_to','>=',$oldAvYear);
        $newData = [];
        foreach($newAV as $key => $value){
            $newData[$key] = collect($value)
                ->merge(['old_av' => ($oldAV->where('rpt_account_id',$value->rpt_account_id)
                ->first())->av_value])
                ->toArray();
        }
        $groupByBrgy = collect($newData)->sortBy('rpt_account.lp_brgy')->groupBy('rpt_account.lp_brgy');
        $count = 0;
        foreach($groupByBrgy as $key => $value){
            // dd($value);
            $this->data[$count]['barangay'] = (ListBarangay::where('index',$value->first()['rpt_account']['lp_brgy'])->first())->name;
            $this->data[$count]['code'] = $value->first()['rpt_account']['lp_brgy'];
            $this->data[$count]['land'] = $value->where('rpt_account.rpt_kind','L')->sum('av_value');
            $this->data[$count]['building'] = $value->where('rpt_account.rpt_kind','B')->sum('av_value');
            $this->data[$count]['machineries'] = $value->where('rpt_account.rpt_kind','M')->sum('av_value');
            $this->data[$count]['total_av'] = $value->sum('av_value');
            $this->data[$count]['total_collectibles'] = $this->data[$count]['total_av'] * 0.02;
            $this->data[$count]['total_av_prev'] = $value->sum('old_av');
            $count++;
        }
        $this->total['land'] = collect($this->data)->sum('land');
        $this->total['building'] = collect($this->data)->sum('building');
        $this->total['machineries'] = collect($this->data)->sum('machineries');
        $this->total['total_av'] = collect($this->data)->sum('total_av');
        $this->total['total_collectibles'] = collect($this->data)->sum('total_collectibles');
        $this->total['total_av_prev'] = collect($this->data)->sum('total_av_prev');
        return [
            'assessment_roll_data' => $this->data,
            'assessment_roll_total' => $this->total,
        ];
    }
}
