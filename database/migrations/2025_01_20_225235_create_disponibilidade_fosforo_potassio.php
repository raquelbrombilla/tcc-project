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
        Schema::create('disponibilidade_fosforo_potassio', function (Blueprint $table) {
            $table->id();
            $table->string('parametro')->nullable();
            $table->float('teor_minimo', 8, 2)->nullable();
            $table->float('teor_maximo', 8, 2)->nullable();
            $table->enum('classe_disponibilidade', ['MUITO BAIXO', 'BAIXO', 'MÉDIO', 'ALTO', 'MUITO ALTO'])->nullable();
            $table->float('valor_minimo', 8, 2)->nullable();
            $table->float('valor_maximo', 8, 2)->nullable();
            $table->foreignId('macronutriente_id')->nullable();
            $table->foreign('macronutriente_id')->references('id')->on('macronutrientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilidade_fosforo_potassio');
    }
};
