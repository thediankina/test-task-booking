<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = [
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param array $options
     * @return string
     */
    public function save(array $options = []) {
        $result = parent::save();
        switch ($result) {
            case 1:
                return 'Success';
                break;
            
            default:
                return 'Error';
                break;
        }
    }
}
