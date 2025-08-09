@extends('layouts.app')

@section('content')
<section id="hotels" class="hotel-reservation">
    <div class="container">
        <div class="section-title">
            <h2>Hotel Reservations</h2>
            <p>Find the perfect stay for your journey</p>
        </div>

        <!-- Success message -->
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-3">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search Form -->
        <div class="booking-container">
            <form method="POST" action="{{ route('hotels.store') }}" class="booking-form">
                @csrf

                <div class="form-group">
                    <label for="destination">Destination</label>
                    <input type="text" id="destination" name="destination" class="form-control" placeholder="City or Hotel Name" required>
                </div>

                <div class="form-group">
                    <label for="checkin">Check-in</label>
                    <input type="date" id="checkin" name="check_in" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="checkout">Check-out</label>
                    <input type="date" id="checkout" name="check_out" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="guests">Guests & Rooms</label>
                    <select id="guests" name="guests_rooms" class="form-control" required>
                        <option value="1 Room, 1 Guest">1 Room, 1 Guest</option>
                        <option value="1 Room, 2 Guests">1 Room, 2 Guests</option>
                        <option value="2 Rooms, 2 Guests">2 Rooms, 2 Guests</option>
                        <option value="2 Rooms, 3 Guests">2 Rooms, 3 Guests</option>
                        <option value="2 Rooms, 4 Guests">2 Rooms, 4 Guests</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Find Hotels</button>
                </div>
            </form>
        </div>

        <!-- Hotel Listings -->
        <div class="services-grid" style="margin-top: 50px;">
            <div class="service-card">
                <div class="service-img" style="background-image: url('{{ asset('images/grand.jpg') }}'); background-size: cover;"></div>
                <div class="service-content">
                    <h3>Grand Plaza Hotel</h3>
                    <p>Located in the heart of New York, offering luxury rooms, spa, and 24/7 service.</p>
                    <p><strong>$249/night</strong> &middot; ⭐⭐⭐⭐⭐</p>
                </div>
            </div>

            <div class="service-card">
                <div class="service-img" style="background-image: url('{{ asset('images/skyview.jpg') }}'); background-size: cover;"></div>
                <div class="service-content">
                    <h3>Sky View Resort</h3>
                    <p>Experience tranquility with a mountain view in Tokyo. Includes free breakfast and gym.</p>
                    <p><strong>$315/night</strong> &middot; ⭐⭐⭐⭐⭐</p>
                </div>
            </div>

            <div class="service-card">
                <div class="service-img" style="background-image: url('{{ asset('images/riverside.jpg') }}'); background-size: cover;"></div>
                <div class="service-content">
                    <h3>Riverside Suites</h3>
                    <p>London-based modern suites perfect for business travelers. Easy transport access.</p>
                    <p><strong>$189/night</strong> &middot; ⭐⭐⭐⭐☆</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('checkin').min = today;
    document.getElementById('checkout').min = today;
</script>
@endsection
