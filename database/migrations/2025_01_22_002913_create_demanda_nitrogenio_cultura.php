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
        Schema::create('demanda_nitrogenio_cultura', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cultura_id')->nullable();
            $table->foreign('cultura_id')->references('id')->on('culturas');
            $table->float('teor_materia_org_minimo', 8, 2)->nullable();
            $table->float('teor_materia_org_maximo', 8, 2)->nullable();
            $table->enum('cultura_anterior', ['LEGUMINOSA', 'GRAMÍNEA', 'POUSIO'])->nullable();
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
        Schema::dropIfExists('demanda_nitrogenio_cultura');
    }
};
