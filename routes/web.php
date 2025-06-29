<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\OtpVerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function () {
    // TODO: Implement registration logic
    return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
})->name('register.store');

// Forgot Password Routes
Route::get('/forgot-password', function () {
    return view('auth.forgot-password.forgot-password');
})->name('forgot-password');

Route::post('/forgot-password', function () {
    // TODO: Implement OTP sending logic
    return redirect()->route('forgot-password.otp');
})->name('forgot-password.send');

Route::get('/forgot-password/otp', function () {
    return view('auth.forgot-password.otp');
})->name('forgot-password.otp');

Route::get('/forgot-password/new-password', function () {
    return view('auth.forgot-password.new-password');
})->name('forgot-password.new-password');

Route::post('/forgot-password/verify', function () {
    // TODO: Implement OTP verification logic
    return redirect()->route('forgot-password.new-password');
})->name('forgot-password.verify');



// Add this route
Route::get('/home', function () {
    return view('welcome');
})->name('home');

// default route 


Route::get('/', function () {
    return view('welcome');
});