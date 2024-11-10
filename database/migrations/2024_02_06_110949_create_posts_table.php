<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'posts', callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'title');
            $table->string(column: 'slug')->unique();
            $table->text(column: 'excerpt');
            $table->text(column: 'body');
            $table->timestamps();
            $table->foreignId(column: 'user_id');
            $table->foreignId(column: 'category_id');
            $table->timestamp(column: 'published_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(table: 'posts');
    }
};
