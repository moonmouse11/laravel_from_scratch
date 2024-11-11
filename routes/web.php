<?php

declare(strict_types=1);

use App\Http\Controllers\App\PostController;
use Illuminate\Support\Facades\Route;

Route::get(uri: '/', action: [PostController::class, 'index'])->name(name: 'home');
Route::get(uri: '/posts/{post:slug}', action: [PostController::class, 'show'])->name(name: 'posts');

