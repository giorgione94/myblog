<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\BlogController::class, 'posts']);
Route::get('/author/{author}', [App\Http\Controllers\BlogController::class, 'author']);
Route::get('/category/{category}', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
