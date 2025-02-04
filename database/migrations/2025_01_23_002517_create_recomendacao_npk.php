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
        Schema::create('recomendacao_npk', function (Blueprint $table) {
            $table->id();
            $table->float('necessidade_nitrogenio', 8, 2)->nullable();
            $table->float('necessidade_potassio', 8, 2)->nullable();
            $table->float('necessidade_fosforo', 8, 2)->nullable();
            $table->foreignId('recomendacao_id')->nullable();
            $table->foreign('recomendacao_id')->references('id')->on('recomendacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recomendacao_npk');
    }
};
