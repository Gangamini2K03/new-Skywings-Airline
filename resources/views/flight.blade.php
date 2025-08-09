@extends('layouts.app')

@section('content')
<section id="flights" class="flight-booking">
    <div class="container">
        <div class="section-title">
            <h2>Book Your Flight</h2>
            <p>Find the perfect flight for your next journey</p>

            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-2 rounded mt-3">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="booking-container">
            <div class="booking-tabs">
                <div class="tab active" data-trip="Round Trip">Round Trip</div>
                <div class="tab" data-trip="One Way">One Way</div>
                <div class="tab" data-trip="Multi-City">Multi-City</div>
            </div>

            <!-- ✅ FINAL FORM ✅ -->
            <form method="POST" action="{{ route('bookings.store') }}" class="booking-form">
                @csrf
                <input type="hidden" name="trip_type" id="trip_type" value="Round Trip">

                <div class="form-group">
                    <label for="from">From</label>
                    <input type="text" id="from" name="from_city" class="form-control" placeholder="City or Airport" required>
                </div>

                <div class="form-group">
                    <label for="to">To</label>
                    <input type="text" id="to" name="to_city" class="form-control" placeholder="City or Airport" required>
                </div>

                <div class="form-group">
                    <label for="depart">Depart</label>
                    <input type="date" id="depart" name="depart_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="return">Return</label>
                    <input type="date" id="return" name="return_date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="travelers">Travelers</label>
                    <select id="travelers" name="travelers" class="form-control" required>
                        <option value="1 Adult">1 Adult</option>
                        <option value="2 Adults">2 Adults</option>
                        <option value="3 Adults">3 Adults</option>
                        <option value="4 Adults">4 Adults</option>
                        <option value="1 Adult, 1 Child">1 Adult, 1 Child</option>
                        <option value="2 Adults, 1 Child">2 Adults, 1 Child</option>
                        <option value="2 Adults, 2 Children">2 Adults, 2 Children</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="class">Class</label>
                    <select id="class" name="flight_class" class="form-control" required>
                        <option value="Economy">Economy</option>
                        <option value="Premium Economy">Premium Economy</option>
                        <option value="Business">Business</option>
                        <option value="First Class">First Class</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Search Flights</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- ✅ JAVASCRIPT FOR TABS AND DATE -->
<script>
    // Smooth tab switching
    document.querySelectorAll('.tab').forEach(tab => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            document.getElementById('trip_type').value = tab.getAttribute('data-trip');
        });
    });

    // Set today's date as min
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('depart').min = today;
    document.getElementById('return').min = today;
</script>
@endsection
