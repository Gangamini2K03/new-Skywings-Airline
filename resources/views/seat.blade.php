@extends('layouts.app')

@section('content')
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
                @for ($row = 1; $row <= 5; $row++)
                    <div class="seat-row">
                        <div class="seat {{ $row === 4 ? 'occupied' : '' }}" data-seat="A{{ $row }}">A{{ $row }}</div>
                        <div class="seat" data-seat="B{{ $row }}">B{{ $row }}</div>
                        <div class="aisle"></div>
                        <div class="seat {{ in_array($row, [2,4]) ? 'occupied' : '' }}" data-seat="C{{ $row }}">C{{ $row }}</div>
                        <div class="seat" data-seat="D{{ $row }}">D{{ $row }}</div>
                    </div>
                @endfor
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
@endsection
