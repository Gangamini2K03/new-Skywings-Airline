@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Book Your Flight</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('bookings.store') }}" class="space-y-4">
        @csrf

        <input type="text" name="from_city" placeholder="From City" required class="border rounded p-2 w-full">
        <input type="text" name="to_city" placeholder="To City" required class="border rounded p-2 w-full">

        <input type="date" name="depart_date" required class="border rounded p-2 w-full">
        <input type="date" name="return_date" class="border rounded p-2 w-full">

        <label for="seat_selection">Seat Selection</label>
        <input type="text" name="seat_selection" id="seat_selection">

        <select name="trip_type" required class="border rounded p-2 w-full">
            <option value="">Select Trip Type</option>
            <option value="Round Trip">Round Trip</option>
            <option value="One Way">One Way</option>
            <option value="Multi-City">Multi-City</option>
        </select>

        <select name="travelers" required class="border rounded p-2 w-full">
            <option value="1 Adult">1 Adult</option>
            <option value="2 Adults">2 Adults</option>
            <option value="3+">3+</option>
        </select>

        <select name="flight_class" required class="border rounded p-2 w-full">
            <option value="Economy">Economy</option>
            <option value="Business">Business</option>
            <option value="First Class">First Class</option>
        </select>

        <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded">
            Book Flight
        </button>
    </form>
</div>
@endsection
