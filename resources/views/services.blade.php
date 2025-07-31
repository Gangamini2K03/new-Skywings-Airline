@extends('layouts.app')

@section('content')
<div style="padding: 40px; background: #f8f9fb;">
    <h2 style="text-align: center; font-size: 2.5rem; color: #003366; font-weight: bold;">
        Our Services
    </h2>
    <p style="text-align: center; margin-bottom: 30px; color: #555;">
        Discover the exceptional services that make Sky Wings your preferred airline
    </p>

    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">
        <!-- Flight Booking -->
        <div style="background: #fff; border-radius: 10px; box-shadow: 0 0 10px #ddd; width: 300px; overflow: hidden;">
            <img src="{{ asset('images/flight-booking.jpg') }}" style="width:100%; height:200px; object-fit: cover;" alt="Flight">
            <div style="padding: 20px;">
                <h3 style="color: #003366;">Flight Bookings</h3>
                <p>Book flights to domestic and international destinations with competitive prices and flexible schedules.</p>
            </div>
        </div>

        <!-- Hotel Reservations -->
        <div style="background: #fff; border-radius: 10px; box-shadow: 0 0 10px #ddd; width: 300px; overflow: hidden;">
            <img src="{{ asset('images/hotel.jpg') }}" style="width:100%; height:200px; object-fit: cover;" alt="Hotel">
            <div style="padding: 20px;">
                <h3 style="color: #003366;">Hotel Reservations</h3>
                <p>Find the perfect accommodation for your trip with our wide selection of partner hotels.</p>
            </div>
        </div>

        <!-- Luxury Travel -->
        <div style="background: #fff; border-radius: 10px; box-shadow: 0 0 10px #ddd; width: 300px; overflow: hidden;">
            <img src="{{ asset('images/luxury.jpg') }}" style="width:100%; height:200px; object-fit: cover;" alt="Luxury">
            <div style="padding: 20px;">
                <h3 style="color: #003366;">Luxury Travel</h3>
                <p>Experience premium comfort with business and first-class options designed for discerning travelers.</p>
            </div>
        </div>
    </div>
</div>
@endsection
