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
Route::get('/post', [HomeController::class, 'post'])->name('post');
Route::get('/posts', [HomeController::class, 'posts'])->name('posts');
Route::get('/review', [HomeController::class, 'review'])->name('review');
Route::get('/calendar', [HomeController::class, 'calendar'])->name('calendar');
Route::get('/users-table', [HomeController::class, 'users_table'])->name('usersTable');
Route::get('/users/show/{id}', [HomeController::class, 'show'])->name('users.show');
Route::get('/drag-and-drop', [HomeController::class, 'drag_and_drop'])->name('dragAndDrop');
Route::get('/form-component', [HomeController::class, 'form_component'])->name('formComponent');
Route::get('/student', [HomeController::class, 'student'])->name('student');
Route::get('/crud', [HomeController::class, 'crud'])->name('crud');
Route::get('/modal-crud', [HomeController::class, 'modal_crud'])->name('modalCrud');
