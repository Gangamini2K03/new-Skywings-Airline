<!DOCTYPE html>
<html>
<head>
    <title>Hotel Booking Confirmed</title>
</head>
<body>
    <h2>Your Hotel Booking is Confirmed</h2>
    <p><strong>Destination:</strong> <?php echo e($booking->destination); ?></p>
    <p><strong>Check-in:</strong> <?php echo e($booking->check_in); ?></p>
    <p><strong>Check-out:</strong> <?php echo e($booking->check_out); ?></p>
    <p><strong>Guests & Rooms:</strong> <?php echo e($booking->guests_rooms); ?></p>
</body>
</html>
<?php /**PATH C:\Users\user\Desktop\new_sky_wings_project\resources\views/emails/hotel-booked.blade.php ENDPATH**/ ?>