<?php

declare(strict_types=1);

use App\Http\Controllers\App\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

Route::get(uri: '/', action: [PostController::class, 'index'])->name(name: 'home');

Route::get(uri: '/posts/{post:slug}', action: [PostController::class, 'show'])->name(name: 'posts');

Route::get(uri: '/categories/{category:slug}', action: static function (Category $category) {
    return view(
        view: 'category',
        data: [
            'posts' => $category->posts,
            'currentCategory' => $category,
            'categories' => Category::all()
        ]
    );
})->name(name: 'category');

Route::get(uri: '/authors/{author:username}', action: static function (User $author) {
    return view(
        view: 'posts',
        data: [
            'posts' => $author->posts,
            'categories' => Category::all()
        ]
    );
})->name(name: 'author');
