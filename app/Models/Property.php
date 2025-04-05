<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{   
    protected $fillable = ['name', 'description', 'price_per_night'];

    public function bookings(){
        return $this->hasMany(\App\Models\Booking::class);
    }
}
