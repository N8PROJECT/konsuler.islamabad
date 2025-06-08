<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Forgot Password Routes
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');

Route::post('/forgot-password', function () {

    // For now, redirect to next step or show success message
    return back()->with('success', 'OTP sent to your email address!');
})->name('forgot-password.send');

// Placeholder for login POST (for later)
Route::post('/login', function () {

    return back()->with('error', 'Login functionality not implemented yet');
});

// Placeholder for register POST (for this later)
Route::post('/register', function () {

    return back()->with('error', 'Register functionality not implemented yet');
});
