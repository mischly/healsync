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

    // Tambahan untuk jadwal
    Route::get('/jadwal', [JadwalPraktekController::class, 'mentorIndex'])->name('jadwal.index');
    Route::post('/jadwal', [JadwalPraktekController::class, 'mentorStore'])->name('jadwal.store');
    Route::delete('/jadwal/{id}', [JadwalPraktekController::class, 'destroy'])->name('jadwal.destroy');
});

// Route untuk menghapus sweet alert dari flash message
Route::post('/clear-flash', function () {
    session()->forget(['success', 'error', 'needLogin']);
    return response()->json(['cleared' => true]);
})->name('flash.clear');


// Route Layanan
Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profil', [Profilecontroller::class, 'index'])->name('user.profile');
    Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::post('/profil/update', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');

    // Password Change
    Route::get('/profil/ubah-password', [ProfileController::class, 'editPassword'])->name('user.password.edit');
    Route::post('/profil/ubah-password', [ProfileController::class, 'updatePassword'])->name('user.password.update');
    
    // Email Change
    Route::get('/profil/ubah-email', [ProfileController::class, 'editEmail'])->name('user.email.edit');
    Route::post('/profil/ubah-email', [ProfileController::class, 'updateEmail'])->name('user.email.update');

    // Booking
    Route::get('/jadwal-tersedia', [JadwalPraktekController::class, 'jadwalTersedia']);
    Route::get('/booking/form/{mentor}', [BookingController::class, 'create'])->name('booking.form');
    Route::get('/booking/selesai/{mentor_id}', [BookingController::class, 'complete'])->name('booking.complete');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/booking/konfirmasi', [BookingController::class, 'konfirmasi'])->name('booking.konfirmasi');

    // Review
    Route::get('/reviews/create/{booking}', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});
