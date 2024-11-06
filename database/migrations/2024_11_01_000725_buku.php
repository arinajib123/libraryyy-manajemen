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
        Schema::create('buku', function (Blueprint $table) { // Use Schema::create to define the table
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('category');         // Kategori buku
            $table->year('published_year');     // Tahun terbit
            $table->text('description')->nullable(); // Deskripsi buku
            $table->boolean('available')->default(true); // Status ketersediaan (tersedia atau tidak)
            $table->string('isbn')->nullable(); // ISBN buku
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
