<?php

use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.index');
})->name('page.index');

FacadesAuth::routes();

Route::view('/tentang-kami', 'page.about')->name('page.about');
Route::view('/artikel', 'page.artikel')->name('page.artikel');
Route::view('/layanan', 'page.layanan')->name('page.layanan');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('artikel', ArtikelController::class);
// Route::resource('layanan', LayananController::class);
// Route::resource('about', AboutController::class);
Route::resource('testimoni', ReviewController::class);