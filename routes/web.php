<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewApplicationController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/application', [NewApplicationController::class, 'store']);
