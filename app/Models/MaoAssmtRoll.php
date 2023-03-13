<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaoAssmtRoll extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getBarangayNameAttribute(){
        return (ListBarangay::where('index',$this->assmt_roll_brgy)
            ->first())->name ?? $this->assmt_roll_brgy;
    }

    public function getMunicityNameAttribute(){
        return (ListMunicity::where('index',$this->assmt_roll_municity)
            ->first())->name ?? $this->assmt_roll_municity;
    }

    public function getProvinceNameAttribute(){
        return (ListProvince::where('index',$this->assmt_roll_province)
            ->first())->name ?? $this->assmt_roll_province;
    }
}
