<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param mixed $data
     * @return string
     */
    protected function encode($data)
    {
        return json_encode($data, 256);
    }

    /**
     * @param Collection $collection
     * @param array $params
     * @return mixed
     */
    protected function paginate($collection, $params)
    {
        $partial = $collection
            ->toQuery()
            ->limit($params['limit'])
            ->offset($params['offset'])
            ->get();
        
        return $partial
            ->filter(fn ($booking) => $booking->status == $params['status']);
    }
}
