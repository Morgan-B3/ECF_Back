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
        Schema::create('matelas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->integer('discount')->nullable();
            $table->float('discounted_price', 6,2)->nullable();
            $table->string('image');
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->foreignId('largeur_id')->constrained()->cascadeOnDelete();
            $table->foreignId('longueur_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matelas');
    }
};
