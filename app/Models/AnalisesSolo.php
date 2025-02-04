<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AnalisesSolo extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_analise',
        'nome_talhao',
        'area_ha',
        'estado',
        'municipio',
        'latitude',
        'longitude',
        'argila',
        'ph',
        'indice_smp',
        'fosforo',
        'potassio',
        'materia_organica',
        'aluminio',
        'calcio',
        'hidrogenio_aluminio',
        'ctc_solo',
        'saturacao_bases',
        'saturacao_aluminio',
        'enxofre',
        'zinco',
        'cobre',
        'boro',
        'manganes',
        'ferro',
        'user_id',
        'propriedade_id',
    ];

    protected $table = "analises_solo";

    protected $casts = [
        'data_analise' => 'date:d/m/Y',
    ];

    // Definindo o formato de exibição da data
    public function getDataAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');

    }

}