<?php

namespace App\Http\Livewire\Traits;

trait WithConvertValue
{
    ## CONVERT VALUE NUMERIC VALUE TO QUARTER
    public function convertQuarter($value)
    {
        switch ($value) {
            case 0.25: return 'Q1';
            case 0.50: return 'Q2';
            case 0.75: return 'Q3';
            default: return 'Q4'; break;
        }
    }

    ## CONVERT LABEL NAME FROM YEAR AND QUARTER
    public function convertLabelName($from, $to, $next_pay){
        ## Assume that year a & b are not equal
        if($next_pay['pay_year'] >= $from && $next_pay['pay_year'] <= $to){
            if($next_pay['pay_quarter'] >= 0.25 && $next_pay['pay_quarter'] <= 0.75){
                return $next_pay['pay_year'].' '.$this->convertQuarter($next_pay['pay_quarter']).'-'.$to.' '.$this->convertQuarter(1);;
            }else{
                return $from.'-'.$to;
            }
        }else{
            if($from == $to) { return $from; }
        }

    }
}
