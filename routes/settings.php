<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HandleAppearance;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController;

// All settings routes require login
Route::middleware(['auth'])->group(function () {
    // /settings → /settings/profile
    Route::redirect('/settings', '/settings/profile');

    // Profile
    Route::get('/settings/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/settings/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/settings/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Password
    Route::get('/settings/password', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('/settings/password', [PasswordController::class, 'update'])
        ->middleware('throttle:6,1')
        ->name('password.update');

    // Appearance (Blade view to avoid Inertia)
    Route::get('/settings/appearance', function () {
        return view('settings.appearance'); // resources/views/settings/appearance.blade.php
    })->name('appearance');

    // Settings index (NO controller) — use Blade view and HandleAppearance middleware directly
    Route::view('/settings', 'settings.index')
        ->middleware(HandleAppearance::class)
        ->name('settings');
});
