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
  Schema::create('articles', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug', 100)->unique(); //[cite: 1]
    $table->text('content');
    $table->enum('status', ['draft', 'published'])->default('draft'); //[cite: 1]
    $table->foreignId('id_category')->constrained('categories')->onDelete('cascade'); //[cite: 1]
    $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); //[cite: 1]
    $table->timestamp('published_at')->nullable(); //[cite: 1]
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
