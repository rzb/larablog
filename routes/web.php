<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;

/*=====================================
=            Public routes            =
=====================================*/

Route::get('/',           [BlogPostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [BlogPostController::class, 'show'])->name('posts.show');

/*=====  End of Public routes  ======*/


/*========================================
=            Dashboard routes            =
========================================*/

Route::group([
    'as'         => 'dashboard.',
    'prefix'     => 'dashboard',
    'middleware' => [
        'auth:sanctum',
        'verified',
    ],
], function () {

    Route::resource('my-posts', PostController::class);

});

/*=====  End of Dashboard routes  ======*/
