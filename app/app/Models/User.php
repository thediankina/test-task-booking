<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
