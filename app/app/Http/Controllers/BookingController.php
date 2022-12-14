<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function all(Request $request)
    {
        $params = $request->params;
        $booking = $this->paginate(Booking::all(), $params);
        return response($this->encode($booking));
    }

    public function view(int $id)
    {
        $booking = Booking::find($id);
        return response($this->encode($booking));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $booking = new Booking($data);
        return response($booking->save());
    }

    public function update(Request $request, int $id) {
        $booking = Booking::find($id);
        $updates = $request->all();
        return response($booking->update($updates));
    }

    public function delete(int $id)
    {
        $booking = Booking::find($id);
        return response($booking->delete());
    }
}
