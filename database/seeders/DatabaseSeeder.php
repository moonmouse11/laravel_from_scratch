<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::truncate();
        \App\Models\Category::truncate();
        \App\Models\Post::truncate();

        $user = \App\Models\User::factory()->create([
            'name' => 'Bataman',
            'username' => 'bata-man',
        ]);

        \App\Models\Post::factory(5)->create([
            'user_id' => $user->id,
        ]);
    }
}
