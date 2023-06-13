<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assistance extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ['id' => 'integer'];

    const RelationType = [
        'Aunt' => 'Aunt',
        'Brother' => 'Brother',
        'Brother-in-law' => 'Brother-in-law',
        'Common law' => 'Common law',
        'Cousin' => 'Cousin',
        'Daughter' => 'Daughter',
        'Father' => 'Father',
        'Granddaughter' => 'Granddaughter',
        'Grandfather' => 'Grandfather',
        'Grandmother' => 'Grandmother',
        'Grandson' => 'Grandson',
        'Husband' => 'Husband',
        'Mother' => 'Mother',
        'Nephew' => 'Nephew',
        'Next of Kin' => 'Next of Kin',
        'Niece' => 'Niece',
        'Self' => 'Self',
        'Sister' => 'Sister',
        'Sister-in-law' => 'Sister-in-law',
        'Son' => 'Son',
        'Uncle' => 'Uncle',
        'Wife' => 'Wife',
    ];
            ##burial medical education fire transpo house_repair add_capital


    const AssistanceType = [
        'Burial' => 'Burial',
        'Medical' => 'Medical',
        'Educational' => 'Educational',
        'Fire' => 'Fire',
        'Transpo' => 'Transpo',
        'House Repair' => 'House Repair',
        'Add Capital' => 'Add Capital',
    ];

    const AssistanceClass = [
        'aics' => 'aics',
        'referral' => 'referral',
    ];

    const AmountType = [
        'cash' => 'cash',
        'check' => 'check',
        'kind' => 'kind',
    ];

    public function claimant():BelongsTo {return $this->belongsTo(Client::class, 'claimant_id', 'id');}
    public function beneficiary():BelongsTo {return $this->belongsTo(Client::class, 'beneficiary_id', 'id');}
    public function worker():BelongsTo {return $this->belongsTo(User::class, 'worker_id', 'id');}

    public function image_files()
    {
        return $this->hasMany(ImageFile::class, 'imageable_id');
    }

    public function encoderFullname(){
        $user = User::find($this->encoder_id);
        return is_null($user) ? 'Unkown' : $user['fullname'];
    }
}
