<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name', 'description', 'user_id', 'room_id', 'start_date', 'end_date','image', 'link'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
        public function room()
    {
        return $this->belongsTo(Room::class);
    }

}
