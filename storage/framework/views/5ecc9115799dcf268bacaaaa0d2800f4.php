

<?php $__env->startSection('content'); ?>
<section class="seat-selection">
    <div class="container">
        <div class="section-title">
            <h2>Select Your Seat</h2>
            <p>Choose your preferred seat for maximum comfort</p>
        </div>

        <div class="airplane-layout">
            <div class="cockpit"></div>
            <div class="seats-container">
                <!-- Seat Rows -->
                <?php for($row = 1; $row <= 5; $row++): ?>
                    <div class="seat-row">
                        <div class="seat <?php echo e($row === 4 ? 'occupied' : ''); ?>" data-seat="A<?php echo e($row); ?>">A<?php echo e($row); ?></div>
                        <div class="seat" data-seat="B<?php echo e($row); ?>">B<?php echo e($row); ?></div>
                        <div class="aisle"></div>
                        <div class="seat <?php echo e(in_array($row, [2,4]) ? 'occupied' : ''); ?>" data-seat="C<?php echo e($row); ?>">C<?php echo e($row); ?></div>
                        <div class="seat" data-seat="D<?php echo e($row); ?>">D<?php echo e($row); ?></div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <div class="selected-seats">
            <h3>Your Selected Seats: <span id="selected-seats-display">None</span></h3>
            <button class="btn btn-primary">Confirm Selection</button>
        </div>
    </div>
</section>

<script>
    const seats = document.querySelectorAll('.seat:not(.occupied)');
    const selectedDisplay = document.getElementById('selected-seats-display');
    let selected = [];

    seats.forEach(seat => {
        seat.addEventListener('click', () => {
            seat.classList.toggle('selected');
            const seatNum = seat.dataset.seat;

            if (selected.includes(seatNum)) {
                selected = selected.filter(s => s !== seatNum);
            } else {
                selected.push(seatNum);
            }

            selectedDisplay.textContent = selected.length ? selected.join(', ') : 'None';
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\new_sky_wings_project\resources\views/seat.blade.php ENDPATH**/ ?>