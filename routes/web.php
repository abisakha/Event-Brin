<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SsoController;
use Illuminate\Support\Facades\Auth;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/auth/sso/redirect', [SsoController::class, 'login'])
->name('sso.redirect');

Route::get('/auth/sso/callback', [SsoController::class, 'callback'])
->name('sso.callback');

// User check
Route::middleware(['auth', 'check.user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('auth.dashboard', [
            'user' => Auth::user(),
        ]);
    })->name('dashboard');
});

Route::post('/logout', [SsoController::class, 'logout'])
->name('logout');