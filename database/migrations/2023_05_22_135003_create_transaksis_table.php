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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('jumlah');
            $table->String('total_harga');
            $table->text('itemtambahan')->nullabel();
            $table->text('body')->nullabel();
            $table->boolean('opened')->default(false)->change();
            $table->String('status')->default('pending');
            $table->foreignIdFor(\App\Models\User::class, 'author_id');
            $table->foreignIdFor(\App\Models\User::class, 'kantin_id');
            $table->foreignIdFor(\App\Models\Post::class, 'post_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
