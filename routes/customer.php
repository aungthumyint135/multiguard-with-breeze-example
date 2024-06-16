<?php

use App\Http\Controllers\Customer\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Customer\Auth\RegisterCustomerController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:customer')->group(function () {
    Route::get('register', [RegisterCustomerController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisterCustomerController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('signin');
});

Route::middleware('auth:customer')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
