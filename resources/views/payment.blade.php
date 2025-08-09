@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('payment.store') }}">
        @csrf

        <div class="payment-section">
            <h2 class="title">Complete Your Booking</h2>
            <p class="subtitle">Secure payment with 256-bit SSL encryption</p>

            <label class="section-label">Select Card Type:</label>
            <div class="card-options">
                @php
                    $cards = [
                        'visa.png' => 'Visa',
                        'mastercard.jpeg' => 'MasterCard',
                        'amex.jpg' => 'AmEx',
                        'discover.jpeg' => 'Discover'
                    ];
                @endphp

                @foreach($cards as $file => $label)
                    <label class="card-option">
                        <input type="radio" name="card_type" value="{{ $label }}" required>
                        <img src="{{ asset('images/cards/' . $file) }}" alt="{{ $label }}">
                        <span>{{ $label }}</span>
                    </label>
                @endforeach
            </div>

            <div class="form-group">
                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" name="card_number" placeholder="1234 5678 9012 3456" required>
            </div>

            <div class="form-group">
                <label for="card_holder_name">Name on Card</label>
                <input type="text" id="card_holder_name" name="card_holder_name" placeholder="John Doe" required>
            </div>

            <div class="form-row">
                <div class="form-group half">
                    <label for="expiryDate">Expiry Date</label>
                    <input type="text" id="expiryDate" name="expiry_date" placeholder="MM/YY" required>
                </div>

                <div class="form-group half">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="123" maxlength="3" required>
                </div>
            </div>

            <button type="submit" class="pay-button">Pay $2,047.50</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('cardNumber').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, '');
        e.target.value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
    });

    document.getElementById('expiryDate').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 2) value = value.slice(0, 2) + '/' + value.slice(2);
        e.target.value = value.slice(0, 5);
    });
</script>
@endpush
