<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;

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

Route::get('/', function () {
    return view('home');
});

// Forgot password routes
Route::get('/patient/forgot-password', function () {
    return view('patient.forgot_password');
});

Route::get('/doctor/forgot-password', function () {
    return view('doctor.forgot_password');
});

Route::get('/therapist/forgot-password', function () {
    return view('therapist.forgot_password');
});

Route::get('/admin/forgot-password', function () {
    return view('admin.forgot_password');
});

// Patient routes
Route::get('/patient/login', function () {
    return view('patient.login');
})->name('patient.login');
Route::post('/patient/login', [PatientController::class, 'login'])->name('patient.login');
Route::get('/patient/register', function () {
    return view('patient.register');
})->name('patient.register');
Route::post('/patient/register', [PatientController::class, 'store'])->name('patient.register');
Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');


// Doctor routes
Route::get('/doctor/login', function () {
    return view('doctor.login');
})->name('doctor.login');
Route::post('/doctor/login', [DoctorController::class, 'login'])->name('doctor.login');
Route::get('/doctor/register', function () {
    return view('doctor.register');
})->name('doctor.register');
Route::post('/doctor/register', [DoctorController::class, 'store'])->name('doctor.register');
Route::get('/doctor/dashboard', [DoctorController::class, 'index'])->name('doctor.dashboard');


// Therapist routes
Route::get('/therapist/login', function () {
    return view('therapist.login');
})->name('therapist.login');
Route::post('/therapist/login', [TherapistController::class, 'login'])->name('therapist.login');
Route::get('/therapist/register', function () {
    return view('therapist.register');
})->name('therapist.register');
Route::post('/therapist/register', [TherapistController::class, 'store'])->name('therapist.register');
Route::get('/therapist/dashboard', [TherapistController::class, 'index'])->name('therapist.dashboard');

// Admin routes
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/register', function () {
    return view('admin.register');
})->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'store'])->name('admin.register');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
