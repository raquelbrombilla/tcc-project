<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AdubosMateriaPrima extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'macronutriente_id',
        'nome',
        'porcentagem',
    ];

    protected $table = "adubos_materia_prima";
}
