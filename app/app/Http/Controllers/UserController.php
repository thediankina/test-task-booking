<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function booking(Request $request, int $id)
    {
        $params = $request->params;
        $booking = $this->paginate(User::find($id)->booking, $params);
        return response($this->encode($booking));
    }
}
