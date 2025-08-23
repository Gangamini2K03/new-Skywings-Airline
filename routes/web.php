<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BillingController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\BillController;

// If you actually use this middleware in settings.php, keep the import;
// otherwise you can remove it.
// use App\Http\Middleware\HandleAppearance;

/*Public pages (no login)*/
Route::redirect('/map', '/contact')->name('map');

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');      // Map is embedded in this view
Route::view('/services', 'services')->name('services');

/*Customer pages (login required)*/
Route::middleware('auth')->group(function () {
    // Make sure these view names match your Blade filenames exactly
    Route::view('/flights', 'flights')->name('flights');   // resources/views/flights.blade.php
    Route::view('/hotels',  'hotel')->name('hotels');      // resources/views/hotel.blade.php
    Route::view('/seats',   'seat')->name('seats');        // resources/views/seat.blade.php
    Route::view('/payment', 'payment')->name('payment');   // resources/views/payment.blade.php

    // Forms
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::post('/hotels',   [HotelController::class,   'store'])->name('hotels.store');
    Route::post('/payment',  [PaymentController::class, 'store'])->name('payment.store');

    // Contact form submit
    Route::post('/contact',  [ContactController::class, 'store'])->name('contact.store');

    // Customer billing (ONE route only)
    Route::get('/billing', [BillingController::class, 'index'])->name('billing.mine');
    // If you prefer the alias:
    // Route::get('/billing', [BillingController::class, 'myBilling'])->name('billing.mine');
});

/*Admin area (login + is_admin)*/
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Admin: users
        Route::get('/users',     [AdminUserController::class, 'index'])->name('users');
        Route::get('/users/{id}',[AdminUserController::class, 'show'])->name('users.show');

        // Admin: bills
        Route::get('/bills', [BillController::class, 'index'])->name('bills');

        // Admin: hotels & contacts
        Route::get('/hotels',   [HotelController::class, 'adminIndex'])->name('hotels');
        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    });

/* Auth & Settings (keep once)*/
require_once __DIR__.'/settings.php';
require_once __DIR__.'/auth.php';
