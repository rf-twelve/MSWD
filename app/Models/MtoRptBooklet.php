<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MtoRptBooklet extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ['id' => 'integer'];

    public function users() {return $this->belongsTo(User::class,'user_id','id');}
    public function forms() {return $this->belongsTo(ListForm::class,'form','id');}

}
