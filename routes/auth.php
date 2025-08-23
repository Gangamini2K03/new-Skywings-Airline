<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// These may or may not exist in your app (Breeze/Jetstream). We’ll add them conditionally.
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;

/*
|--------------------------------------------------------------------------
| Guest routes (not logged in)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login',  [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    // Register
    Route::get('/register',  [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Password reset (only if controllers exist)
    if (class_exists(PasswordResetLinkController::class) && class_exists(NewPasswordController::class)) {
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
    }
});

/*
|--------------------------------------------------------------------------
| Authenticated routes (logged in)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Email verification (only if controllers exist)
    if (class_exists(EmailVerificationPromptController::class)
        && class_exists(VerifyEmailController::class)
        && class_exists(EmailVerificationNotificationController::class)) {

        Route::get('/verify-email', EmailVerificationPromptController::class)->name('verification.notice');

        Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware('throttle:6,1')
            ->name('verification.send');
    }

    // Confirm password (only if controller exists)
    if (class_exists(ConfirmablePasswordController::class)) {
        Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])->middleware('throttle:6,1');
    }

    // Logout (always available when logged in)
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
