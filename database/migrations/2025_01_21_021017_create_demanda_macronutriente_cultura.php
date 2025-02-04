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
        Schema::create('demanda_macronutriente_cultura', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cultura_id')->nullable();
            $table->foreign('cultura_id')->references('id')->on('culturas');
            $table->string('cultivo')->nullable();
            $table->enum('teor_macronutriente', ['MUITO BAIXO', 'BAIXO', 'MÉDIO', 'ALTO', 'MUITO ALTO'])->nullable();
            $table->foreignId('macronutriente_id')->nullable();
            $table->foreign('macronutriente_id')->references('id')->on('macronutrientes');
            $table->float('quantidade')->nullable();
            $table->string('medida')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demanda_macronutriente_cultura');
    }
};
