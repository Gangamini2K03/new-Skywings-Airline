@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">Hotel Bookings</h2>

    <table class="table-auto w-full border border-collapse border-gray-400">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Destination</th>
                <th class="p-2 border">Check-in</th>
                <th class="p-2 border">Check-out</th>
                <th class="p-2 border">Guests</th>
                <th class="p-2 border">Booked At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td class="p-2 border">{{ $booking->id }}</td>
                <td class="p-2 border">{{ $booking->destination }}</td>
                <td class="p-2 border">{{ $booking->check_in }}</td>
                <td class="p-2 border">{{ $booking->check_out }}</td>
                <td class="p-2 border">{{ $booking->guests_rooms }}</td>
                <td class="p-2 border">{{ $booking->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
