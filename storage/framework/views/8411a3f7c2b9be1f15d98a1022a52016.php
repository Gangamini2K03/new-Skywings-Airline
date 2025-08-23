
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sky Wings Airlines | Fly with Comfort</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    
   <!-- -->

    <!-- Header / Navigation -->
    <header>
        <div class="container">
            <div class="header-top">
                <div class="logo">
                    <img src="<?php echo e(asset('images/skywings.jpg')); ?>" alt="Sky Wings Logo" width="200" height="80">
                    <span>Sky Wings</span>
                </div>

                <ul class="nav-links">
                    <li><a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Home</a></li>
                    <li><a href="<?php echo e(route('about')); ?>" class="<?php echo e(request()->routeIs('about') ? 'active' : ''); ?>">About</a></li>

                    <li><a href="<?php echo e(route('flights')); ?>" class="<?php echo e(request()->routeIs('flights') ? 'active' : ''); ?>">Flights</a></li>
                    <li><a href="<?php echo e(route('hotels')); ?>"  class="<?php echo e(request()->routeIs('hotels') ? 'active' : ''); ?>">Hotels</a></li>
                    <li><a href="<?php echo e(route('seats')); ?>"   class="<?php echo e(request()->routeIs('seats') ? 'active' : ''); ?>">Seats</a></li>
                    <li><a href="<?php echo e(route('payment')); ?>" class="<?php echo e(request()->routeIs('payment') ? 'active' : ''); ?>">Payment</a></li>

                    
                    

                    <li><a href="<?php echo e(route('contact')); ?>" class="<?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>">Contact</a></li>
                    <li><a href="<?php echo e(route('services')); ?>" class="<?php echo e(request()->routeIs('services') ? 'active' : ''); ?>">Services</a></li>

                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->is_admin): ?>
                            <li><a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->routeIs('admin.*') ? 'active' : ''); ?>">Admin</a></li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>

                <div class="auth-buttons">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('billing.mine')); ?>" class="btn btn-outline">My Bills</a>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-outline" type="submit">Logout</button>
                        </form>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-outline">Login</a>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-primary">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
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
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li><a href="<?php echo e(route('about')); ?>">About Us</a></li>
                        <li><a href="<?php echo e(route('flights')); ?>">Book Flights</a></li>
                        <li><a href="<?php echo e(route('hotels')); ?>">Hotel Reservations</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>">Contact Us</a></li>
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo e(route('billing.mine')); ?>">My Bills</a></li>
                        <?php endif; ?>
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
                <p>&copy; <?php echo e(now()->year); ?> Sky Wings Airlines. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\user\Desktop\new_sky_wings_project\resources\views/layouts/app.blade.php ENDPATH**/ ?>