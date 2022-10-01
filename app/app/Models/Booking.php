<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = [
        'stayed_on',
        'status',
        'user_id',
    ];

    public $timestamps = false;

    protected $statuses = [
        0 => 'Не подтверждена',
        1 => 'Подтверждена',
    ];

    /**
     * @param int $value
     * @return string
     */
    public function getStatusAttribute($value)
    {
        return $this->statuses[$value];
    }

    /**
     * @param string $value
     * @return void
     */
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = array_search($value, $this->statuses);
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param array $options
     * @return string
     */
    public function save(array $options = [])
    {
        return $this->getReadableBoolean(parent::save());
    }

    /**
     * @return string
     */
    public function delete()
    {
        return $this->getReadableBoolean(parent::delete());
    }

    /**
     * @param int $value
     * @return string
     */
    private function getReadableBoolean($value)
    {
        switch ($value) {
            case 1:
                return 'Success';
                break;
            
            default:
                return 'Error';
                break;
        }
    }
}
