<?php

use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.about.index');
});

FacadesAuth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
