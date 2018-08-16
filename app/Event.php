<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'user_id', 'description','adress','start_date','end_date','main_pic_name','link'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function eventPicture()
    {
        return $this->hasMany(eventPicture::class);
    }
    
}
