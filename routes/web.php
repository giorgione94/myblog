<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/', [App\Http\Controllers\PostController::class , 'index'])->name('home');
Route::get('/author/{author}', [App\Http\Controllers\BlogController::class , 'author'])->name('author');
Route::get('/category/{category}', [App\Http\Controllers\CategoryController::class , 'index'])->name('category');

Route::resource(
    'posts',
    App\Http\Controllers\PostController::class , [
    'except' => ['index']
]
);

Route::resource(
    'categories',
    App\Http\Controllers\CategoryController::class , [
    'except' => ['index']
]
);

Auth::routes();
Route::get('/admin', [App\Http\Controllers\AdminController::class , 'index'])->name('dashboard');
Route::get('/admin/profile', [App\Http\Controllers\AdminController::class , 'profile'])->name('editProfile');
Route::post('/admin/profile', [App\Http\Controllers\AdminController::class , 'updateProfile'])->name('updateProfile');

View::share('categories', Category::all());