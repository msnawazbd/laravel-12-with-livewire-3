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
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/photo-upload', [HomeController::class, 'photo_upload'])->name('photoUpload');
Route::get('/user', [HomeController::class, 'user'])->name('user');
Route::get('/users', [HomeController::class, 'users'])->name('users');
Route::get('/address', [HomeController::class, 'address'])->name('address');
Route::get('/invoice', [HomeController::class, 'invoice'])->name('invoice');
