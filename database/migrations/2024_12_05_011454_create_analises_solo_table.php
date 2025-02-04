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
        Schema::create('analises_solo', function (Blueprint $table) {
            $table->id();
            $table->date('data_analise');
            $table->string('nome_talhao');
            $table->string('area_ha');
            $table->string('estado');
            $table->string('municipio');
            $table->decimal('latitude', 20, 15)->nullable();
            $table->decimal('longitude', 20, 15)->nullable();
            $table->float('argila', 8, 2)->nullable();
            $table->float('ph', 8, 2)->nullable();
            $table->float('indice_smp', 8, 2)->nullable();
            $table->float('fosforo', 8, 2)->nullable();
            $table->float('potassio', 8, 2)->nullable();
            $table->float('materia_organica', 8, 2)->nullable();
            $table->float('aluminio', 8, 2)->nullable();
            $table->float('calcio', 8, 2)->nullable();
            $table->float('magnesio', 8, 2)->nullable();
            $table->float('hidrogenio_aluminio', 8, 2)->nullable();
            $table->float('ctc_solo', 8, 2)->nullable();
            $table->float('saturacao_bases', 8, 2)->nullable();
            $table->float('saturacao_aluminio', 8, 2)->nullable();
            $table->float('enxofre', 8, 2)->nullable();
            $table->float('zinco', 8, 2)->nullable();
            $table->float('cobre', 8, 2)->nullable();
            $table->float('boro', 8, 2)->nullable();
            $table->float('manganes', 8, 2)->nullable();
            $table->float('ferro', 8, 2)->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('propriedade_id')->nullable();
            $table->foreign('propriedade_id')->references('id')->on('propriedade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analises_solo');
    }
};
