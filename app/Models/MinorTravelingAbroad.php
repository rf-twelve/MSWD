<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MinorTravelingAbroad extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function image_files(){
        return $this->hasMany(ImageFile::class, 'imageable_id');
    }

    public function imageUrl()
    {
        return $this->image
            ? Storage::disk('images')->url($this->image)
            : asset('img/users/avatar.png');
    }

    public function encoderFullname(){
        $user = User::find($this->encoder_id);
        return is_null($user) ? 'Unkown' : $user['fullname'];
    }
}
