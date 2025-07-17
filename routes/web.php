<?php

use App\Http\Controllers\PelayananController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\JadwalPraktekController;
use App\Http\Controllers\MentorDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.index');
})->name('page.index');

Auth::routes();

// Page
Route::view('/tentang-kami', 'page.about')->name('page.about');
Route::view('/artikel', 'page.artikel')->name('page.artikel');
Route::view('/layanan', 'page.layanan')->name('page.layanan');
Route::view('/review', 'page.testimoni')->name('page.testimoni');
Route::view('/hubungi-kami', 'user.kontak.index')->name('user.kontak.index');
Route::view('/gabung', 'user.gabung.index')->name('user.gabung.index');

Route::resource('pelayanan', PelayananController::class);

// Middleware admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::resource('mentors', MentorController::class);
    Route::resource('users', UserController::class);
    Route::resource('jadwal', JadwalPraktekController::class)->except(['show', 'edit', 'update']);
});

// Middleware mentor
Route::prefix('mentor')->name('mentor.')->middleware(['auth', 'role:mentor'])->group(function () {
    Route::get('/dashboard', [MentorDashboardController::class, 'index'])->name('dashboard');
    Route::patch('/booking/{booking}/selesaikan', [MentorDashboardController::class, 'selesaikan'])->name('booking.selesai');
});

// Route untuk menghapus sweet alert dari flash message
Route::post('/clear-flash', function () {
    session()->forget(['success', 'error', 'needLogin']);
    return response()->json(['cleared' => true]);
})->name('flash.clear');


// Route Layanan
Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profil', [ProfileController::class, 'index'])->name('user.profile');
    Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::post('/profil/update', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');
});

// Config Untuk Booking
Route::get('/coba-slot', function () {
    return config('slots');
});