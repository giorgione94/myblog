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
Route::get('/author/{author}', [App\Http\Controllers\BlogController::class, 'author'])->name('author');
Route::get('/category/{category}', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'index']);

Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('/admin/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('editProfile');
Route::get('/admin/post/{post}',[App\Http\Controllers\AdminController::class, 'post']);
Route::get('/admin/category/{category}',[App\Http\Controllers\AdminController::class, 'category']);

Route::get('/admin/post/new',[App\Http\Controllers\AdminController::class, 'newPost']);
Route::get('/admin/category/new',[App\Http\Controllers\AdminController::class, 'newCategory']);

Route::post('/admin/profile', [App\Http\Controllers\AdminController::class, 'updateProfile'])->name('updateProfile');
Route::post('/admin/post/{post}',[App\Http\Controllers\AdminController::class, 'updatePost']);
Route::post('/admin/category/{category}',[App\Http\Controllers\AdminController::class, 'updateCategory']);

Route::post('/admin/post/new',[App\Http\Controllers\AdminController::class, 'createPost']);
Route::post('/admin/category/new',[App\Http\Controllers\AdminController::class, 'createCategory']);