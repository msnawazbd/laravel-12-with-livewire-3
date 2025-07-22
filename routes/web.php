<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/counter', [HomeController::class, 'counter'])->name('counter');
Route::get('/product', [HomeController::class, 'product'])->name('product');
