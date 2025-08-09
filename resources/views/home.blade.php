@extends('layouts.app')

@section('content')
<section id="home" class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Fly Beyond Imagination</h1>
            <p>Experience luxury and comfort with Sky Wings Airlines. Travel to over 150 destinations worldwide with our award-winning service and state-of-the-art fleet.</p>
            <div class="hero-buttons">
                <a href="#flights" class="btn btn-primary">Book Flight</a>
                <a href="#hotels" class="btn btn-outline">Hotel Reservations</a>
            </div>
        </div>
    </div>
</section>



<section class="services">
    <div class="container">
        <div class="section-title">
            <h2>Our Services</h2>
            <p>Discover the exceptional services that make Sky Wings your preferred airline</p>
        </div>
        <div class="services-grid">
            <!-- Service Cards -->
            <div class="service-card">
                <div class="service-img" style="background-image: url('https://images.unsplash.com/photo-1570125909232-eb263c188f7e?auto=format&fit=crop&w=800&q=80');"></div>
                <div class="service-content">
                    <h3>Flight Bookings</h3>
                    <p>Book flights to domestic and international destinations with competitive prices and flexible schedules.</p>
                </div>
            </div>
            <div class="service-card">
                <div class="service-img" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=80');"></div>
                <div class="service-content">
                    <h3>Hotel Reservations</h3>
                    <p>Find the perfect accommodation for your trip with our wide selection of partner hotels.</p>
                </div>
            </div>
            <div class="service-card">
                <div class="service-img" style="background-image: url('https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?auto=format&fit=crop&w=800&q=80');"></div>
                <div class="service-content">
                    <h3>Luxury Travel</h3>
                    <p>Experience premium comfort with our business and first-class options designed for discerning travelers.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
