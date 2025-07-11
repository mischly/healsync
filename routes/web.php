<?php

use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.index');
});

FacadesAuth::routes();

Route::view('/tentang-kami', 'page.about')->name('page.about');
Route::view('/artikel', 'page.artikel')->name('page.artikel');
Route::view('/layanan', 'page.layanan')->name('page.layanan');

Route::resource('mentors', MentorController::class);

Route::get('/booking', [BookingController::class, 'create'])->name('booking.form');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('artikel', ArtikelController::class);
// Route::resource('layanan', LayananController::class);
// Route::resource('about', AboutController::class);
// Route::resource('testimoni', ReviewController::class);
