<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AcrescimoRendimentoCulturas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cultura_id',
        'macronutriente_id',
        't_ha_acrescimo_rendimento',
        'kg_acrescimo_ha',
        'cultura_anterior',
    ];

    protected $table = "acrescimo_rendimento_culturas";
}
