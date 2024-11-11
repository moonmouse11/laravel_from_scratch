<?php

declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

final class PostController extends Controller
{
    public function index(): View
    {
        return view(
            view: 'posts.index',
            data: [
                'posts' => Post::latest()->filter(filters: request(key: ['search', 'category', 'author']))->get(),
            ]
        );
    }

    public function show(Post $post): View
    {
        return view(
            view: 'posts.show',
            data: [
                'post' => $post
            ]
        );
    }


}