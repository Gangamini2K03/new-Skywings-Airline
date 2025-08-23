{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sky Wings Airlines | Fly with Comfort</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    {{-- If you have a separate navbar partial that ALSO renders a nav, remove this include to avoid duplicates --}}
   <!-- {{-- @include('partials.navbar') --}}-->

    <!-- Header / Navigation -->
    <header>
        <div class="container">
            <div class="header-top">
                <div class="logo">
                    <img src="{{ asset('images/skywings.jpg') }}" alt="Sky Wings Logo" width="200" height="80">
                    <span>Sky Wings</span>
                </div>

                <ul class="nav-links">
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>

                    <li><a href="{{ route('flights') }}" class="{{ request()->routeIs('flights') ? 'active' : '' }}">Flights</a></li>
                    <li><a href="{{ route('hotels') }}"  class="{{ request()->routeIs('hotels') ? 'active' : '' }}">Hotels</a></li>
                    <li><a href="{{ route('seats') }}"   class="{{ request()->routeIs('seats') ? 'active' : '' }}">Seats</a></li>
                    <li><a href="{{ route('payment') }}" class="{{ request()->routeIs('payment') ? 'active' : '' }}">Payment</a></li>

                    {{-- Map page removed --}}
                    {{-- <li><a href="{{ route('map') }}">Map</a></li> --}}

                    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                    <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a></li>

                    @auth
                        @if(auth()->user()->is_admin)
                            <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.*') ? 'active' : '' }}">Admin</a></li>
                        @endif
                    @endauth
                </ul>

                <div class="auth-buttons">
                    @auth
                        <a href="{{ route('billing.mine') }}" class="btn btn-outline">My Bills</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button class="btn btn-outline" type="submit">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
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
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li><a href="{{ route('billing.mine') }}">My Bills</a></li>
                        @endguest
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
    @stack('scripts')
</body>
</html>
