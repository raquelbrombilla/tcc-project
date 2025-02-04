<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DemandaMacronutrienteCultura extends Model
{
    use HasFactory;

    protected $fillable = [
        'cultura_id',
        'cultivo',
        'teor_macronutriente',
        'macronutriente_id',
        'quantidade',
        'medida',
    ];

    protected $table = "demanda_macronutriente_cultura";

    protected $casts = [
        'data_analise' => 'date:d/m/Y',
    ];
}
