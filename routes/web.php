<?php

declare(strict_types=1);

use App\Http\Controllers\App\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get(uri: '/', action: [PostController::class, 'index'])->name(name: 'home');

Route::get(uri: '/posts/{post:slug}', action: [PostController::class, 'show'])->name(name: 'posts');

Route::get(uri: '/authors/{author:username}', action: static function (User $author) {
    return view(
        view: 'posts',
        data: [
            'posts' => $author->posts,
        ]
    );
})->name(name: 'author');
