<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

Route::get(uri: '/', action: static function () {
    return view(
        view: 'posts',
        data: [
            'posts' => Post::latest()->get()
        ]
    );
})->name(name: 'home');

Route::get(uri: '/posts/{post:slug}', action: static function (Post $post) {
    return view(
        view: 'post',
        data: [
            'post' => $post
        ]
    );
})->name(name: 'posts');

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
