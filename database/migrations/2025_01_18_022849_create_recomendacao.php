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
        Schema::create('recomendacao', function (Blueprint $table) {
            $table->id();
            $table->string('identificador')->nullable();
            $table->float('prnt', 8, 2)->nullable();
            $table->float('expectativa_rendimento', 8, 2)->nullable();
            $table->string('sistema_cultivo');
            $table->string('cultivo');
            $table->string('cultura_anterior');
            $table->foreignId('cultura_id')->nullable();
            $table->foreign('cultura_id')->references('id')->on('culturas');
            $table->foreignId('analise_id')->nullable();
            $table->foreign('analise_id')->references('id')->on('analises_solo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recomendacao');
    }
};
