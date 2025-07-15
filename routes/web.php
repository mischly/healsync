<?php

use App\Http\Controllers\PelayananController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\JadwalPraktekController;
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
Route::view('/review', 'page.review')->name('page.review');

Route::resource('pelayanan', PelayananController::class);

// Middleware admin
Route::prefix('admin')->name('admin.')->middleware(['auth', RoleMiddleware::class])->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::resource('mentors', MentorController::class);
    Route::resource('users', UserController::class);

    Route::resource('jadwal', JadwalPraktekController::class)->except(['show', 'edit', 'update']);
});

// Route untuk menghapus sweet alert dari flash message
Route::post('/clear-flash', function () {
    session()->forget(['success', 'error', 'needLogin']);
    return response()->json(['cleared' => true]);
})->name('flash.clear');


// Route User
Route::middleware(['auth'])->group(function () {
    // Booking
    Route::get('/jadwal-tersedia', [JadwalPraktekController::class, 'jadwalTersedia']);
    Route::get('/booking/form/{mentor}', [BookingController::class, 'create'])->name('booking.form');
    Route::get('/booking/selesai', [BookingController::class, 'complete'])->name('booking.complete');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/booking/konfirmasi', [BookingController::class, 'konfirmasi'])->name('booking.konfirmasi');

    // Review
    Route::resource('reviews', ReviewController::class)->only(['create', 'store']);
});

