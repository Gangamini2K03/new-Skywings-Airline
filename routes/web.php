<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContactController;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/flights', function () {
    return view('flight'); // ✅ This must match resources/views/flights.blade.php
})->name('flights');

Route::get('/hotels', function () {
    return view('hotel');
})->name('hotels');

Route::get('/seats', function () {
    return view('seat');
})->name('seats');

Route::get('/payment', function () {
    return view('payment');
})->name('payment');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/map', function () {
    return view('map');
})->name('map');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::post('/hotels',[HotelController::class, 'store'])->name('hotels.store');

Route::get('/admin/hotels', [HotelController::class, 'adminIndex'])->name('admin.hotels');

Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts');


// OLD: You had a second form page here
// Route::get('/book-flight', function () {
//     return view('booking');
// });

// ✅ FIXED: Your main form is inside flights.blade.php
// The POST route below is correct and saves data

Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
