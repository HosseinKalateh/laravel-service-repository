<?php

use App\Http\Controllers\front\PostController;
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

Route::name('front.')->group(function () {

    // Index page (all posts)
    Route::get('/', [PostController::class, 'index']);

    // Index page (all posts)
    Route::get('/posts', [PostController::class, 'index'])->name('post.index');

    // Show post
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');

    // Show category posts
    Route::get('/posts/categories/{id}', [PostController::class, 'categoryPosts'])->name('post.category-post');

    // Show tag posts
    Route::get('/posts/tags/{id}', [PostController::class, 'tagPosts'])->name('post.tag-posts');
});


