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

    public function category(): BelongsTo
    {
        return $this->belongsTo(related: Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }

}
