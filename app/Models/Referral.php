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
    public function image_files(){
        return $this->hasMany(ImageFile::class, 'imageable_id');
    }

    public function encoderFullname(){
        $user = User::find($this->encoder_id);
        return is_null($user) ? 'Unkown' : $user['fullname'];
    }

}
