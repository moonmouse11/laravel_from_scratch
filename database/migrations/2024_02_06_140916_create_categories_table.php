<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create(table: 'categories', callback:  static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name')->unique();
            $table->string(column: 'slug')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(table: 'categories');
    }
};
