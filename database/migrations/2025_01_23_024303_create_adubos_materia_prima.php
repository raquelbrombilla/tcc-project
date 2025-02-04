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
        Schema::create('adubos_materia_prima', function (Blueprint $table) {
            $table->id();
            $table->foreignId('macronutriente_id')->nullable();
            $table->foreign('macronutriente_id')->references('id')->on('macronutrientes');
            $table->string('nome')->nullable();
            $table->float('porcentagem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adubos_materia_prima');
    }
};
