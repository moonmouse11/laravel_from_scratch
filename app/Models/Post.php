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

    /**
    * Post class for view blade.php
    * @param string $title
    * @param string $excerpt
    * @param int $date
    * @param string $body
    * @param string $slug
    */
    public function __construct(string $title, string $excerpt, int $date, string $body, string $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    /**
    * Function search one post from files
    * @return Post|null
    */
    public static function find(string $slug): Post|null
    {
        return collect(static::all())->filter(fn ($post) => $post->getSlug() === $slug)->first();
    }

        /**
    * Function search one post from files
    * @return Post
    */
    public static function findOrFail(string $slug): Post
    {
        $post = collect(static::all())->filter(fn ($post) => $post->getSlug() === $slug)->first();

        if (! $post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }


    /**
    * Function search all posts from files
    * @return array
    */
    public static function all(): array
    {
        return cache()->rememberForever('posts.all', fn () =>
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

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * @return string
     */
    public function getExcerpt(): string
    {
        return $this->excerpt;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}
