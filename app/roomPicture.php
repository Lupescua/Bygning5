<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomPicture extends Model
{
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
