<?php

use App\Http\Controllers\AboutController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MentorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.index');
});

FacadesAuth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('artikel', ArtikelController::class);
Route::resource('layanan', LayananController::class);
Route::resource('about', AboutController::class);
Route::resource('testimoni', ReviewController::class);
Route::resource('mentors', MentorController::class);