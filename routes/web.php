<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::post('/generate', [BlogController::class, 'generate'])->name('blogs.generate');
