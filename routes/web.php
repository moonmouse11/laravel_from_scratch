<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get(uri: '/', action: static function () {
    return view(
        view: 'posts',
        data: [
            'posts' => Post::latest()->get()
        ]
    );
});

Route::get(uri: '/posts/{post:slug}', action: static function (Post $post) {
    return view(
        view: 'post',
        data: [
            'post' => $post
        ]
    );
});

Route::get(uri: '/categories/{category:slug}', action: static function (Category $category) {
    return view(
        view: 'category',
        data: [
            'posts' => $category->posts
        ]
    );
});

Route::get(uri: '/authors/{author:username}', action: static function (User $author) {
    return view(
        view: 'posts',
        data: [
            'posts' => $author->posts
        ]
    );
});
