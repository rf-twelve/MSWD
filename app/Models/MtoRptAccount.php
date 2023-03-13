<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MtoRptAccount extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ['id' => 'integer'];

    public function assessed_values() {return $this->hasMany(MtoRptAssessedValue::class);}

    public function payment_records() {return $this->hasMany(MtoRptPaymentRecord::class);}

}
