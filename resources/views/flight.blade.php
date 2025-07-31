@extends('layouts.app')

@section('content')
<section id="flights" class="flight-booking">
    <div class="container">
        <div class="section-title">
            <h2>Book Your Flight</h2>
            <p>Find the perfect flight for your next journey</p>
        </div>
        <div class="booking-container">
            <div class="booking-tabs">
                <div class="tab active">Round Trip</div>
                <div class="tab">One Way</div>
                <div class="tab">Multi-City</div>
            </div>
            <form class="booking-form">
                <div class="form-group">
                    <label for="from">From</label>
                    <input type="text" id="from" class="form-control" placeholder="City or Airport">
                </div>
                <div class="form-group">
                    <label for="to">To</label>
                    <input type="text" id="to" class="form-control" placeholder="City or Airport">
                </div>
                <div class="form-group">
                    <label for="depart">Depart</label>
                    <input type="date" id="depart" class="form-control">
                </div>
                <div class="form-group">
                    <label for="return">Return</label>
                    <input type="date" id="return" class="form-control">
                </div>
                <div class="form-group">
                    <label for="travelers">Travelers</label>
                    <select id="travelers" class="form-control">
                        <option>1 Adult</option>
                        <option>2 Adults</option>
                        <option>3 Adults</option>
                        <option>4 Adults</option>
                        <option>1 Adult, 1 Child</option>
                        <option>2 Adults, 1 Child</option>
                        <option>2 Adults, 2 Children</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="class">Class</label>
                    <select id="class" class="form-control">
                        <option>Economy</option>
                        <option>Premium Economy</option>
                        <option>Business</option>
                        <option>First Class</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Search Flights</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // Enable smooth tab switching (no actual logic, just visual)
    document.querySelectorAll('.tab').forEach(tab => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
        });
    });

    // Set min date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('depart').min = today;
    document.getElementById('return').min = today;
</script>
@endsection
