<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class Post
{

    private string $title;
    private string $excerpt;
    private int $date;
    private string $body;
    private string $slug;

    /*
    * Post class for view blade.php
    */
    public function __construct(string $title, string $excerpt, int $date, string $body, string $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    /*
    * Function search one post from files
    */
    public static function find(string $slug): Post|null
    {
        return collect(static::all())->filter(fn ($post) => $post->getSlug() === $slug)->first();
    }

    /*
    * Function search all posts from files
    */
    public static function all(): array
    {
        return cache()->remeberForever('posts.all', fn () =>
        collect(File::files(resource_path('posts')))
        ->map(fn ($file) => YamlFrontMatter::parseFile($file))
        ->map(fn ($document) => new Post(
                $document->matter('title'),
                $document->matter('excerpt'),
                $document->matter('date'),
                $document->body(),
                $document->matter('slug')
            )
        )->sortByDesc('date')->toArray());
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getExcerpt(): string
    {
        return $this->excerpt;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}
