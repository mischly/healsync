<?php

use App\Http\Controllers\PelayananController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\BookingController;
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
Route::get('/booking/{mentor}', [BookingController::class, 'create'])->name('booking.form');
Route::post('/booking/{mentor}', [BookingController::class, 'store'])->name('booking.store');

// Middleware admin

Route::prefix('admin')->name('admin.')->middleware(['auth', RoleMiddleware::class])->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::resource('mentors', MentorController::class);
    Route::resource('users', UserController::class);
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
});

// Route untuk menghapus sweet alert dari flash message

Route::post('/clear-flash', function () {
    session()->forget(['success', 'error', 'needLogin']);
    return response()->json(['cleared' => true]);
})->name('flash.clear');


