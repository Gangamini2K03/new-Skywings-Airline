<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel; //correct way to import the hotel
use Illuminate\Support\Facades\Log; // for logging to the laravel.log
use illuminate\Support\Fascade\Mail;
class HotelController extends Controller
{
    public function store(Request $request)
{
         // Log submitted data to laravel.log
        Log::info('Form data:', $request->all());


$request->validate([
    'destination'=>'required|string',
    'check_in' => 'required|date',
    'check_out' => 'required|date',
    'guests_rooms' => 'required|string', // ✅ Corrected name
]);


    Hotel::create([
        'destination' => $request->destination,
        'check_in' => $request->check_in,
        'check_out' => $request->check_out,
        'guests_rooms' => $request->guests_rooms,
    ]);

    return back()->with('success','Hotel booked succesfully!');

}
}
class AdminController extends Controller{
      public function adminIndex()
    {
        $bookings = Hotel::orderBy('created_at', 'desc')->get();
        return view('admin.hotels.index', compact('bookings'));
    }
}

// send email
Mail::to('youremail@gmail.com')->send(new HotelBooked($booking));