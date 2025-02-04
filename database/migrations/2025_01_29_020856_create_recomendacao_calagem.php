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
        Schema::create('recomendacao_calagem', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('necessidade_calagem', 8, 2)->nullable();
            $table->foreignId('recomendacao_id')->nullable();
            $table->foreign('recomendacao_id')->references('id')->on('recomendacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recomendacao_calagem');
    }
};
