<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Optional: return a list of bookings
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Optional: return a form view for creating a booking
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'from_city' => 'required',
            'to_city' => 'required',
            'depart_date' => 'required|date',
            'return_date' => 'nullable|date',
            'seat_selection' => 'nullable|string', // ✅ Fixed: added missing comma
            'trip_type' => 'required',
            'travelers' => 'required',
            'flight_class' => 'required',
        ]);

        Booking::create($request->all());

        return redirect()->route('flights')->with('success', 'Flight booked successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        // Optional: show a single booking
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        // Optional: edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        // Optional: handle update logic
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        // Optional: handle delete
    }
}
