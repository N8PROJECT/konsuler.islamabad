<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
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

Route::get('/', [PageController::class, 'guest_home'])->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'login_form'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'register_form'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'sendEmail'])->name('forgot-password.send');
Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [PageController::class, 'user_home'])->name('user.home');

    Route::get('/applications', [ApplicationController::class, 'applications'])->name('applications');
    Route::get('/application/{id}', [ApplicationController::class, 'show'])->name('application.show');
    Route::get('/application/{id}/download', [ApplicationController::class, 'download'])->name('application.download');
    Route::get('/application/{application}/edit', [ApplicationController::class, 'edit'])->name('application.edit');
    Route::put('/application/{application}', [ApplicationController::class, 'update'])->name('application.update');
    Route::delete('/application/{application}', [ApplicationController::class, 'destroy'])->name('application.destroy');

    Route::get('/noc/newstudent', [PageController::class, 'newstudent'])->name('noc.newstudent');
    Route::post('/application/store', [ApplicationController::class, 'store'])->name('application.store');

    Route::get('/noc/ibbc', [PageController::class, 'ibbc'])->name('noc.ibbc');

    Route::get('/noc/hec', [PageController::class, 'hec'])->name('noc.hec');

    Route::get('/noc/renewalvisa', [PageController::class, 'renewalvisa'])->name('noc.renewalvisa');
    Route::get('/noc/renewalvisa/student', [PageController::class, 'student'])->name('renewalvisa.student');
    Route::get('/noc/renewalvisa/spouse', [PageController::class, 'spouse'])->name('renewalvisa.spouse');
    Route::get('/noc/renewalvisa/child', [PageController::class, 'child'])->name('renewalvisa.child');

    Route::get('/noc/trip', [PageController::class, 'trip'])->name('noc.trip');
    
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/applications', [AdminController::class, 'index'])->name('admin.applications.index');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/applications/{id}', [AdminController::class, 'show'])->name('admin.application.show');
    Route::post('/applications/{id}/comment', [AdminController::class, 'comment'])->name('admin.application.comment');
    Route::post('/applications/{id}/reject', [AdminController::class, 'reject'])->name('admin.application.reject');
    Route::post('/applications/{id}/approve', [AdminController::class, 'approve'])->name('admin.application.approve');
});