<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class RecomendacaoNPK extends Model
{
    use HasFactory;

    protected $fillable = [
        'necessidade_nitrogenio',
        'necessidade_fosforo',
        'necessidade_potassio',
        'recomendacao_id',
    ];

    protected $table = "recomendacao_npk";
}
