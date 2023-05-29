<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Client extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ['id' => 'integer'];

    public function imageUrl()
    {
        return $this->photo
            ? Storage::disk('images')->url($this->photo)
            : asset('img/users/avatar.png');
    }

}
