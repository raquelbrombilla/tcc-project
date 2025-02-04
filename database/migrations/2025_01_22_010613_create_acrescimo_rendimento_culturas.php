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
        Schema::create('acrescimo_rendimento_culturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cultura_id')->nullable();
            $table->foreign('cultura_id')->references('id')->on('culturas');
            $table->foreignId('macronutriente_id')->nullable();
            $table->foreign('macronutriente_id')->references('id')->on('macronutrientes');
            $table->integer('t_ha_acrescimo_rendimento')->nullable();
            $table->integer('kg_acrescimo_ha')->nullable();
            $table->enum('cultura_anterior', ['LEGUMINOSA', 'GRAMÍNEA', 'POUSIO'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acrescimo_rendimento_culturas');
    }
};
