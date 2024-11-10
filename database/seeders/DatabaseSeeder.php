<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create(
            attributes: [
                'name' => 'Batman',
                'username' => 'bat-man-never-die',
            ]
        );

        Post::factory(count: 5)->create(
            attributes: [
                'user_id' => $user->id,
            ]
        );
    }
}
