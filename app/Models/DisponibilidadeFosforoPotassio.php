<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DisponibilidadeFosforoPotassio extends Model
{
    use HasFactory;

    protected $fillable = [
        'parametro',
        'teor_minimo',
        'teor_maximo',
        'classe_disponibilidade',
        'valor_minimo',
        'valor_maximo',
        'macronutriente_id'
    ];

    protected $table = "disponibilidade_fosforo_potassio";

}
