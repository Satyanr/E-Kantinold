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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->String('image');
            $table->String('title');
            $table->String('slug');
            $table->text('body');
            $table->text('price');
            $table->boolean('status')->default(false);
            $table->foreignIdFor(\App\Models\User::class, 'author_id');
            $table->foreignIdFor(\App\Models\Category::class, 'category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
