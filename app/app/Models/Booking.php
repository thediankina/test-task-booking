<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'created_at',
        'stopped_on',
        'status',
        'user_id',
    ];

    public $timestamps = false;

    /**
     * @param int $value
     * @return string
     */
    public function getStatusAttribute($value)
    {
        $statuses = [
            0 => 'Не подтверждена',
            1 => 'Подтверждена',
        ];
        return $statuses[$value];
    }
}
