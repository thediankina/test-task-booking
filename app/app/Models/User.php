<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
