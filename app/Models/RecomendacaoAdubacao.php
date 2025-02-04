<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class RecomendacaoAdubacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nitrogenio',
        'fosforo',
        'potassio',
        'adubo_nitrogenio_id',
        'adubo_fosforo_id',
        'adubo_potassio_id',
        'recomendacao_id',
    ];

    protected $table = "recomendacao_adubacao";
}
