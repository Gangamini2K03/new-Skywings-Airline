@extends('layouts.app')

@section('content')
<div class="container">
    <div class="payment-section">
        <div class="section-header">
            <h2>Complete Your Booking</h2>
            <p>Secure payment with 256-bit SSL encryption</p>
        </div>

        <div class="payment-container">
            <!-- Booking Summary -->
            <div class="booking-summary">
                <div class="summary-header">
                    <h3>Booking Summary</h3>
                    <span>Flight #SW202</span>
                </div>

                <div class="booking-details">
                    <div class="detail-row">
                        <div class="detail-label">Route</div>
                        <div>New York (JFK) to London (LHR)</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Departure</div>
                        <div>July 30, 2025 · 10:30 AM</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Passengers</div>
                        <div>2 Adults, 1 Child</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Class</div>
                        <div>Premium Economy</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Seats</div>
                        <div>14A, 14B, 14C</div>
                    </div>
                </div>

                <div class="price-details">
                    <div class="price-row"><div>Base Fare (x3)</div><div>$1,650.00</div></div>
                    <div class="price-row"><div>Taxes & Fees</div><div>$247.50</div></div>
                    <div class="price-row"><div>Baggage (3x 23kg)</div><div>$75.00</div></div>
                    <div class="price-row"><div>Seat Selection</div><div>$30.00</div></div>
                    <div class="price-row"><div>Travel Insurance</div><div>$45.00</div></div>
                    <div class="total-row"><div>Total Amount</div><div>$2,047.50</div></div>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="payment-form-container">
                <h3 style="margin-bottom: 20px; color: var(--secondary);">Payment Details</h3>
                <div class="form-group">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" id="cardNumber" class="form-control" placeholder="1234 5678 9012 3456" maxlength="19">
                    <div class="card-icons">
                        <div class="card-icon active"><i class="fab fa-cc-visa"></i></div>
                        <div class="card-icon"><i class="fab fa-cc-mastercard"></i></div>
                        <div class="card-icon"><i class="fab fa-cc-amex"></i></div>
                        <div class="card-icon"><i class="fab fa-cc-discover"></i></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cardName">Name on Card</label>
                    <input type="text" id="cardName" class="form-control" placeholder="John Doe">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="expiryDate">Expiry Date</label>
                        <input type="text" id="expiryDate" class="form-control" placeholder="MM/YY">
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" class="form-control" placeholder="123" maxlength="3">
                    </div>
                </div>

                <button class="btn btn-primary">Pay $2,047.50</button>

                <div class="secure-payment">
                    <i class="fas fa-lock"></i>
                    <span>Your payment is secured with 256-bit SSL encryption</span>
                </div>

                <div class="payment-methods">
                    <h4>Other Payment Methods</h4>
                    <div class="methods-grid">
                        <div class="method-card"><i class="fab fa-paypal"></i><span>PayPal</span></div>
                        <div class="method-card"><i class="fab fa-google-pay"></i><span>Google Pay</span></div>
                        <div class="method-card"><i class="fab fa-apple-pay"></i><span>Apple Pay</span></div>
                        <div class="method-card"><i class="fas fa-university"></i><span>Bank Transfer</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const cardNumberInput = document.getElementById('cardNumber');
    cardNumberInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
        e.target.value = value;
    });

    const expiryInput = document.getElementById('expiryDate');
    expiryInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 2) {
            value = value.slice(0, 2) + '/' + value.slice(2);
        }
        if (value.length > 5) {
            value = value.slice(0, 5);
        }
        e.target.value = value;
    });

    const payButton = document.querySelector('.btn-primary');
    payButton.addEventListener('click', function(e) {
        const cardNumber = document.getElementById('cardNumber').value;
        const cardName = document.getElementById('cardName').value;
        const expiry = document.getElementById('expiryDate').value;
        const cvv = document.getElementById('cvv').value;

        if (!cardNumber || !cardName || !expiry || !cvv) {
            alert('Please fill in all payment details');
            return;
        }

        alert('Payment successful! Thank you for booking with Sky Wings Airline.');
    });

    document.querySelectorAll('.method-card').forEach(card => {
        card.addEventListener('click', function() {
            alert(`Selected payment method: ${this.querySelector('span').textContent}`);
        });
    });
</script>
@endsection
