<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
        public function room()
    {
        return $this->belongsTo(Room::class);
    }
        public function buildingEvent()
    {
        return $this->belongsTo(BuildingEvent::class);
    }
}
