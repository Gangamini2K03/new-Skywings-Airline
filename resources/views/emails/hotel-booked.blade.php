<!DOCTYPE html>
<html>
<head>
    <title>Hotel Booking Confirmed</title>
</head>
<body>
    <h2>Your Hotel Booking is Confirmed</h2>
    <p><strong>Destination:</strong> {{ $booking->destination }}</p>
    <p><strong>Check-in:</strong> {{ $booking->check_in }}</p>
    <p><strong>Check-out:</strong> {{ $booking->check_out }}</p>
    <p><strong>Guests & Rooms:</strong> {{ $booking->guests_rooms }}</p>
</body>
</html>
