<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

/**
 * @extends Factory<Post>
 */
final class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->paragraphs(nb: 2, asText: true),
            'body' => $this->faker->paragraph,
            'slug' => $this->faker->slug,
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
