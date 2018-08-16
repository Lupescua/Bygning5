<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bePicture extends Model
{
    public function buildingEvent()
    {
        return $this->belongsTo(BuildingEvent::class);
    }
}
