<?php

use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application Admin panel.
|
| This routes prefix by => panel/
|
| This routes name start by => 'admin.'
*/

Route::middleware(['guest:admin'])->group(function () {

    // Show Login Page
    Route::get('/login', [LoginController::class, 'showLoginPage'])->name('login.show-login-page');

    // login
    Route::post('/login', [LoginController::class, 'login'])->name('login.login');
});

Route::middleware(['auth:admin'])->group(function () {

    // Admin Panel Dashboard
    Route::view('/', 'admin.index')->name('index');

    // Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

    // Category CRUD 
    Route::resource('category', CategoryController::class)->except(['show']);

    // Tag CRUD
    Route::resource('tag', TagController::class)->except(['show']);

    // Post CRUD 
    Route::resource('post', PostController::class)->except(['show']);
});
