<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'description', 'floor_nr', 'image', 'adress', 'bookable'
    ];
    
    public function isBookable()
    {
        return true;
    }
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    public function roomPicture()
    {
        return $this->hasMany(roomPicture::class);
    }
  
}
