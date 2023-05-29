<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Referral extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ['id' => 'integer'];

    public function client():BelongsTo {return $this->belongsTo(Client::class, 'client_id', 'id');}
    public function beneficiary():BelongsTo {return $this->belongsTo(Client::class, 'beneficiary_id', 'id');}
    public function worker():BelongsTo {return $this->belongsTo(User::class, 'worker_id', 'id');}

}
