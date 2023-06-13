<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImageFile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function imageUrl()
    {
        return $this->image
            ? Storage::disk('images')->url($this->image)
            : asset('img/users/avatar.png');
    }
}
