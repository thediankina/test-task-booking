<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function booking(int $id)
    {
        return response($this->encode(User::find($id)->booking));
    }
}
