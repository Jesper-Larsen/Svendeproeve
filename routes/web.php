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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/download', [App\Http\Controllers\HomeController::class, 'download'])->name('download');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/users/update/{user}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.users.update');
Route::get('/users/delete/{user}', [App\Http\Controllers\AdminController::class, 'delete'])->name('admin.users.delete');


Route::group(['prefix' => 'posts', 'middelware' => 'auth'], function () {
    Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    Route::post('/', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('posts.list');
    Route::get('/edit/{slug}', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
    Route::post('/{slug}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
    Route::get('/delete/{slug}', [App\Http\Controllers\PostController::class, 'delete'])->name('posts.delete');
});

Route::get('/posts/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.single');
