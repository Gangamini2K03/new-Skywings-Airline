<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\HotelBooked;

class HotelController extends Controller
{
    public function store(Request $request)
    {
        // Log submitted data
        Log::info('Form data:', $request->all());

        // Validate input
        $request->validate([
            'destination' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'guests_rooms' => 'required|string',
        ]);

        // Save booking
        $booking = Hotel::create([
            'destination' => $request->destination,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guests_rooms' => $request->guests_rooms,
        ]);

        // Send email (NOW inside the method)
        Mail::to('youremail@gmail.com')->send(new HotelBooked($booking));

        return back()->with('success', 'Hotel booked successfully!');
    }
}

class AdminController extends Controller
{
    public function adminIndex()
    {
        $bookings = Hotel::orderBy('created_at', 'desc')->get();
        return view('admin.hotels.index', compact('bookings'));
    }
}
