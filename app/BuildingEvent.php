<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildingEvent extends Model
{
    public function bePicture()
    {
        return $this->hasMany(bePicture::class);
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
