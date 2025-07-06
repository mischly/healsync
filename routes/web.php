<?php

use App\Http\Controllers\AboutController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LayananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.index');
});

FacadesAuth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('artikel', ArtikelController::class);
Route::resource('layanan', LayananController::class);
Route::resource('about', AboutController::class);