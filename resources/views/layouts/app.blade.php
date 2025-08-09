<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sky Wings Airlines | Fly with Comfort</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    
    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="logo">
    <img src="https://cdn-icons-png.flaticon.com/512/2972/2972319.png" alt="Sky Wings Logo" width="40">
    <span>Sky Wings</span>
</div>

</head>
<body>
<!--header/Navigation-->
    @include('partials.navbar')
     
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-top">
                <div class="logo">
                    <i class="fas fa-plane"></i>
                    <span>Sky Wings</span>
                </div>
                <ul class="nav-links">
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('flights') }}">Flights</a></li>
                    <li><a href="{{ route('hotels') }}">Hotels</a></li>
                    <li><a href="{{ route('seats') }}">Seats</a></li>
                    <li><a href="{{ route('payment') }}">Payment</a></li>
                    <li><a href="{{ route('map') }}">Map</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    <li><a href="{{ route('admin') }}">Admin</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                </ul>
                <div class="auth-buttons">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Dynamic Page Content -->
     <main>
    @yield('content')
</main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <!-- Footer Columns -->
                <div class="footer-column">
                    <h3>Sky Wings</h3>
                    <p>Your journey begins with us. Experience luxury, comfort, and exceptional service with every flight.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('flights') }}">Book Flights</a></li>
                        <li><a href="{{ route('hotels') }}">Hotel Reservations</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Services</h3>
                    <ul class="footer-links">
                        <li><a href="#">Flight Status</a></li>
                        <li><a href="#">Baggage Information</a></li>
                        <li><a href="#">Special Assistance</a></li>
                        <li><a href="#">Corporate Travel</a></li>
                        <li><a href="#">Charter Flights</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Newsletter</h3>
                    <p>Subscribe to our newsletter for special offers and updates.</p>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; {{ now()->year }} Sky Wings Airlines. All rights reserved.</p>
            </div>
        </div>
    </footer>
     @include('partials.footer')
</body>
@stack('scripts')
</html>
