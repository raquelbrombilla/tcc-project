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
        Schema::create('recomendacao_adubacao', function (Blueprint $table) {
            $table->id();
            $table->float('nitrogenio', 8, 2)->nullable();
            $table->float('potassio', 8, 2)->nullable();
            $table->float('fosforo', 8, 2)->nullable();
            $table->foreignId('adubo_nitrogenio_id')->nullable();
            $table->foreign('adubo_nitrogenio_id')->references('id')->on('adubos_materia_prima');
            $table->foreignId('adubo_potassio_id')->nullable();
            $table->foreign('adubo_potassio_id')->references('id')->on('adubos_materia_prima');
            $table->foreignId('adubo_fosforo_id')->nullable();
            $table->foreign('adubo_fosforo_id')->references('id')->on('adubos_materia_prima');
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
        Schema::dropIfExists('recomendacao_adubacao');
    }
};
