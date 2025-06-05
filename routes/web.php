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

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

// Placeholder for login POST (for later)
Route::post('/login', function () {
   
    return back()->with('error', 'Login functionality not implemented yet');
});

// Placeholder for register POST (for this later)
Route::post('/register', function () {
   
    return back()->with('error', 'Register functionality not implemented yet');
});