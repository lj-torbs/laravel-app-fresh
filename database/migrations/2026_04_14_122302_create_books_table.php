<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            // Add these fields for Activity 4
            $table->string('title');
            $table->string('author');
            $table->text('description');
            $table->string('genre');
            $table->integer('published_year');
            $table->string('isbn')->unique(); // Constraints say unique
            $table->integer('pages');
            $table->string('language');
            $table->string('publisher');
            $table->decimal('price', 10, 2);
            $table->string('cover_image')->nullable(); // Set to nullable as per requirements
            $table->boolean('is_available')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
