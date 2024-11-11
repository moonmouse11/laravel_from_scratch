<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'excerpt', 'body'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters): void
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(callback: fn ($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas(
                relationship: 'category',
                callback: fn (BelongsTo $query) => $query->where(column: 'slug', value: $category)

            )
        );

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
            $query->whereHas(
                relationship: 'author',
                callback: fn (BelongsTo $query) => $query->where(column: 'name', value: $author)

            )
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(related: Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }

}
