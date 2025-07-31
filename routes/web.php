<?php

use Illuminate\Support\Facades\Route;
/*use App\Http\Controllers\HomeController;*/
/*use Inertia\Inertia;*/



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
    return view('flight');
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




/*
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});*/

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
